<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
    exit();
} else {
    $stid = intval($_GET['stid']);

    if (isset($_POST['submit'])) {
        $studentname = $_POST['fullanme'];
        $roolid = $_POST['rollid']; 
        $studentemail = $_POST['emailid']; 
        $gender = $_POST['gender']; 
        $classid = $_POST['class']; 
        $dob = $_POST['dob']; 
        $status = $_POST['status'];

        $sql = "UPDATE tblstudents SET StudentName=:studentname, RollId=:roolid, StudentEmail=:studentemail, Gender=:gender, ClassId=:classid, DOB=:dob, Status=:status WHERE StudentId=:stid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':studentname', $studentname, PDO::PARAM_STR);
        $query->bindParam(':roolid', $roolid, PDO::PARAM_STR);
        $query->bindParam(':studentemail', $studentemail, PDO::PARAM_STR);
        $query->bindParam(':gender', $gender, PDO::PARAM_STR);
        $query->bindParam(':classid', $classid, PDO::PARAM_STR);
        $query->bindParam(':dob', $dob, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':stid', $stid, PDO::PARAM_STR);
        $query->execute();

        $msg = "Student profile updated successfully!";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gyanmanjari Admin | Edit Student Profile</title>
    <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" />
    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap 5 -->
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
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: #ffffff;
            font-weight: 700;
            border: none;
            border-radius: 14px;
            padding: 14px 35px;
            box-shadow: 0 4px 20px rgba(37,99,235,0.3);
            transition: all 0.3s ease;
        }
        .btn-submit-gmiu:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37,99,235,0.5);
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
                    <h3 class="brand-font fw-bold m-0 text-dark"><i class="fa-solid fa-user-gear text-primary me-2"></i>Edit Student Profile Info</h3>
                    <p class="text-muted small m-0">Update student profile & department program assignment.</p>
                </div>
                <a href="manage-students.php" class="btn btn-outline-primary rounded-pill px-4 btn-sm fw-bold"><i class="fa-solid fa-arrow-left me-2"></i>Back to Directory</a>
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
                <?php 
                $sql = "SELECT tblstudents.StudentName,tblstudents.RollId,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblstudents.StudentEmail,tblstudents.Gender,tblstudents.DOB,tblstudents.ClassId,tblclasses.ClassName,tblclasses.Section from tblstudents left join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.StudentId=:stid";
                $query = $dbh->prepare($sql);
                $query->bindParam(':stid', $stid, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount() > 0) {
                    foreach($results as $result) { ?>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-dark"><i class="fa-solid fa-user text-primary me-2"></i>Full Student Name</label>
                            <input type="text" name="fullanme" class="form-control" value="<?php echo htmlentities($result->StudentName); ?>" required autocomplete="off">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-dark"><i class="fa-solid fa-id-card text-primary me-2"></i>Roll ID / Registration No.</label>
                            <input type="text" name="rollid" class="form-control" value="<?php echo htmlentities($result->RollId); ?>" required autocomplete="off">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-dark"><i class="fa-solid fa-building-columns text-primary me-2"></i>Department Program & Semester</label>
                            <select name="class" class="form-select" required>
                                <option value="<?php echo htmlentities($result->ClassId); ?>"><?php echo htmlentities($result->ClassName ? $result->ClassName . ' [' . $result->Section . ']' : 'Select Class Section'); ?></option>
                                <?php 
                                $sqlC = "SELECT * from tblclasses ORDER BY ClassName ASC, Section ASC";
                                $queryC = $dbh->prepare($sqlC);
                                $queryC->execute();
                                $cResults = $queryC->fetchAll(PDO::FETCH_OBJ);
                                if($queryC->rowCount() > 0) {
                                    foreach($cResults as $cRes) { ?>
                                        <option value="<?php echo htmlentities($cRes->id); ?>"><?php echo htmlentities($cRes->ClassName); ?> &nbsp;[<?php echo htmlentities($cRes->Section); ?>]</option>
                                <?php }
                                } ?>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-dark"><i class="fa-solid fa-envelope text-primary me-2"></i>Email Address</label>
                            <input type="email" name="emailid" class="form-control" value="<?php echo htmlentities($result->StudentEmail); ?>" required autocomplete="off">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-dark"><i class="fa-solid fa-calendar text-primary me-2"></i>Date of Birth (DOB)</label>
                            <input type="date" name="dob" class="form-control" value="<?php echo htmlentities($result->DOB); ?>" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-dark"><i class="fa-solid fa-shield-halved text-primary me-2"></i>Account Status</label>
                            <select name="status" class="form-select" required>
                                <option value="1" <?php if($result->Status == 1) echo "selected"; ?>>Active</option>
                                <option value="0" <?php if($result->Status == 0) echo "selected"; ?>>Blocked</option>
                            </select>
                        </div>

                    <?php }
                } ?>

                <div class="col-12 text-end pt-3 border-top">
                    <a href="manage-students.php" class="btn btn-outline-secondary rounded-pill me-2 px-4">Cancel</a>
                    <button type="submit" name="submit" class="btn btn-submit-gmiu px-5"><i class="fa-solid fa-pen-to-square me-2"></i>Update Student Profile</button>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php } ?>
