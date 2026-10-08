<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
    exit();
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gyanmanjari Admin | Manage Examination Results</title>
    <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" />
    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap 5 & DataTables -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
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

        .table-card-panel {
            background: #ffffff;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            border: 1px solid var(--panel-border);
            margin: 30px auto;
        }
        .table-custom th {
            background-color: #0f172a;
            color: #ffffff;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <!-- Top Executive Header Navbar -->
    <?php include('includes/topbar.php'); ?>

    <main class="container-fluid px-lg-5 mb-5">
        <div class="table-card-panel">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="brand-font fw-bold m-0 text-dark"><i class="fa-solid fa-graduation-cap text-success me-2"></i>Student Examination Results Directory</h3>
                    <p class="text-muted small m-0">Directory of published & pending student examination results across Gyanmanjari University.</p>
                </div>
                <div>
                    <a href="add-result.php" class="btn btn-success rounded-pill px-4 btn-sm fw-bold"><i class="fa-solid fa-square-plus me-1"></i> Declare Result</a>
                </div>
            </div>

            <div class="table-responsive">
                <table id="example" class="table table-hover table-bordered table-custom align-middle" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th>Student Name</th>
                            <th>Roll ID</th>
                            <th>Email Address</th>
                            <th>Result Status</th>
                            <th style="width: 180px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if ($dbh) {
                            $sql = "SELECT tblstudents.StudentName, tblstudents.RollId, tblstudents.StudentId, tblstudents.StudentEmail, (SELECT COUNT(id) FROM tblresult WHERE tblresult.StudentId = tblstudents.StudentId) as resCount FROM tblstudents ORDER BY tblstudents.StudentId DESC";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) { ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                        <td class="fw-bold text-dark"><?php echo htmlentities($result->StudentName); ?></td>
                                        <td><span class="badge bg-light text-dark border fw-bold"><?php echo htmlentities($result->RollId); ?></span></td>
                                        <td class="small text-secondary"><?php echo htmlentities($result->StudentEmail); ?></td>
                                        <td>
                                            <?php if ($result->resCount > 0) { ?>
                                                <span class="badge bg-success px-3 py-2"><i class="fa-solid fa-circle-check me-1"></i> Result Declared</span>
                                            <?php } else { ?>
                                                <span class="badge bg-secondary px-3 py-2"><i class="fa-solid fa-clock me-1"></i> Pending</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($result->resCount > 0) { ?>
                                                <a href="edit-result.php?stid=<?php echo htmlentities($result->StudentId); ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1"><i class="fa-solid fa-pen me-1"></i> Edit Marks</a>
                                            <?php } else { ?>
                                                <a href="add-result.php" class="btn btn-sm btn-success rounded-pill px-3"><i class="fa-solid fa-plus me-1"></i> Declare</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php 
                                $cnt++;
                                }
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="js/DataTables/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "pageLength": 10
            });
        });
    </script>
</body>
</html>
<?php } ?>
