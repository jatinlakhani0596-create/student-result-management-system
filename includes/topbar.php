<nav class="navbar navbar-expand-lg box-shadow" style="background:#ffffff; border-bottom:2px solid #2563eb; padding:12px 24px; box-shadow:0 4px 20px rgba(0,0,0,0.04); position:sticky; top:0; z-index:1050;">
	<div class="container-fluid">
        <!-- Brand Logo & Title -->
        <a class="navbar-brand d-flex align-items-center me-4" href="dashboard.php" style="font-weight:800; color:#0f172a; font-family:'Outfit', sans-serif; text-decoration:none;">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" alt="GMIU Seal" style="height: 42px; width: 42px; margin-right: 12px; border-radius: 50%; border: 2px solid #2563eb; background:#fff; padding:1px; box-shadow:0 4px 12px rgba(37,99,235,0.2);">
            <div>
                <div style="font-size:18px; letter-spacing:0.5px; line-height:1;">GYANMANJARI <span style="color:#2563eb; font-weight:800;">PORTAL</span></div>
                <div style="font-size:10px; color:#64748b; font-weight:700; letter-spacing:1px; margin-top:2px;">SUPERADMIN CONTROL CENTER</div>
            </div>
        </a>

        <!-- Mobile Navbar Toggler -->
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarExecutive" aria-controls="navbarExecutive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa-solid fa-bars fs-4 text-dark"></span>
        </button>

        <!-- Executive Navigation Links Grid -->
        <div class="collapse navbar-collapse" id="navbarExecutive">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-wrap align-items-center gap-1" style="font-weight:600;">
                <!-- 1. Dashboard -->
                <li class="nav-item">
                    <a href="dashboard.php" class="btn btn-sm text-dark rounded-pill px-3 py-2 fw-semibold" style="background:#f1f5f9; border:1px solid #cbd5e1; margin:2px;">
                        <i class="fa-solid fa-gauge-high text-warning me-1.5"></i> Dashboard
                    </a>
                </li>

                <!-- 2. Students Dropdown -->
                <li class="nav-item dropdown">
                    <a class="btn btn-sm text-dark rounded-pill px-3 py-2 fw-semibold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background:#f1f5f9; border:1px solid #cbd5e1; margin:2px;">
                        <i class="fa-solid fa-user-plus text-primary me-1.5"></i> Students
                    </a>
                    <ul class="dropdown-menu shadow-lg border-0 rounded-3 mt-2">
                        <li><a class="dropdown-item py-2 fw-semibold" href="add-students.php"><i class="fa-solid fa-user-plus text-success me-2"></i> Add Student Admission</a></li>
                        <li><a class="dropdown-item py-2 fw-semibold" href="manage-students.php"><i class="fa-solid fa-users text-info me-2"></i> Manage All Students</a></li>
                    </ul>
                </li>

                <!-- 3. Subjects Dropdown -->
                <li class="nav-item dropdown">
                    <a class="btn btn-sm text-dark rounded-pill px-3 py-2 fw-semibold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background:#f1f5f9; border:1px solid #cbd5e1; margin:2px;">
                        <i class="fa-solid fa-book text-danger me-1.5"></i> Subjects
                    </a>
                    <ul class="dropdown-menu shadow-lg border-0 rounded-3 mt-2">
                        <li><a class="dropdown-item py-2 fw-semibold" href="create-subject.php"><i class="fa-solid fa-circle-plus text-success me-2"></i> Create New Subject</a></li>
                        <li><a class="dropdown-item py-2 fw-semibold" href="manage-subjects.php"><i class="fa-solid fa-book-open text-primary me-2"></i> Manage Subjects Directory</a></li>
                    </ul>
                </li>

                <!-- 4. Results Dropdown -->
                <li class="nav-item dropdown">
                    <a class="btn btn-sm text-dark rounded-pill px-3 py-2 fw-semibold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background:#f1f5f9; border:1px solid #cbd5e1; margin:2px;">
                        <i class="fa-solid fa-graduation-cap text-success me-1.5"></i> Results
                    </a>
                    <ul class="dropdown-menu shadow-lg border-0 rounded-3 mt-2">
                        <li><a class="dropdown-item py-2 fw-semibold" href="add-result.php"><i class="fa-solid fa-square-plus text-success me-2"></i> Declare Student Result</a></li>
                        <li><a class="dropdown-item py-2 fw-semibold" href="manage-results.php"><i class="fa-solid fa-file-invoice text-primary me-2"></i> Manage Declared Results</a></li>
                    </ul>
                </li>

                <!-- 5. Notices Dropdown -->
                <li class="nav-item dropdown">
                    <a class="btn btn-sm text-dark rounded-pill px-3 py-2 fw-semibold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background:#f1f5f9; border:1px solid #cbd5e1; margin:2px;">
                        <i class="fa-solid fa-bullhorn text-warning me-1.5"></i> Notices
                    </a>
                    <ul class="dropdown-menu shadow-lg border-0 rounded-3 mt-2">
                        <li><a class="dropdown-item py-2 fw-semibold" href="add-notice.php"><i class="fa-solid fa-paper-plane text-danger me-2"></i> Publish Campus Notice</a></li>
                        <li><a class="dropdown-item py-2 fw-semibold" href="manage-notices.php"><i class="fa-solid fa-list-ul text-info me-2"></i> Manage All Notices</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Right Controls -->
            <div class="d-flex align-items-center gap-2">
                <a href="index.php" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-2 fw-bold" title="View Public Website">
                    <i class="fa-solid fa-globe me-1"></i> Public Site
                </a>
                <div class="dropdown">
                    <button class="btn btn-sm btn-primary rounded-pill px-3 py-2 fw-bold dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background:linear-gradient(135deg, #2563eb, #1d4ed8);">
                        <i class="fa-solid fa-user-gear me-1"></i> Admin Account
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3 mt-2">
                        <li><a class="dropdown-item py-2 fw-semibold" href="change-password.php"><i class="fa-solid fa-key text-warning me-2"></i> Change Password</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item py-2 fw-bold text-danger" href="logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</div>
</nav>
