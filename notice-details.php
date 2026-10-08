<?php
error_reporting(0);
include('includes/config.php'); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gyanmanjari Innovative University | Notice Details</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" alt="GMIU Logo" style="height: 38px; width: auto; margin-right: 12px; border-radius: 50%; background: #fff; padding: 2px;">
                    <span style="font-weight: 700;">Gyanmanjari Innovative University</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" href="find-result.php">Results</a></li>
                        <li class="nav-item"><a class="nav-link active" href="admin-login.php">Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header - set the background image for the header in the line below-->
 
        <!-- Content section-->
        <section class="py-5">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10">

 <?php 
$noticeid=$_GET['nid'];
$sql = "SELECT * from tblnotice where id='$noticeid'";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>  

                        <h3><?php echo htmlentities($result->noticeTitle);?></h3>
                        <p><strong>Notice Posting Date:</strong>  <?php echo htmlentities($result->postingDate);?></p>
                                                <hr color="#000" />
                    
<p><?php echo htmlentities($result->noticeDetails);?></p>
<?php }} ?>

              
    

                    </div>
                </div>
            </div>
        </section>


        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container text-center text-white">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWWJlrBq_3trS2-HvGs2kvOABXi5lihy0e1VNxwFVF9w&s=10" alt="GMIU Logo" style="height: 40px; width: auto; margin-bottom: 10px; border-radius: 50%; background: #fff; padding: 2px;">
                <p class="m-0 text-center text-white" style="font-weight: 500;">Gyanmanjari Innovative University (GMIU)</p>
                <small class="text-white-50">© Student Result Management System</small>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
