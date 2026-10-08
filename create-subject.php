<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
    exit();
} else {
    if (isset($_POST['submit'])) {
        $subjectname = $_POST['subjectname'];
        $subjectcode = $_POST['subjectcode']; 
        $sql = "INSERT INTO tblsubjects(SubjectName,SubjectCode) VALUES(:subjectname,:subjectcode)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':subjectname', $subjectname, PDO::PARAM_STR);
        $query->bindParam(':subjectcode', $subjectcode, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            $msg = "Subject created successfully!";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gyanmanjari Admin | Create New Course Subject</title>
    <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" />
    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
        .form-card-panel {
            background: #ffffff;
            border-radius: 24px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
            max-width: 750px;
            margin: 0 auto;
        }
        .form-control {
            padding: 12px 18px;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            font-weight: 500;
        }
        .form-control:focus {
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
            box-shadow: 0 4px 20px rgba(37,99,235,0.35);
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
    <header class="gmiu-header mb-4">
        <div class="container-fluid px-lg-5">
            <div class="d-flex align-items-center justify-content-between">
                <a href="dashboard.php" class="d-flex align-items-center text-decoration-none">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" alt="GMIU Seal" class="gmiu-logo-seal me-3">
                    <div>
                        <div class="brand-font fw-extrabold text-white" style="font-size: 18px;">GYANMANJARI UNIVERSITY</div>
                        <div style="font-size: 11px; color: var(--brand-cyan); font-weight: 700;">CREATE ACADEMIC SUBJECT</div>
                    </div>
                </a>
                <div>
                    <a href="dashboard.php" class="btn btn-outline-light rounded-pill px-4 btn-sm fw-bold"><i class="fa-solid fa-arrow-left me-2"></i>Back to Dashboard</a>
                </div>
            </div>
        </div>
    </header>

    <main class="container-fluid px-lg-5 mb-5">
        <div class="form-card-panel">
            <div class="border-bottom pb-3 mb-4">
                <h3 class="brand-font fw-bold m-0 text-dark"><i class="fa-solid fa-book-bookmark text-danger me-2"></i>Create New Course Subject</h3>
                <p class="text-muted small m-0">Enter subject title and subject identification code.</p>
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
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold text-dark"><i class="fa-solid fa-book text-primary me-2"></i>Subject Name</label>
                    <input type="text" name="subjectname" class="form-control" placeholder="e.g. Advanced Java & Cloud Computing" required autocomplete="off">
                </div>

                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold text-dark"><i class="fa-solid fa-barcode text-primary me-2"></i>Subject Code</label>
                    <input type="text" name="subjectcode" class="form-control" placeholder="e.g. MCA101" required autocomplete="off">
                </div>

                <div class="col-12 text-end pt-3 border-top">
                    <a href="manage-subjects.php" class="btn btn-outline-secondary rounded-pill me-2 px-4">Cancel</a>
                    <button type="submit" name="submit" class="btn btn-submit-gmiu px-5"><i class="fa-solid fa-plus-circle me-2"></i>Create Subject</button>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php } ?>
