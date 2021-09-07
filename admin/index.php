
<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['id']) == 0) {
    header('location:../index.php');
} else {
?>


<!doctype html>
<html lang="en">
    <head>
        <title>Admin Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">

        <!-- / -->
           <!-- Custom fonts for this template-->
    <link href="addd/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="addd/css/sb-admin-2.min.css" rel="stylesheet">

    </head>
    <body>
        
        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">
                <div class="p-4 pt-5">
                    <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
                    <ul class="list-unstyled components mb-5">
                       
                        <li class="active">
                            <a href="index.php">DashBoard</a>
                        </li>
                        <li>
                            <a href="userList.php">Users</a>
                        </li>

                        <li>
                            <a href="Requests.php">Request</a>
                        </li>

                        <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                    <div class="footer">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |  <i class="icon-heart" aria-hidden="true"></i> by <a href="https://nigoote.com" target="_blank">nigoote.com</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </nav>
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5">
                <h4>Personal Safety WebSite App</h4>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                        </button>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">DashBoard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="userList.php">Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="Requests.php">Request</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <h2 class="mb-4">DashBoard</h2>
               
                <div class="row">
                    <!-- list requesting users -->
                     <!-- Tasks Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        
                                        <div class="col mr-2">
                                          <a href="userList.php">  
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">User Listed
                                            </div></a>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <?php $query = mysqli_query($con, "SELECT * from usertbl");
                                                    $countposts = mysqli_num_rows($query);
                                                    ?>
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php echo htmlentities($countposts); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!--  -->
                           
                     
                           <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="Requests.php"> 
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending helps Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php $query = mysqli_query($con, "SELECT * from usertbl where Status=2");
                                            $countposts = mysqli_num_rows($query);
                                            ?>
                                            <?php echo htmlentities($countposts); ?>
                                            </div>
                                        </div>
                                    </a>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       </div>

            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>

<?php } ?>