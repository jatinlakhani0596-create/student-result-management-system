<?php
session_start();
error_reporting(0);
include('includes/config.php');

function getGradeDetails($marks) {
    if ($marks >= 90) return array('grade' => 'O', 'remark' => 'Outstanding', 'gp' => 10.0, 'badge' => 'bg-success');
    if ($marks >= 80) return array('grade' => 'A+', 'remark' => 'Excellent', 'gp' => 9.0, 'badge' => 'bg-success');
    if ($marks >= 70) return array('grade' => 'A', 'remark' => 'Very Good', 'gp' => 8.0, 'badge' => 'bg-info');
    if ($marks >= 60) return array('grade' => 'B+', 'remark' => 'Good', 'gp' => 7.0, 'badge' => 'bg-info');
    if ($marks >= 50) return array('grade' => 'B', 'remark' => 'Above Average', 'gp' => 6.0, 'badge' => 'bg-primary');
    if ($marks >= 40) return array('grade' => 'C', 'remark' => 'Pass', 'gp' => 5.0, 'badge' => 'bg-warning text-dark');
    return array('grade' => 'F', 'remark' => 'Fail', 'gp' => 0.0, 'badge' => 'bg-danger');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gyanmanjari Innovative University | Official Grade Transcript</title>
    <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" />
    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        h1, h2, h3, h4, h5, .brand-font { font-family: 'Outfit', sans-serif; }

        body {
            background-color: #f8fafc;
            color: #0f172a;
            padding: 40px 15px;
        }

        .transcript-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.06);
            border: 2px solid #e2e8f0;
            max-width: 900px;
            margin: 0 auto;
            padding: 45px;
            position: relative;
        }

        .gmiu-seal {
            height: 85px;
            width: 85px;
            border-radius: 50%;
            background: #ffffff;
            padding: 3px;
            border: 3px solid #2563eb;
            box-shadow: 0 4px 20px rgba(37, 99, 235, 0.25);
        }

        .header-title-box {
            border-bottom: 2px solid #2563eb;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .student-info-grid {
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 18px;
            padding: 24px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
        }

        .info-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .info-value {
            font-size: 16px;
            color: #0f172a;
            font-weight: 700;
        }

        .table-transcript-custom th {
            background: #0f172a;
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
            padding: 14px;
        }

        .table-transcript-custom td {
            padding: 14px;
            vertical-align: middle;
        }

        .summary-metric-box {
            background: #f1f5f9;
            border-radius: 16px;
            padding: 20px;
            border: 1px solid #cbd5e1;
        }

        @media print {
            body { background: #ffffff; padding: 0; }
            .no-print { display: none !important; }
            .transcript-card {
                box-shadow: none;
                border: 1px solid #000;
                padding: 25px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="transcript-card" id="printableArea">

            <!-- Official Seal Header -->
            <div class="text-center header-title-box">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" alt="GMIU Seal" class="gmiu-seal mb-2">
                <h2 class="brand-font fw-extrabold m-0 text-dark" style="letter-spacing: 0.5px;">GYANMANJARI INNOVATIVE UNIVERSITY</h2>
                <div class="text-primary fw-extrabold fs-6 text-uppercase tracking-wider mt-1">Official Student Grade Sheet & Marksheet Transcript</div>
                <div class="text-muted small fw-medium">Established under Gujarat Private Universities Act &nbsp;|&nbsp; Bhavnagar, Gujarat</div>
            </div>

            <?php
            $rollid = $_POST['rollid'];
            $_SESSION['rollid'] = $rollid;

            if ($dbh) {
                $qery = "SELECT StudentName, RollId, RegDate, StudentId, Status, StudentEmail from tblstudents where RollId = :rollid";
                $stmt = $dbh->prepare($qery);
                $stmt->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                $stmt->execute();
                $resultss = $stmt->fetchAll(PDO::FETCH_OBJ);

                if ($stmt->rowCount() > 0) {
                    foreach ($resultss as $row) {
                        $studentId = $row->StudentId;
                    ?>
                        <!-- Student Profile Info Card -->
                        <div class="student-info-grid">
                            <div class="row g-3">
                                <div class="col-md-5 col-6">
                                    <div class="info-label">Candidate Name</div>
                                    <div class="info-value text-primary"><?php echo htmlentities($row->StudentName); ?></div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="info-label">Roll ID / Enrollment No.</div>
                                    <div class="info-value"><span class="badge bg-dark border text-white px-3 py-2 fs-6"><?php echo htmlentities($row->RollId); ?></span></div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="info-label">Student Email</div>
                                    <div class="info-value text-secondary fs-6"><?php echo htmlentities($row->StudentEmail); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- Subject Mark & Grade Table -->
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered table-transcript-custom align-middle text-center">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">#</th>
                                    <th class="text-start">Subject Title</th>
                                    <th style="width: 130px;">Subject Code</th>
                                    <th style="width: 110px;">Max Marks</th>
                                    <th style="width: 130px;">Marks Obtained</th>
                                    <th style="width: 100px;">Grade</th>
                                    <th style="width: 110px;">Grade Point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT tr.marks, tblsubjects.SubjectName, tblsubjects.SubjectCode from tblresult as tr join tblsubjects on tblsubjects.id=tr.SubjectId where tr.StudentId = :studentid ORDER BY tblsubjects.id ASC";
                                $query = $dbh->prepare($query);
                                $query->bindParam(':studentid', $studentId, PDO::PARAM_STR);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                $totlcount = 0;
                                $totalGradePoints = 0;

                                if ($query->rowCount() > 0) {
                                    foreach ($results as $result) { 
                                        $score = $result->marks;
                                        $gInfo = getGradeDetails($score);
                                        $totlcount += $score;
                                        $totalGradePoints += $gInfo['gp'];
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                            <td class="text-start fw-bold text-dark"><?php echo htmlentities($result->SubjectName); ?></td>
                                            <td><span class="badge bg-light text-dark border font-monospace"><?php echo htmlentities($result->SubjectCode ? $result->SubjectCode : 'SUB-0' . $cnt); ?></span></td>
                                            <td class="text-muted fw-semibold">100</td>
                                            <td class="fw-bold text-primary fs-6"><?php echo htmlentities($score); ?></td>
                                            <td><span class="badge <?php echo $gInfo['badge']; ?> px-3 py-2 fw-extrabold"><?php echo $gInfo['grade']; ?></span></td>
                                            <td class="fw-bold text-dark"><?php echo number_format($gInfo['gp'], 1); ?></td>
                                        </tr>
                                    <?php
                                    $cnt++;
                                    }
                                    $subjectCount = $cnt - 1;
                                    $outof = $subjectCount * 100;
                                    $percentage = round(($totlcount * 100) / $outof, 2);
                                    $cgpa = round($totalGradePoints / $subjectCount, 2);
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Overall Summary Cards Grid -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-3 col-6">
                                <div class="summary-metric-box text-center">
                                    <div class="info-label mb-1">Total Marks Score</div>
                                    <div class="fw-extrabold fs-4 text-dark"><?php echo htmlentities($totlcount); ?> / <?php echo htmlentities($outof); ?></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="summary-metric-box text-center">
                                    <div class="info-label mb-1">Percentage Score</div>
                                    <div class="fw-extrabold fs-4 text-primary"><?php echo htmlentities($percentage); ?> %</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="summary-metric-box text-center">
                                    <div class="info-label mb-1">Cumulative SGPA / CGPA</div>
                                    <div class="fw-extrabold fs-4 text-purple" style="color:#7c3aed;"><?php echo htmlentities($cgpa); ?> / 10.0</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="summary-metric-box text-center">
                                    <div class="info-label mb-1">Final Result Status</div>
                                    <div>
                                        <?php if ($percentage >= 75) { ?>
                                            <span class="badge bg-success px-3 py-2 fs-6">PASS (Distinction)</span>
                                        <?php } else if ($percentage >= 50) { ?>
                                            <span class="badge bg-info text-white px-3 py-2 fs-6">PASS (First Class)</span>
                                        <?php } else if ($percentage >= 40) { ?>
                                            <span class="badge bg-warning text-dark px-3 py-2 fs-6">PASS (Second Class)</span>
                                        <?php } else { ?>
                                            <span class="badge bg-danger px-3 py-2 fs-6">FAILED</span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Official Seals Footer Signature -->
                        <div class="row align-items-center pt-4 border-top">
                            <div class="col-sm-6 text-start mb-3 mb-sm-0">
                                <div class="small text-muted mb-1"><i class="fa-solid fa-qrcode me-1"></i> Digitally Verified Transcript</div>
                                <div class="small text-muted">Date of Issue: <strong><?php echo date('d F Y'); ?></strong></div>
                            </div>
                            <div class="col-sm-6 text-end">
                                <div class="fw-bold text-dark mb-1">Controller of Examinations</div>
                                <div class="small text-muted">Gyanmanjari Innovative University</div>
                            </div>
                        </div>

                    <?php } else { ?>
                        <div class="alert alert-warning p-4 rounded-3 text-center my-4">
                            <i class="fa-solid fa-triangle-exclamation fs-2 mb-2 d-block"></i>
                            <h5 class="fw-bold">Result Pending Declaration</h5>
                            <p class="m-0 small">Result records have not been declared for this student yet by the Examination Controller.</p>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="alert alert-danger p-4 rounded-3 text-center my-4">
                        <i class="fa-solid fa-circle-xmark fs-2 mb-2 d-block"></i>
                        <h5 class="fw-bold">Invalid Roll ID</h5>
                        <p class="m-0 small">No matching student record found for Roll ID: <strong><?php echo htmlentities($rollid); ?></strong>.</p>
                    </div>
                <?php }
            } ?>

            <!-- Print & Action Controls -->
            <div class="no-print d-flex justify-content-between align-items-center pt-4 border-top mt-4">
                <a href="find-result.php" class="btn btn-outline-secondary rounded-pill px-4"><i class="fa-solid fa-arrow-left me-2"></i>Search Another Result</a>
                <button onclick="window.print()" class="btn btn-primary rounded-pill px-5 py-2.5 fw-bold shadow"><i class="fa-solid fa-print me-2"></i>Print Official Marksheet Transcript</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
