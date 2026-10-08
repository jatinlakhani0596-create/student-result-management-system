<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_SESSION['alogin']) && $_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
    
    echo "<script>alert('Invalid Details');</script>";

}

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gyanmanjari Admin | Secure Portal Login</title>
        <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" />
        <!-- Google Fonts & FontAwesome -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            * {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
            h1, h2, h3, h4, h5, .brand-font {
                font-family: 'Outfit', sans-serif;
            }
            body {
                background: linear-gradient(135deg, rgba(8, 14, 30, 0.94) 0%, rgba(15, 23, 42, 0.92) 100%), url('4-page.jpg');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 40px 15px;
            }
            .admin-card {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(16px);
                border-radius: 28px;
                border: 1px solid rgba(255, 255, 255, 0.3);
                box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
                width: 100%;
                max-width: 440px;
                padding: 42px 35px;
                position: relative;
            }
            .logo-seal {
                width: 90px;
                height: 90px;
                border-radius: 50%;
                background: #ffffff;
                padding: 3px;
                border: 3px solid #2563eb;
                box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
                margin-bottom: 20px;
            }
            .form-control {
                padding: 12px 18px;
                border-radius: 12px;
                border: 1px solid #cbd5e1;
                font-weight: 500;
            }
            .form-control:focus {
                border-color: #2563eb;
                box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15);
            }
            .btn-admin {
                background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
                color: #ffffff;
                font-weight: 700;
                border: none;
                border-radius: 12px;
                padding: 14px 24px;
                box-shadow: 0 4px 20px rgba(37, 99, 235, 0.4);
                transition: all 0.3s ease;
                width: 100%;
            }
            .btn-admin:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(37, 99, 235, 0.6);
                color: #ffffff;
            }
        </style>
    </head>
    <body>
        <div class="admin-card text-center">
            <a href="index.php">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" alt="GMIU Seal" class="logo-seal">
            </a>
            <h2 class="brand-font fw-extrabold mb-1" style="color: #0f172a;">Gyanmanjari University</h2>
            <p class="text-secondary small mb-4 fw-semibold"><i class="fa-solid fa-user-shield text-primary me-1"></i> Admin Portal Login</p>

            <form method="post" class="text-start">
                <div class="mb-3">
                    <label for="inputEmail3" class="form-label fw-semibold text-dark small"><i class="fa-solid fa-user text-primary me-2"></i>Username</label>
                    <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Enter Username (admin)" required>
                </div>

                <div class="mb-4">
                    <label for="inputPassword3" class="form-label fw-semibold text-dark small"><i class="fa-solid fa-key text-primary me-2"></i>Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Enter Password (Test@123)" required>
                </div>

                <button type="submit" name="login" class="btn btn-admin mb-3"><i class="fa-solid fa-right-to-bracket me-2"></i>Sign In to Admin Dashboard</button>
            </form>

            <div class="pt-2">
                <a href="index.php" class="text-decoration-none fw-semibold text-primary small"><i class="fa-solid fa-arrow-left me-1"></i> Back to Homepage</a>
            </div>

            <hr class="my-4 opacity-25">
            <div class="text-muted small">© Gyanmanjari Innovative University (GMIU)</div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

