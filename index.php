<?php
error_reporting(0);
include('includes/config.php'); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Gyanmanjari Innovative University (GMIU) - Leading Technological & Research University" />
        <meta name="author" content="Gyanmanjari Innovative University" />
        <title>Gyanmanjari Innovative University (GMIU) | Bhavnagar</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" />
        <!-- Google Fonts: Plus Jakarta Sans & Outfit -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <!-- FontAwesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            :root {
                --brand-dark: #0f172a;
                --brand-navy: #1e293b;
                --brand-blue: #2563eb;
                --brand-cyan: #0284c7;
                --brand-amber: #d97706;
                --brand-orange: #ff5500;
                --brand-gradient: linear-gradient(135deg, #2563eb 0%, #3b82f6 50%, #0284c7 100%);
                --accent-gradient: linear-gradient(135deg, #ff9900 0%, #ff5500 100%);
                --glass-bg: rgba(255, 255, 255, 0.94);
                --glass-border: #e2e8f0;
                --card-bg: #ffffff;
                --text-main: #0f172a;
                --text-muted: #64748b;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Plus Jakarta Sans', sans-serif;
            }

            body {
                background: linear-gradient(180deg, rgba(15, 23, 42, 0.40), rgba(15, 23, 42, 0.12)), url('https://admission.gmiu.edu.in/assets/common/gyanmanjari-innovative-university.webp') no-repeat center center fixed;
                background-size: cover;
                color: #f8fafc;
                overflow-x: hidden;
            }

            .text-gradient {
                background: linear-gradient(90deg, #2563eb, #ff7a00);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                display: inline-block;
            }

            .hero-section {
                background: transparent;
                padding: 110px 0 120px 0;
                position: relative;
                color: #ffffff;
                min-height: calc(100vh - 122px);
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
            }
            .hero-section::before {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(180deg, rgba(8, 15, 33, 0.85) 0%, rgba(13, 23, 44, 0.94) 100%);
                pointer-events: none;
            }
            .hero-section .container {
                position: relative;
                z-index: 1;
            }

            /* Golden Academic Badge */
            .hero-badge-pill {
                display: inline-flex;
                align-items: center;
                gap: 9px;
                background: rgba(245, 158, 11, 0.12);
                border: 1px solid rgba(245, 158, 11, 0.4);
                box-shadow: 0 4px 20px rgba(245, 158, 11, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.2);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                padding: 8px 22px;
                border-radius: 9999px;
                font-family: 'Outfit', sans-serif;
                font-size: 13px;
                font-weight: 700;
                letter-spacing: 1px;
                text-transform: uppercase;
                color: #fbbf24;
                margin-bottom: 24px;
                transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            }
            .hero-badge-pill:hover {
                transform: translateY(-2px);
                background: rgba(245, 158, 11, 0.2);
                border-color: #fbbf24;
                box-shadow: 0 6px 25px rgba(245, 158, 11, 0.3);
                color: #fef08a;
            }
            .hero-badge-pill .star-icon {
                color: #fbbf24;
                font-size: 13px;
                filter: drop-shadow(0 0 6px rgba(251, 191, 36, 0.7));
            }

            /* Headline Typography */
            .hero-heading {
                font-family: 'Outfit', sans-serif;
                font-size: clamp(2.6rem, 6vw, 4.5rem);
                font-weight: 900;
                line-height: 1.12;
                letter-spacing: -0.03em;
                margin-bottom: 24px;
            }
            .hero-title-main {
                color: #ffffff;
                display: block;
                font-weight: 800;
                text-shadow: 0 4px 25px rgba(0, 0, 0, 0.8);
            }
            .hero-title-gradient {
                display: inline-block;
                background: linear-gradient(90deg, #ffea79 0%, #ffc107 35%, #ff9800 70%, #ff5722 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                filter: drop-shadow(0 4px 22px rgba(255, 152, 0, 0.45));
                font-weight: 900;
            }

            /* Clean Subtitle */
            .hero-description {
                font-family: 'Plus Jakarta Sans', sans-serif;
                font-size: clamp(1.1rem, 1.35vw, 1.25rem);
                font-weight: 400;
                line-height: 1.8;
                color: #cbd5e1;
                max-width: 740px;
                margin: 0 auto 38px auto;
                text-shadow: 0 2px 10px rgba(0, 0, 0, 0.8);
            }

            /* Action Buttons */
            .btn-hero-primary {
                background: linear-gradient(135deg, #ff9800 0%, #f57c00 50%, #e65100 100%);
                color: #ffffff !important;
                font-family: 'Outfit', sans-serif;
                font-weight: 700;
                font-size: 16px;
                letter-spacing: 0.3px;
                border: none;
                border-radius: 9999px;
                padding: 15px 36px;
                box-shadow: 0 8px 25px rgba(230, 81, 0, 0.45);
                transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
                display: inline-flex;
                align-items: center;
                text-decoration: none;
            }
            .btn-hero-primary:hover {
                transform: translateY(-3px) scale(1.02);
                box-shadow: 0 12px 35px rgba(230, 81, 0, 0.65);
                color: #ffffff !important;
            }
            .btn-hero-secondary {
                background: rgba(255, 255, 255, 0.08);
                backdrop-filter: blur(14px);
                -webkit-backdrop-filter: blur(14px);
                border: 1.5px solid rgba(255, 255, 255, 0.3);
                color: #ffffff !important;
                font-family: 'Outfit', sans-serif;
                font-weight: 700;
                font-size: 16px;
                letter-spacing: 0.3px;
                border-radius: 9999px;
                padding: 15px 36px;
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
                transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
                display: inline-flex;
                align-items: center;
                text-decoration: none;
            }
            .btn-hero-secondary:hover {
                background: rgba(255, 255, 255, 0.16);
                border-color: #ffffff;
                transform: translateY(-3px) scale(1.02);
                box-shadow: 0 10px 25px rgba(255, 255, 255, 0.15);
                color: #ffffff !important;
            }

            .hero-visual {
                position: relative;
                border-radius: 32px;
                overflow: hidden;
                box-shadow: 0 30px 60px rgba(15, 23, 42, 0.12);
            }
            .hero-visual img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: block;
            }
            .hero-visual::after {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(180deg, rgba(15, 23, 42, 0.08), rgba(15, 23, 42, 0.26));
            }
            .hero-visual-label {
                position: absolute;
                left: 0;
                right: 0;
                bottom: 0;
                padding: 20px 24px;
                background: rgba(15, 23, 42, 0.55);
                color: #ffffff;
                font-weight: 700;
                letter-spacing: 0.4px;
            }

            h1, h2, h3, h4, h5, h6, .display-font {
                font-family: 'Outfit', sans-serif;
            }

            html {
                scroll-behavior: smooth;
            }

            /* Custom Top Bar */
            .top-bar {
                background: #0f172a;
                color: #94a3b8;
                font-size: 13px;
                padding: 9px 0;
                border-bottom: 1px solid rgba(255,255,255,0.08);
            }
            .top-bar a {
                color: #f8fafc;
                text-decoration: none;
                transition: color 0.2s ease;
            }
            .top-bar a:hover {
                color: var(--brand-amber);
            }

            /* Navbar Theme */
            .navbar-gmiu {
                background: rgba(15, 23, 42, 0.78);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                border-bottom: 1px solid rgba(255,255,255,0.08);
                padding: 14px 0;
                transition: all 0.3s ease;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.18);
            }
            .navbar-brand-logo {
                height: 48px;
                width: 48px;
                border-radius: 50%;
                background: rgba(255,255,255,0.95);
                padding: 3px;
                box-shadow: 0 0 15px rgba(37, 99, 235, 0.25);
                transition: transform 0.3s ease;
            }
            .navbar-brand:hover .navbar-brand-logo {
                transform: rotate(10deg) scale(1.05);
            }
            .navbar-brand,
            .nav-link-custom,
            .navbar-toggler i,
            .btn-outline-info {
                color: #f8fafc !important;
                border-color: rgba(248,250,252,0.55) !important;
                text-shadow: 0 8px 20px rgba(0, 0, 0, 0.16);
            }
            .nav-link-custom {
                font-weight: 700;
                font-size: 15px;
                margin: 0 8px;
                position: relative;
                transition: all 0.3s ease;
            }
            .nav-link-custom::after {
                content: '';
                position: absolute;
                bottom: -4px;
                left: 50%;
                transform: translateX(-50%);
                width: 0;
                height: 3px;
                background: var(--accent-gradient);
                border-radius: 2px;
                transition: width 0.3s ease;
            }
            .nav-link-custom:hover::after, .nav-link-custom.active::after {
                width: 100%;
            }
            .nav-link-custom:hover {
                color: #ffffff !important;
            }
            .navbar-toggler i {
                color: #f8fafc;
            }
 
            /* Glowing CTA Button */
            .btn-gmiu-glow {
                background: var(--accent-gradient);
                color: #ffffff !important;
                font-weight: 700;
                font-size: 15px;
                border: none;
                border-radius: 50px;
                padding: 10px 24px;
                box-shadow: 0 4px 20px rgba(255, 85, 0, 0.3);
                transition: all 0.3s ease;
            }
            .btn-gmiu-glow:hover {
                transform: translateY(-3px) scale(1.03);
                box-shadow: 0 8px 30px rgba(255, 85, 0, 0.5);
                color: #fff !important;
            }

            /* Hero Section */
            .hero-section {
                background: transparent;
                padding: 100px 0 110px 0;
                position: relative;
                color: #0f172a;
            }
            .about-gmiu-bg {
                background: rgba(255, 255, 255, 0.90);
                backdrop-filter: blur(12px);
                color: #0f172a;
            }
            .hero-section::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: radial-gradient(circle at 80% 20%, rgba(37, 99, 235, 0.08) 0%, transparent 50%),
                            radial-gradient(circle at 20% 80%, rgba(2, 132, 199, 0.08) 0%, transparent 50%);
                pointer-events: none;
            }
            .hero-badge {
                background: rgba(37, 99, 235, 0.1);
                color: #2563eb;
                border: 1px solid rgba(37, 99, 235, 0.25);
                padding: 8px 18px;
                border-radius: 50px;
                font-size: 14px;
                font-weight: 700;
                letter-spacing: 0.5px;
                display: inline-block;
                margin-bottom: 20px;
            }

            /* Quick Action Cards Light */
            .action-card {
                background: #ffffff;
                border-radius: 20px;
                padding: 30px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
                border: 1px solid #e2e8f0;
                transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                height: 100%;
                text-decoration: none !important;
                display: block;
            }
            .action-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 20px 40px rgba(37, 99, 235, 0.12);
                border-color: #2563eb;
            }
            .icon-wrapper {
                width: 64px;
                height: 64px;
                border-radius: 16px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 28px;
                margin-bottom: 20px;
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
                        <a href="find-result.php"><i class="fa-solid fa-award me-1"></i> Check Results Portal <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-gmiu sticky-top">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" alt="GMIU Seal" class="navbar-brand-logo me-3">
                    <div>
                        <div class="display-font fw-extrabold text-white" style="font-size: 20px; line-height: 1; letter-spacing: 0.5px;">GYANMANJARI UNIVERSITY</div>
                        <div style="font-size: 11px; color: #93c5fd; font-weight: 700; letter-spacing: 1px; margin-top: 2px;">INNOVATIVE ACADEMIC EXCELLENCE</div>
                    </div>
                </a>
                
                <button class="navbar-toggler border-0 shadow-none text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <i class="fa-solid fa-bars fs-3" style="color:#fff;"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"><a class="nav-link nav-link-custom active" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link nav-link-custom" href="https://gmiu.edu.in/gmiu/website/about/about_university.php" target="_blank">About GMIU <i class="fa-solid fa-arrow-up-right-from-square ms-1 small"></i></a></li>
                        <li class="nav-item"><a class="nav-link nav-link-custom" href="#academics">Academics</a></li>
                        <li class="nav-item"><a class="nav-link nav-link-custom" href="#notices">Notices</a></li>
                        <li class="nav-item ms-lg-3 my-2 my-lg-0">
                            <a href="find-result.php" class="btn btn-gmiu-glow me-2"><i class="fa-solid fa-award me-1"></i> Student Result</a>
                            <a href="admin-login.php" class="btn btn-outline-info rounded-pill px-4 py-2 fw-bold"><i class="fa-solid fa-user-gear me-1"></i> Admin Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <header class="hero-section text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-9">
                        <div class="hero-badge-pill">
                            <i class="fa-solid fa-star star-icon"></i>
                            <span>Bhavnagar's Premier Technological &amp; Research Campus</span>
                        </div>
                        <h1 class="hero-heading">
                            <span class="hero-title-main">Empowering Minds,</span>
                            <span class="hero-title-gradient">Transforming Tomorrow</span>
                        </h1>
                        <p class="hero-description">
                            <span class="text-white fw-semibold">Gyanmanjari Innovative University (GMIU)</span> delivers modern academic programs, cutting-edge research labs, and a student-first campus experience in <span class="text-white fw-semibold">Bhavnagar, Gujarat</span>.
                        </p>
                        <div class="d-flex flex-wrap gap-3 justify-content-center">
                            <a href="find-result.php" class="btn btn-hero-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Check Examination Results</a>
                            <a href="admin-login.php" class="btn btn-hero-secondary"><i class="fa-solid fa-shield-halved me-2"></i>SuperAdmin Control Center</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Workspace Portals -->
        <section class="py-5" id="academics">
            <div class="container py-4">
                <div class="text-center mb-5">
                    <span class="fw-bold text-uppercase tracking-wider small" style="color: #ffffff;">University Portals</span>
                    <h2 class="display-font fw-bold mt-1" style="color: #ffffff;">Instant Student & Admin Services</h2>
                </div>

                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <a href="find-result.php" class="action-card">
                            <div class="icon-wrapper bg-primary-subtle text-primary">
                                <i class="fa-solid fa-award"></i>
                            </div>
                            <h4 class="display-font fw-bold text-dark mb-2">Student Result Portal</h4>
                            <p class="text-muted small mb-0">Search and download official semester marksheet transcripts directly by Roll ID.</p>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <a href="admin-login.php" class="action-card">
                            <div class="icon-wrapper bg-success-subtle text-success">
                                <i class="fa-solid fa-user-shield"></i>
                            </div>
                            <h4 class="display-font fw-bold text-dark mb-2">Admin Control Center</h4>
                            <p class="text-muted small mb-0">Manage student admissions, course subjects, exam results, and campus notices.</p>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <a href="#notices" class="action-card">
                            <div class="icon-wrapper bg-warning-subtle text-warning">
                                <i class="fa-solid fa-bullhorn"></i>
                            </div>
                            <h4 class="display-font fw-bold text-dark mb-2">Campus Notice Board</h4>
                            <p class="text-muted small mb-0">View latest university circulars, exam timetables, and official announcements.</p>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <a href="#about" class="action-card">
                            <div class="icon-wrapper bg-danger-subtle text-danger">
                                <i class="fa-solid fa-building-columns"></i>
                            </div>
                            <h4 class="display-font fw-bold text-dark mb-2">Academic Programs</h4>
                            <p class="text-muted small mb-0">Explore state-of-the-art infrastructure, computer labs, and digital research centers.</p>
                        </a>
                    </div>
                </div>
            </div>
        <!-- About GMIU Section -->
        <section class="py-5 about-gmiu-bg border-top" id="about">
            <div class="container py-4">
                <div class="row align-items-center g-5 mb-5">
                    <div class="col-lg-6">
                        <span class="text-primary fw-bold text-uppercase tracking-wider small">About University</span>
                        <h2 class="display-font fw-extrabold text-dark mt-1 mb-3 display-6">
                            Gyanmanjari Innovative University <br><span class="text-primary">(GMIU), Bhavnagar</span>
                        </h2>
                        <p class="text-muted fs-6 leading-relaxed mb-4">
                            Gyanmanjari Innovative University (GMIU) is a premier higher education institution situated in Bhavnagar, Gujarat. Dedicated to technological innovation, research-driven learning, and holistic student growth, GMIU equips future engineers, computer scientists, managers, and researchers with modern industry skills.
                        </p>
                        <a href="https://gmiu.edu.in/gmiu/website/about/about_university.php" target="_blank" class="btn btn-gmiu-glow mb-4"><i class="fa-solid fa-building-columns me-2"></i> Visit Official GMIU About University Page <i class="fa-solid fa-arrow-up-right-from-square ms-1 small"></i></a>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="p-3 bg-white rounded-3 border shadow-sm h-100">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-2 text-primary me-3"><i class="fa-solid fa-graduation-cap"></i></div>
                                        <div>
                                            <h5 class="fw-bold text-dark mb-0">50+ Courses</h5>
                                            <span class="text-muted small">UG, PG & Diploma</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="p-3 bg-white rounded-3 border shadow-sm h-100">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-2 text-success me-3"><i class="fa-solid fa-users"></i></div>
                                        <div>
                                            <h5 class="fw-bold text-dark mb-0">10,000+</h5>
                                            <span class="text-muted small">Students & Alumni</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="p-3 bg-white rounded-3 border shadow-sm h-100">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-2 text-warning me-3"><i class="fa-solid fa-award"></i></div>
                                        <div>
                                            <h5 class="fw-bold text-dark mb-0">95% Placement</h5>
                                            <span class="text-muted small">Top National Companies</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="p-3 bg-white rounded-3 border shadow-sm h-100">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-2 text-danger me-3"><i class="fa-solid fa-flask"></i></div>
                                        <div>
                                            <h5 class="fw-bold text-dark mb-0">Advanced Labs</h5>
                                            <span class="text-muted small">AI, IoT & Research</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="https://admission.gmiu.edu.in/assets/common/gyanmanjari-innovative-university.webp" alt="GMIU Main Campus Building" class="img-fluid rounded-4 shadow-lg border border-2 border-white" style="width: 100%; height: 380px; object-fit: cover;">
                            <div class="position-absolute bottom-0 start-0 m-3 p-3 bg-dark bg-opacity-75 backdrop-blur text-white rounded-3" style="backdrop-filter: blur(8px);">
                                <h6 class="fw-bold m-0"><i class="fa-solid fa-building-flag text-warning me-2"></i>GMIU Academic & Research Campus</h6>
                                <small class="text-slate-300">State-of-the-Art Infrastructure in Bhavnagar, Gujarat</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4 Campus Feature Highlights -->
                <div class="pt-4 border-top">
                    <div class="text-center mb-4">
                        <span class="text-primary fw-bold text-uppercase tracking-wider small">Campus Highlights</span>
                        <h3 class="display-font fw-bold text-dark mt-1">GMIU Campus Infrastructure & Facilities</h3>
                    </div>

                    <div class="row g-4">
                        <!-- Feature 1 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="p-4 rounded-4 text-center h-100 bg-white border shadow-sm">
                                <div class="fs-1 text-primary mb-3"><i class="fa-solid fa-landmark"></i></div>
                                <h5 class="fw-bold text-dark mb-2">Main Campus Building</h5>
                                <p class="text-muted small mb-0">Modern Administrative & Academic Infrastructure</p>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="p-4 rounded-4 text-center h-100 bg-white border shadow-sm">
                                <div class="fs-1 text-success mb-3"><i class="fa-solid fa-person-chalkboard"></i></div>
                                <h5 class="fw-bold text-dark mb-2">Grand Auditorium</h5>
                                <p class="text-muted small mb-0">Conferences, Seminars & Cultural Events</p>
                            </div>
                        </div>

                        <!-- Feature 3 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="p-4 rounded-4 text-center h-100 bg-white border shadow-sm">
                                <div class="fs-1 text-warning mb-3"><i class="fa-solid fa-laptop-code"></i></div>
                                <h5 class="fw-bold text-dark mb-2">Hi-Tech Computer Labs</h5>
                                <p class="text-muted small mb-0">AI, Data Science & Computing Research Center</p>
                            </div>
                        </div>

                        <!-- Feature 4 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="p-4 rounded-4 text-center h-100 bg-white border shadow-sm">
                                <div class="fs-1 text-danger mb-3"><i class="fa-solid fa-book-open-reader"></i></div>
                                <h5 class="fw-bold text-dark mb-2">Digital Central Library</h5>
                                <p class="text-muted small mb-0">Thousands of E-Journals, Books & Research Tools</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Live Campus Notices Ticker -->
        <section class="py-5 bg-white border-top border-bottom" id="notices">
            <div class="container">
                <div class="row align-items-center g-4">
                    <div class="col-lg-6">
                        <span class="text-primary fw-bold text-uppercase tracking-wider small">University Updates</span>
                        <h2 class="display-font fw-bold text-dark mt-1 mb-3">Official Campus Notice Board</h2>
                        <p class="text-muted mb-4 fs-6">
                            Stay up-to-date with official announcements, semester examination schedules, and campus events from Gyanmanjari Innovative University.
                        </p>
                        <a href="find-result.php" class="btn btn-primary rounded-pill px-4 py-2.5 fw-bold shadow-sm"><i class="fa-solid fa-file-invoice me-2"></i>Check Exam Result Portal</a>
                    </div>

                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm rounded-4 p-4 bg-light">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                <h5 class="display-font fw-bold m-0 text-dark"><i class="fa-solid fa-bell text-warning me-2"></i>Recent Circulars</h5>
                                <span class="badge bg-danger px-3 py-2 rounded-pill">Active Notices</span>
                            </div>
                            <div class="list-group list-group-flush">
                                <?php 
                                if ($dbh) {
                                    $sqlN = "SELECT id, noticeTitle, postingDate from tblnotice order by id desc limit 4";
                                    $queryN = $dbh->prepare($sqlN);
                                    $queryN->execute();
                                    $notices = $queryN->fetchAll(PDO::FETCH_OBJ);
                                    if ($queryN->rowCount() > 0) {
                                        foreach ($notices as $nt) { ?>
                                            <div class="list-group-item bg-transparent px-0 py-3 border-bottom">
                                                <div class="fw-bold text-dark mb-1"><?php echo htmlentities($nt->noticeTitle); ?></div>
                                                <div class="d-flex justify-content-between align-items-center small text-muted">
                                                    <span><i class="fa-regular fa-clock me-1 text-primary"></i> <?php echo htmlentities($nt->postingDate); ?></span>
                                                    <a href="notice-details.php?nid=<?php echo htmlentities($nt->id); ?>" target="_blank" class="text-primary fw-bold text-decoration-none">Read Notice <i class="fa-solid fa-arrow-up-right-from-square ms-1 small"></i></a>
                                                </div>
                                            </div>
                                        <?php }
                                    } else { ?>
                                        <div class="text-muted text-center py-4">No active campus notices published yet.</div>
                                    <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-4 bg-dark text-white text-center">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-between align-items-center small text-white-50">
                    <div>&copy; <?php echo date('Y'); ?> <strong>Gyanmanjari Innovative University (GMIU)</strong>. All Rights Reserved.</div>
                    <div>Designed & Developed for GMIU Campus Administration</div>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
