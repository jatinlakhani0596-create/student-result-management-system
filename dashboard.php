<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == "") {
    header("Location: admin-login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Gyanmanjari University | SuperAdmin Executive Control Center</title>
    <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" />
    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap 5.3 & jQuery CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <style>
        :root {
            --bg-light: #f8fafc;
            --panel-bg: #ffffff;
            --panel-border: #e2e8f0;
            --text-dark: #0f172a;
            --blue-primary: #2563eb;
            --cyan-primary: #06b6d4;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: var(--bg-light);
            color: var(--text-dark);
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: 'Outfit', sans-serif;
        }

        .white-panel-card {
            background: var(--panel-bg);
            border-radius: 24px;
            padding: 30px;
            border: 1px solid var(--panel-border);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            margin-bottom: 25px;
        }

        .dashboard-hero-light {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #06b6d4 100%);
            border-radius: 28px;
            padding: 40px;
            color: #ffffff;
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.15);
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .stat-card-light {
            border-radius: 22px;
            padding: 28px 24px;
            color: #ffffff;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
            transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 100%;
        }
        .stat-card-light:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
            color: #ffffff;
        }
        .card-grad-blue { background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%); }
        .card-grad-purple { background: linear-gradient(135deg, #6d28d9 0%, #8b5cf6 100%); }
        .card-grad-green { background: linear-gradient(135deg, #047857 0%, #10b981 100%); }
        .card-grad-orange { background: linear-gradient(135deg, #d97706 0%, #ff5500 100%); }

        .stat-number {
            font-size: 46px;
            font-weight: 900;
            line-height: 1;
            margin-bottom: 6px;
        }
        .stat-label {
            font-size: 14px;
            font-weight: 600;
            opacity: 0.95;
        }
        .stat-icon {
            width: 68px;
            height: 68px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(12px);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
        }

        .launch-tile-light {
            background: #ffffff;
            border-radius: 20px;
            padding: 24px;
            border: 1px solid var(--panel-border);
            text-align: center;
            text-decoration: none !important;
            display: block;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            transition: all 0.3s ease;
            height: 100%;
        }
        .launch-tile-light:hover {
            transform: translateY(-6px);
            border-color: var(--blue-primary);
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.12);
        }
        .launch-icon {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            margin: 0 auto 15px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
        }

        .table-light-custom th {
            background: #0f172a;
            color: #ffffff;
            font-weight: 700;
            padding: 16px;
        }
        .table-light-custom td {
            padding: 16px;
            vertical-align: middle;
        }
    </style>
</head>
<body>

    <!-- Executive Universal Top Navigation Bar -->
    <?php include('includes/topbar.php'); ?>

    <!-- Main Workspace Container -->
    <main class="container-fluid px-lg-5 py-4">

        <!-- Hero Banner -->
        <div class="dashboard-hero-light d-flex flex-wrap align-items-center justify-content-between">
            <div>
                <span class="badge bg-warning text-dark fw-bold px-3 py-2 rounded-pill mb-2"><i class="fa-solid fa-shield-halved me-1"></i> System Online & Operational</span>
                <h1 class="brand-font fw-extrabold display-5 mb-2">Gyanmanjari Executive Control Panel</h1>
                <p class="text-white-50 m-0 fs-5" style="max-width: 680px; font-weight: 300;">
                    Real-time university student enrollment, course subjects, exam result processing, and notice ticker.
                </p>
            </div>
            <div class="mt-3 mt-lg-0">
                <a href="add-students.php" class="btn btn-light btn-lg rounded-pill fw-bold text-primary px-4 py-3 shadow me-2"><i class="fa-solid fa-user-plus me-2"></i>New Student Admission</a>
                <a href="add-result.php" class="btn btn-warning btn-lg rounded-pill fw-bold text-dark px-4 py-3 shadow"><i class="fa-solid fa-square-plus me-2"></i>Declare Result</a>
            </div>
        </div>

        <!-- 3 Executive Stats Grid -->
        <div class="row g-4 mb-4">
            <div class="col-xl-4 col-md-6">
                <a href="manage-students.php" class="stat-card-light card-grad-blue">
                    <?php 
                    $totalstudents = 0;
                    if ($dbh) {
                        $sql1 = "SELECT StudentId from tblstudents";
                        $query1 = $dbh->prepare($sql1);
                        $query1->execute();
                        if($query1) $totalstudents = $query1->rowCount();
                    }
                    ?>
                    <div>
                        <div class="stat-number"><?php echo htmlentities($totalstudents);?></div>
                        <div class="stat-label">Enrolled Students</div>
                    </div>
                    <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
                </a>
            </div>

            <div class="col-xl-4 col-md-6">
                <a href="manage-subjects.php" class="stat-card-light card-grad-purple">
                    <?php 
                    $totalsubjects = 0;
                    if ($dbh) {
                        $sql = "SELECT id from tblsubjects";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        if($query) $totalsubjects = $query->rowCount();
                    }
                    ?>
                    <div>
                        <div class="stat-number"><?php echo htmlentities($totalsubjects);?></div>
                        <div class="stat-label">Active Course Subjects</div>
                    </div>
                    <div class="stat-icon"><i class="fa-solid fa-book-bookmark"></i></div>
                </a>
            </div>

            <div class="col-xl-4 col-md-6">
                <a href="manage-results.php" class="stat-card-light card-grad-green">
                    <?php 
                    $totalresults = 0;
                    if ($dbh) {
                        $sql3 = "SELECT distinct StudentId from tblresult";
                        $query3 = $dbh->prepare($sql3);
                        $query3->execute();
                        if($query3) $totalresults = $query3->rowCount();
                    }
                    ?>
                    <div>
                        <div class="stat-number"><?php echo htmlentities($totalresults);?></div>
                        <div class="stat-label">Declared Results</div>
                    </div>
                    <div class="stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                </a>
            </div>
        </div>

        <!-- Quick Management Launcher Grid -->
        <div class="mb-4">
            <h4 class="brand-font fw-bold mb-3 text-dark"><i class="fa-solid fa-bolt text-warning me-2"></i>Quick Management Tasks</h4>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <a href="add-students.php" class="launch-tile-light">
                        <div class="launch-icon bg-primary-subtle text-primary">
                            <i class="fa-solid fa-user-plus"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-1">Add Student Admission</h5>
                        <p class="text-secondary small m-0">Register new student details into system</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="add-result.php" class="launch-tile-light">
                        <div class="launch-icon bg-success-subtle text-success">
                            <i class="fa-solid fa-square-plus"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-1">Declare Examination Result</h5>
                        <p class="text-secondary small m-0">Enter subject marks & publish transcript</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="add-notice.php" class="launch-tile-light">
                        <div class="launch-icon bg-danger-subtle text-danger">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-1">Publish Notice</h5>
                        <p class="text-secondary small m-0">Post news to student notice board</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Activity Tables Grid -->
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="white-panel-card">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="brand-font fw-bold m-0 text-dark"><i class="fa-solid fa-users text-primary me-2"></i>Recent Student Registrations</h4>
                        <a href="manage-students.php" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold">View All Students</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-light-custom align-middle rounded-3 overflow-hidden">
                            <thead>
                                <tr>
                                    <th>Roll No</th>
                                    <th>Student Name</th>
                                    <th>Reg Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if ($dbh) {
                                    $sqlRecent = "SELECT StudentName, RollId, RegDate, Status from tblstudents order by StudentId desc limit 5";
                                    $queryRecent = $dbh->prepare($sqlRecent);
                                    $queryRecent->execute();
                                    $recentStudents = $queryRecent->fetchAll(PDO::FETCH_OBJ);
                                    if($queryRecent->rowCount() > 0) {
                                        foreach($recentStudents as $st) { ?>
                                            <tr>
                                                <td><span class="badge bg-light text-dark border fw-bold"><?php echo htmlentities($st->RollId);?></span></td>
                                                <td class="fw-bold text-dark"><?php echo htmlentities($st->StudentName);?></td>
                                                <td class="small text-muted"><?php echo htmlentities($st->RegDate);?></td>
                                                <td>
                                                    <?php if($st->Status == 1) { ?>
                                                        <span class="badge bg-success px-3 py-2">Active</span>
                                                    <?php } else { ?>
                                                        <span class="badge bg-danger px-3 py-2">Inactive</span>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan="4" class="text-muted text-center py-4">No student records registered yet.</td>
                                        </tr>
                                    <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="white-panel-card">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="brand-font fw-bold m-0 text-dark"><i class="fa-solid fa-bell text-warning me-2"></i>Campus Notices Ticker</h4>
                        <a href="manage-notices.php" class="btn btn-sm btn-outline-warning text-dark rounded-pill px-3 fw-bold">Manage Notices</a>
                    </div>
                    <div class="list-group list-group-flush">
                        <?php 
                        if ($dbh) {
                            $sqlNotices = "SELECT id, noticeTitle, postingDate from tblnotice order by id desc limit 4";
                            $queryNotices = $dbh->prepare($sqlNotices);
                            $queryNotices->execute();
                            $recentNotices = $queryNotices->fetchAll(PDO::FETCH_OBJ);
                            if($queryNotices->rowCount() > 0) {
                                foreach($recentNotices as $nt) { ?>
                                    <div class="list-group-item bg-transparent px-0 py-3 border-bottom">
                                        <div class="fw-bold text-dark mb-1"><?php echo htmlentities($nt->noticeTitle);?></div>
                                        <div class="d-flex justify-content-between align-items-center small text-muted">
                                            <span><i class="fa-regular fa-clock me-1"></i> <?php echo htmlentities($nt->postingDate);?></span>
                                            <a href="notice-details.php?nid=<?php echo htmlentities($nt->id);?>" target="_blank" class="text-primary fw-bold text-decoration-none">View Notice <i class="fa-solid fa-arrow-up-right-from-square ms-1 small"></i></a>
                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <div class="text-muted text-center py-4">No active notices published yet.</div>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
