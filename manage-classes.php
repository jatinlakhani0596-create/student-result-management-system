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
    <title>Gyanmanjari Admin | Manage Class Sections</title>
    <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" />
    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap 5 & DataTables -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>

    <style>
        :root {
            --brand-dark: #080e1e;
            --brand-blue: #2563eb;
            --brand-cyan: #06b6d4;
        }
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        h1, h2, h3, h4, h5, .brand-font { font-family: 'Outfit', sans-serif; }
        body { background-color: #f8fafc; color: #0f172a; min-height: 100vh; }

        .gmiu-header {
            background: var(--brand-dark);
            border-bottom: 2px solid var(--brand-blue);
            padding: 14px 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }
        .gmiu-logo-seal {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            background: #ffffff;
            padding: 2px;
            border: 2px solid var(--brand-cyan);
        }
        .table-card-panel {
            background: #ffffff;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
        }
        .table-custom th {
            background-color: #0f172a;
            color: #ffffff;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <header class="gmiu-header mb-4">
        <div class="container-fluid px-lg-5">
            <div class="d-flex align-items-center justify-content-between">
                <a href="dashboard.php" class="d-flex align-items-center text-decoration-none">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" alt="GMIU Seal" class="gmiu-logo-seal me-3">
                    <div>
                        <div class="brand-font fw-extrabold text-white" style="font-size: 18px;">GYANMANJARI UNIVERSITY</div>
                        <div style="font-size: 11px; color: var(--brand-cyan); font-weight: 700;">MANAGE CLASSES & DEPARTMENT SECTIONS</div>
                    </div>
                </a>
                <div>
                    <a href="create-class.php" class="btn btn-primary rounded-pill px-4 btn-sm fw-bold me-2"><i class="fa-solid fa-plus me-1"></i> Create Class Section</a>
                    <a href="dashboard.php" class="btn btn-outline-light rounded-pill px-4 btn-sm fw-bold"><i class="fa-solid fa-arrow-left me-2"></i>Back to Dashboard</a>
                </div>
            </div>
        </div>
    </header>

    <main class="container-fluid px-lg-5 mb-5">
        <div class="table-card-panel">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="brand-font fw-bold m-0 text-dark"><i class="fa-solid fa-building-columns text-primary me-2"></i>Class Sections Directory</h3>
                    <p class="text-muted small m-0">View and edit all university department programs and semester sections.</p>
                </div>
            </div>

            <div class="table-responsive">
                <table id="example" class="table table-hover table-bordered table-custom align-middle" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th>Class & Program Name</th>
                            <th>Numeric Code</th>
                            <th>Semester / Section</th>
                            <th>Creation Date</th>
                            <th style="width: 100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if ($dbh) {
                            $sql = "SELECT * from tblclasses ORDER BY ClassName ASC, Section ASC";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            $cnt=1;
                            if($query->rowCount() > 0) {
                                foreach($results as $result) { ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt);?></td>
                                        <td class="fw-bold text-dark"><?php echo htmlentities($result->ClassName);?></td>
                                        <td><span class="badge bg-light text-dark border fw-bold"><?php echo htmlentities($result->ClassNameNumeric);?></span></td>
                                        <td><span class="badge bg-info text-white px-3 py-2 fw-bold"><?php echo htmlentities($result->Section);?></span></td>
                                        <td class="small text-muted"><?php echo htmlentities($result->CreationDate);?></td>
                                        <td>
                                            <a href="edit-class.php?classid=<?php echo htmlentities($result->id);?>" class="btn btn-sm btn-outline-primary rounded-pill px-3"><i class="fa-solid fa-pen me-1"></i> Edit</a>
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

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
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
