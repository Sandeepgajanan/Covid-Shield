<?php
session_start();
if (!isset($_SESSION['huser'])) {
    echo "<script> location.href='index.php'; </script>";
}

$email = $_SESSION['huser'];
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hospital</title>
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

    <link href="dist/css/style.min.css" rel="stylesheet">

</head>

<body>



    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">

                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>

                    <div class="navbar-brand">

                        <span class="logo-text">
                            <p><b>Covid Shield</b></p>
                        </span>

                    </div>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">

                    </ul>

                    <ul class="navbar-nav float-right">


                        <li class="nav-item dropdown" style="align:center">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">

                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark">Hospital</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="profile.php"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                            </div>

                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>

        <?php include ('nav.php'); ?>
        <div class="page-wrapper">
            <div class="container-fluid">

                <div class="card-group">
                    <?php
                    include ("config.php");
                    $sql = "select * from booktest where result='Positive'";
                    $result = mysqli_query($con, $sql);
                    $count = mysqlI_num_rows($result);

                    ?>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php echo $count; ?></h2>

                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Positive Cases
                                    </h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i class='fas fa-user-alt'
                                            style='font-size:24px'></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    include ("config.php");
                    $sql1 = "select * from booktest where result='Positive' and hemail='" . $email . "'";
                    $result1 = mysqli_query($con, $sql1);
                    $count1 = mysqlI_num_rows($result1);

                    ?>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 font-weight-medium"><?php echo $count; ?></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Positive Cases in
                                        This Hospital
                                    </h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i class='fas fa-user-alt'
                                            style='font-size:24px'></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    include ("config.php");
                    $sql2 = "select * from bookvaccine where hstatus='Completed'";
                    $result2 = mysqli_query($con, $sql2);
                    $count2 = mysqlI_num_rows($result2);

                    ?>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php echo $count2; ?></h2>

                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Vaccinated
                                    </h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i class='fas fa-user-alt'
                                            style='font-size:24px'></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    include ("config.php");
                    $sql3 = "select * from bookvaccine where hstatus='Completed' and hemail='" . $email . "'";
                    $result3 = mysqli_query($con, $sql3);
                    $count3 = mysqlI_num_rows($result3);

                    ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 font-weight-medium"><?php echo $count3; ?></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Vaccinated
                                        In This Hospital</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i class='fas fa-user-alt'
                                            style='font-size:24px'></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

        <script src="assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

        <script src="dist/js/app-style-switcher.js"></script>
        <script src="dist/js/feather.min.js"></script>
        <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <script src="dist/js/sidebarmenu.js"></script>

        <script src="dist/js/custom.min.js"></script>

        <script src="assets/extra-libs/c3/d3.min.js"></script>
        <script src="assets/extra-libs/c3/c3.min.js"></script>
        <script src="assets/libs/chartist/dist/chartist.min.js"></script>
        <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
        <script src="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
        <script src="dist/js/pages/dashboards/dashboard1.min.js"></script>
</body>

</html>