<?php
error_reporting(0);
include('includes/config.php'); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="About Gyanmanjari Innovative University (GMIU) - Leading Technological & Research University in Bhavnagar, Gujarat" />
        <title>About GMIU | Gyanmanjari Innovative University</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" />
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <!-- FontAwesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            :root {
                --brand-dark: #080e1e;
                --brand-navy: #0f172a;
                --brand-blue: #2563eb;
                --brand-cyan: #06b6d4;
                --brand-amber: #f59e0b;
                --accent-gradient: linear-gradient(135deg, #ff9900 0%, #ff5500 100%);
                --glass-bg: rgba(15, 23, 42, 0.85);
                --glass-border: rgba(255, 255, 255, 0.12);
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Plus Jakarta Sans', sans-serif;
            }

            body {
                background: linear-gradient(135deg, rgba(248, 250, 252, 0.94) 0%, rgba(241, 245, 249, 0.96) 100%), url('4-page.jpg') no-repeat center center fixed;
                background-size: cover;
                color: #0f172a;
                min-height: 100vh;
            }

            h1, h2, h3, h4, h5, h6, .display-font {
                font-family: 'Outfit', sans-serif;
            }

            .top-bar {
                background: #0f172a;
                color: #94a3b8;
                font-size: 13px;
                padding: 9px 0;
                border-bottom: 1px solid rgba(255,255,255,0.08);
            }

            .navbar-gmiu {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(16px);
                border-bottom: 1px solid #e2e8f0;
                padding: 14px 0;
                box-shadow: 0 4px 20px rgba(0,0,0,0.04);
            }

            .navbar-brand-logo {
                height: 48px;
                width: 48px;
                border-radius: 50%;
                background: #ffffff;
                padding: 3px;
                box-shadow: 0 0 15px rgba(37, 99, 235, 0.25);
            }

            .nav-link-custom {
                color: #1e293b !important;
                font-weight: 700;
                font-size: 15px;
                margin: 0 8px;
            }

            .btn-gmiu-glow {
                background: var(--accent-gradient);
                color: #ffffff !important;
                font-weight: 700;
                font-size: 15px;
                border: none;
                border-radius: 50px;
                padding: 10px 24px;
                box-shadow: 0 4px 20px rgba(255, 85, 0, 0.3);
            }

            .about-hero {
                padding: 80px 0 50px 0;
                text-center: center;
            }

            .glass-card {
                background: #ffffff;
                border: 1px solid #e2e8f0;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
                border-radius: 24px;
                padding: 35px;
            }
        </style>
    </head>
    <body>

        <!-- Top Announcement Bar -->
        <div class="top-bar">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fa-solid fa-location-dot me-2 text-warning"></i> Bhavnagar, Gujarat, India &nbsp;|&nbsp; 
                        <i class="fa-solid fa-envelope ms-2 me-1 text-warning"></i> info@gmiu.edu.in
                    </div>
                    <div class="d-none d-md-block">
                        <i class="fa-solid fa-graduation-cap me-1 text-warning"></i> Admissions 2026-27 Open &nbsp;|&nbsp;
                        <a href="find-result.php" class="text-white"><i class="fa-solid fa-award me-1"></i> Check Results Portal</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-gmiu sticky-top">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" alt="GMIU Seal" class="navbar-brand-logo me-3">
                    <div>
                        <div class="display-font fw-extrabold text-dark" style="font-size: 20px; line-height: 1; letter-spacing: 0.5px;">GYANMANJARI UNIVERSITY</div>
                        <div style="font-size: 11px; color: #2563eb; font-weight: 700; letter-spacing: 1px; margin-top: 2px;">INNOVATIVE ACADEMIC EXCELLENCE</div>
                    </div>
                </a>
                
                <button class="navbar-toggler border-0 shadow-none text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <i class="fa-solid fa-bars fs-3" style="color:#0f172a;"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"><a class="nav-link nav-link-custom" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link nav-link-custom active" href="https://gmiu.edu.in/gmiu/website/about/about_university.php" target="_blank">About GMIU <i class="fa-solid fa-arrow-up-right-from-square ms-1 small"></i></a></li>
                        <li class="nav-item"><a class="nav-link nav-link-custom" href="index.php#academics">Academics</a></li>
                        <li class="nav-item"><a class="nav-link nav-link-custom" href="index.php#notices">Notices</a></li>
                        <li class="nav-item ms-lg-3 my-2 my-lg-0">
                            <a href="find-result.php" class="btn btn-gmiu-glow me-2"><i class="fa-solid fa-award me-1"></i> Student Result</a>
                            <a href="admin-login.php" class="btn btn-outline-primary rounded-pill px-4 py-2 fw-bold"><i class="fa-solid fa-user-gear me-1"></i> Admin Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <header class="about-hero text-center">
            <div class="container">
                <span class="badge bg-primary-subtle text-primary fw-bold px-3 py-2 rounded-pill mb-3">ESTABLISHED FOR INNOVATION</span>
                <h1 class="display-font display-4 fw-extrabold text-dark mb-3">About Gyanmanjari Innovative University (GMIU)</h1>
                <p class="fs-5 text-muted mx-auto mb-4" style="max-width: 750px;">
                    Fostering technological advancement, scientific inquiry, and global leadership in Bhavnagar, Gujarat.
                </p>
                <a href="https://gmiu.edu.in/gmiu/website/about/about_university.php" target="_blank" class="btn btn-gmiu-glow btn-lg px-4 py-3"><i class="fa-solid fa-globe me-2"></i> Visit Official GMIU About University Portal <i class="fa-solid fa-arrow-up-right-from-square ms-1 small"></i></a>
            </div>
        </header>

        <!-- Main Content -->
        <main class="py-5">
            <div class="container">
                <div class="row g-4 mb-5">
                    <div class="col-lg-6">
                        <div class="glass-card h-100">
                            <h3 class="display-font fw-bold text-primary mb-3"><i class="fa-solid fa-compass me-2"></i>Our Vision</h3>
                            <p class="text-muted leading-relaxed">
                                To be a globally recognized center of academic excellence and innovation, producing socially responsible technocrats, research scholars, and leaders who drive positive change in society.
                            </p>
                            <h3 class="display-font fw-bold text-primary mb-3 mt-4"><i class="fa-solid fa-bullseye me-2"></i>Our Mission</h3>
                            <ul class="list-unstyled text-muted">
                                <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Provide industry-aligned curricula and hands-on laboratory experiences.</li>
                                <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Promote interdisciplinary research and entrepreneurship.</li>
                                <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Nurture ethical values, leadership qualities, and global competencies.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="glass-card h-100 text-center">
                            <img src="4-page.jpg" alt="GMIU Campus Background" class="img-fluid rounded-4 shadow-sm mb-3" style="max-height: 300px; width: 100%; object-fit: cover;">
                            <h5 class="fw-bold text-dark mb-1">GMIU Main Campus - Bhavnagar</h5>
                            <p class="text-muted small">World-Class Infrastructure & Research Labs</p>
                        </div>
                    </div>
                </div>

                <!-- 4 Campus Feature Highlights -->
                <div class="glass-card mb-5">
                    <div class="text-center mb-4">
                        <span class="text-primary fw-bold text-uppercase small">CAMPUS INFRASTRUCTURE</span>
                        <h3 class="display-font fw-bold text-dark mt-1">GMIU Campus Life & Facilities</h3>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-3 col-sm-6">
                            <div class="p-4 rounded-4 text-center h-100 border bg-light">
                                <div class="fs-1 text-primary mb-3"><i class="fa-solid fa-landmark"></i></div>
                                <h6 class="fw-bold text-dark mb-1">Main Academic Wing</h6>
                                <p class="text-muted small mb-0">Spacious Classrooms & Tech Hub</p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="p-4 rounded-4 text-center h-100 border bg-light">
                                <div class="fs-1 text-success mb-3"><i class="fa-solid fa-person-chalkboard"></i></div>
                                <h6 class="fw-bold text-dark mb-1">Grand Auditorium</h6>
                                <p class="text-muted small mb-0">High-Tech Seminar & Event Hall</p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="p-4 rounded-4 text-center h-100 border bg-light">
                                <div class="fs-1 text-warning mb-3"><i class="fa-solid fa-laptop-code"></i></div>
                                <h6 class="fw-bold text-dark mb-1">Advanced Tech Labs</h6>
                                <p class="text-muted small mb-0">AI, ML & Computing Systems</p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="p-4 rounded-4 text-center h-100 border bg-light">
                                <div class="fs-1 text-danger mb-3"><i class="fa-solid fa-building"></i></div>
                                <h6 class="fw-bold text-dark mb-1">Research Facilities</h6>
                                <p class="text-muted small mb-0">Advanced Campus Infrastructure</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="py-4 bg-dark text-white text-center border-top border-secondary border-opacity-25">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-between align-items-center small text-white-50">
                    <div>&copy; <?php echo date('Y'); ?> <strong>Gyanmanjari Innovative University (GMIU)</strong>. All Rights Reserved.</div>
                    <div><a href="index.php" class="text-white-50 text-decoration-none">Back to Home</a></div>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
