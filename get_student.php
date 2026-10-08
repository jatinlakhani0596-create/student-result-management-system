<?php
include('includes/config.php');

// 1. Get Students for Class
if (!empty($_POST["classid"])) {
    $cid = intval($_POST['classid']);
    if (!is_numeric($cid)) {
        echo "<option value=''>Invalid Selection</option>";
        exit;
    } else {
        // Fetch all active enrolled students so the admin can always choose
        $stmtAll = $dbh->prepare("SELECT StudentName, StudentId, RollId FROM tblstudents WHERE Status = 1 ORDER BY StudentName ASC");
        $stmtAll->execute();
        $allStudents = $stmtAll->fetchAll(PDO::FETCH_ASSOC);

        if (count($allStudents) > 0) {
            echo '<option value="">-- Select Enrolled Student --</option>';
            foreach ($allStudents as $row) {
                echo '<option value="' . htmlentities($row['StudentId']) . '">' . htmlentities($row['StudentName']) . ' (Roll ID: ' . htmlentities($row['RollId']) . ')</option>';
            }
        } else {
            echo '<option value="">No Enrolled Students Found</option>';
        }
    }
}

// 2. Get ALL Subjects & Marks Inputs
if (!empty($_POST["classid1"])) {
    $cid1 = intval($_POST['classid1']);
    
    // Fetch ALL active subjects from tblsubjects so marks for all subjects can be entered
    $stmt = $dbh->prepare("SELECT SubjectName, id, SubjectCode FROM tblsubjects ORDER BY id ASC");
    $stmt->execute();
    $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($subjects) > 0) {
        echo '<div class="card p-4 border-0 bg-light rounded-3 mb-3">';
        echo '<h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-pen-ruler text-primary me-2"></i>Enter Subject Marks (Out of 100)</h5>';
        foreach ($subjects as $row) {
            echo '<div class="mb-3 row align-items-center">';
            echo '<label class="col-sm-5 col-form-label fw-bold text-dark">' . htmlentities($row['SubjectName']) . ' <span class="badge bg-secondary ms-1">' . htmlentities($row['SubjectCode'] ? $row['SubjectCode'] : 'SUB-'.$row['id']) . '</span></label>';
            echo '<div class="col-sm-7"><input type="number" name="marks[]" min="0" max="100" class="form-control" required placeholder="Enter marks out of 100" autocomplete="off"></div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<div class="alert alert-warning">No subjects found in university catalog. Please add subjects first.</div>';
    }
}

// 3. Check if Result Already Declared
if (!empty($_POST["studclass"])) {
    $id = $_POST['studclass'];
    $dta = explode("$", $id);
    $id = $dta[0];
    $id1 = $dta[1];
    $query = $dbh->prepare("SELECT StudentId, ClassId FROM tblresult WHERE StudentId = :id1 AND ClassId = :id ");
    $query->bindParam(':id1', $id1, PDO::PARAM_STR);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        echo "<div class='alert alert-warning text-danger fw-bold rounded-3 p-2 mb-2'><i class='fa-solid fa-triangle-exclamation me-1'></i> Notice: Result already declared for this student.</div>";
    }
}
?>
