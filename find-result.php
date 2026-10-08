<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gyanmanjari Innovative University | Find Student Result</title>
        <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" />
        <!-- Google Fonts & FontAwesome -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            :root {
                --gmiu-blue: #2563eb;
                --gmiu-dark: #0f172a;
            }
            * { font-family: 'Plus Jakarta Sans', sans-serif; }
            h1, h2, h3, h4, h5, .brand-font { font-family: 'Outfit', sans-serif; }

            body {
                background: linear-gradient(135deg, rgba(15, 23, 42, 0.92) 0%, rgba(30, 58, 138, 0.88) 100%), url('4-page.jpg') no-repeat center center fixed;
                background-size: cover;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 30px 15px;
            }

            .result-card {
                background: #ffffff;
                border-radius: 28px;
                padding: 45px;
                box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);
                max-width: 520px;
                width: 100%;
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            .gmiu-seal {
                height: 80px;
                width: 80px;
                border-radius: 50%;
                background: #fff;
                padding: 2px;
                border: 3px solid var(--gmiu-blue);
                box-shadow: 0 4px 20px rgba(37, 99, 235, 0.3);
            }

            .form-control {
                padding: 14px 20px;
                border-radius: 14px;
                border: 1px solid #cbd5e1;
                font-weight: 600;
                font-size: 16px;
            }

            .form-control:focus {
                border-color: var(--gmiu-blue);
                box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15);
            }

            .btn-search {
                background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
                color: #ffffff;
                font-weight: 800;
                border-radius: 14px;
                padding: 16px;
                border: none;
                font-size: 17px;
                box-shadow: 0 6px 20px rgba(37, 99, 235, 0.35);
                transition: all 0.3s ease;
            }

            .btn-search:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(37, 99, 235, 0.5);
                color: #ffffff;
            }
        </style>
    </head>
    <body>
        <div class="result-card text-center">
            <a href="index.php" class="text-decoration-none">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" alt="GMIU Seal" class="gmiu-seal mb-3">
                <h3 class="brand-font fw-extrabold text-dark m-0">GYANMANJARI UNIVERSITY</h3>
                <div class="text-primary fw-bold small text-uppercase tracking-wider mb-4">Official Student Result Portal</div>
            </a>

            <form action="result.php" method="post" class="text-start">
                <input type="hidden" name="class" value="1">
                <div class="mb-4">
                    <label class="form-label fw-bold text-dark"><i class="fa-solid fa-id-card text-primary me-2"></i>Enter Registration / Roll No.</label>
                    <input type="text" class="form-control" name="rollid" placeholder="e.g. 10101 / MCA101 / BCA201" required autocomplete="off">
                    <div class="form-text text-muted small mt-2"><i class="fa-solid fa-circle-info me-1"></i>Enter your university roll ID to view your transcript.</div>
                </div>

                <button type="submit" class="btn btn-search w-100 mb-3"><i class="fa-solid fa-magnifying-glass me-2"></i>View Official Result Transcript</button>

                <div class="text-center pt-2">
                    <a href="index.php" class="text-secondary fw-semibold small text-decoration-none"><i class="fa-solid fa-arrow-left me-1"></i> Back to Main Homepage</a>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
