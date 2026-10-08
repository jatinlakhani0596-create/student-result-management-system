<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
    exit();
} else {
    if (isset($_POST['submit'])) {
        $studentid = $_POST['studentid']; 
        $mark = $_POST['marks'];
        $class = 1;

        // Fetch all subject IDs in exact order as displayed
        $stmtAll = $dbh->prepare("SELECT id FROM tblsubjects ORDER BY id ASC");
        $stmtAll->execute();
        $sid1 = array();
        while ($row = $stmtAll->fetch(PDO::FETCH_ASSOC)) {
            array_push($sid1, $row['id']);
        }

        // Delete previous results for this student if re-declaring
        $del = $dbh->prepare("DELETE FROM tblresult WHERE StudentId = :studentid");
        $del->bindParam(':studentid', $studentid, PDO::PARAM_STR);
        $del->execute();

        $successCount = 0;
        for ($i = 0; $i < count($mark); $i++) {
            $mar = $mark[$i];
            $sid = $sid1[$i];
            if (!empty($sid)) {
                $sql = "INSERT INTO tblresult(StudentId,ClassId,SubjectId,marks) VALUES(:studentid,:class,:sid,:marks)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':studentid', $studentid, PDO::PARAM_STR);
                $query->bindParam(':class', $class, PDO::PARAM_STR);
                $query->bindParam(':sid', $sid, PDO::PARAM_STR);
                $query->bindParam(':marks', $mar, PDO::PARAM_STR);
                $query->execute();
                if ($dbh->lastInsertId()) {
                    $successCount++;
                }
            }
        }

        if ($successCount > 0) {
            $msg = "Examination result published successfully for all $successCount subjects!";
        } else {
            $error = "Result declaration failed. Please try again.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gyanmanjari Admin | Declare Examination Result</title>
    <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" />
    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap 5 & jQuery CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <style>
        :root {
            --bg-light: #f8fafc;
            --panel-bg: #ffffff;
            --panel-border: #e2e8f0;
            --blue-primary: #2563eb;
        }
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        h1, h2, h3, h4, h5, .brand-font { font-family: 'Outfit', sans-serif; }
        body { background-color: var(--bg-light); color: #0f172a; min-height: 100vh; }

        .form-card-panel {
            background: #ffffff;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            border: 1px solid var(--panel-border);
            max-width: 850px;
            margin: 30px auto;
        }
        .form-control, .form-select {
            padding: 12px 18px;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            font-weight: 500;
        }
        .form-control:focus, .form-select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37,99,235,0.12);
        }
        .btn-submit-gmiu {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: #ffffff;
            font-weight: 700;
            border: none;
            border-radius: 14px;
            padding: 14px 35px;
            box-shadow: 0 4px 20px rgba(16,185,129,0.3);
            transition: all 0.3s ease;
        }
        .btn-submit-gmiu:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16,185,129,0.5);
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Top Executive Header Navbar -->
    <?php include('includes/topbar.php'); ?>

    <main class="container-fluid px-lg-5 mb-5">
        <div class="form-card-panel">
            <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
                <div>
                    <h3 class="brand-font fw-bold m-0 text-dark"><i class="fa-solid fa-square-plus text-success me-2"></i>Declare Student Result</h3>
                    <p class="text-muted small m-0">Select student and enter marks for all course subjects.</p>
                </div>
                <a href="dashboard.php" class="btn btn-outline-primary rounded-pill px-4 btn-sm fw-bold"><i class="fa-solid fa-arrow-left me-2"></i>Back to Dashboard</a>
            </div>

            <?php if($msg){ ?>
                <div class="alert alert-success rounded-3 p-3 mb-4" role="alert">
                    <i class="fa-solid fa-circle-check me-2"></i><strong>Success!</strong> <?php echo htmlentities($msg); ?>
                </div>
            <?php } else if($error){ ?>
                <div class="alert alert-danger rounded-3 p-3 mb-4" role="alert">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i><strong>Error!</strong> <?php echo htmlentities($error); ?>
                </div>
            <?php } ?>

            <form method="post" class="row g-4">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold text-dark"><i class="fa-solid fa-user text-primary me-2"></i>Select Enrolled Student</label>
                    <select name="studentid" class="form-select stid" id="studentid" required>
                        <option value="">-- Choose Student --</option>
                        <?php 
                        if ($dbh) {
                            $sqlSt = "SELECT StudentName, StudentId, RollId FROM tblstudents WHERE Status = 1 ORDER BY StudentName ASC";
                            $querySt = $dbh->prepare($sqlSt);
                            $querySt->execute();
                            $stList = $querySt->fetchAll(PDO::FETCH_OBJ);
                            if ($querySt->rowCount() > 0) {
                                foreach ($stList as $st) { ?>
                                    <option value="<?php echo htmlentities($st->StudentId); ?>"><?php echo htmlentities($st->StudentName); ?> &nbsp;[Roll ID: <?php echo htmlentities($st->RollId); ?>]</option>
                            <?php }
                            }
                        } ?>
                    </select>
                </div>

                <!-- Course Subject Marks List -->
                <div class="col-md-12 mb-4">
                    <div class="card p-4 border-0 bg-light rounded-3">
                        <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-pen-ruler text-primary me-2"></i>Enter Subject Marks (Out of 100)</h5>
                        <?php 
                        if ($dbh) {
                            $sqlSub = "SELECT id, SubjectName, SubjectCode FROM tblsubjects ORDER BY id ASC";
                            $querySub = $dbh->prepare($sqlSub);
                            $querySub->execute();
                            $subList = $querySub->fetchAll(PDO::FETCH_OBJ);
                            if ($querySub->rowCount() > 0) {
                                foreach ($subList as $sb) { ?>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-5 col-form-label fw-bold text-dark">
                                            <?php echo htmlentities($sb->SubjectName); ?>
                                            <span class="badge bg-secondary ms-1"><?php echo htmlentities($sb->SubjectCode ? $sb->SubjectCode : 'SUB-'.$sb->id); ?></span>
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="number" name="marks[]" min="0" max="100" class="form-control" required placeholder="Enter marks out of 100" autocomplete="off">
                                        </div>
                                    </div>
                                <?php }
                            }
                        } ?>
                    </div>
                </div>

                <div class="col-12 text-end pt-3 border-top">
                    <a href="manage-results.php" class="btn btn-outline-secondary rounded-pill me-2 px-4">Cancel</a>
                    <button type="submit" name="submit" class="btn btn-submit-gmiu px-5"><i class="fa-solid fa-check-double me-2"></i>Submit & Publish Result</button>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php } ?>
