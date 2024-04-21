<?php session_start();
if (!isset($_SESSION['huser'])) {
    echo "<script> location.href='index.php'; </script>";
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Plasma</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
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


                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->

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
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->


        <?php include ('nav.php'); ?>
        <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <div class="content-wrapper">
                <div class="container-fluid">

                    <div class="row mt-3">



                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Plasma Donator</h5>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>DOB</th>
                                                    <th>Age</th>
                                                    <th>Gender</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>State</th>
                                                    <th>Address</th>
                                                    <th>Blood Group</th>
                                                    <th>Lab Test</th>
                                                    <th>Symptoms</th>
                                                    <th>Negative Report</th>
                                                    <th>Date Of Last Symptoms</th>
                                                    <th>Status</th>
                                                    <th>Appointment</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <?php
                                            include ("config.php");
                                            $sql4 = "select * from donate where hemail='" . $_SESSION['huser'] . "'";
                                            $result4 = mysqli_query($con, $sql4);
                                            $count4 = mysqlI_num_rows($result4);

                                            if ($count4 > 0) {
                                                while ($row4 = mysqli_fetch_array($result4)) {
                                                    $id = $row4[0];
                                                    $name = $row4[1];
                                                    $dob = $row4[2];
                                                    $age = $row4[3];
                                                    $gender = $row4[4];
                                                    $phone = $row4[5];
                                                    $state = $row4[6];
                                                    $address = $row4[7];
                                                    $blood = $row4[8];
                                                    $test = $row4[9];
                                                    $symp = $row4[10];
                                                    $rep = $row4[11];
                                                    $last = $row4[12];
                                                    $email = $row4[13];
                                                    $hemail = $row4[14];
                                                    $status = $row4[15];
                                                    $appdate = $row4[16];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $name; ?></td>
                                                        <td><?php echo $dob; ?></td>
                                                        <td><?php echo $age; ?></td>
                                                        <td><?php echo $gender; ?></td>
                                                        <td><?php echo $email; ?></td>
                                                        <td><?php echo $phone; ?></td>
                                                        <td><?php echo $state; ?></td>
                                                        <td><?php echo $address; ?></td>
                                                        <td><?php echo $blood; ?></td>
                                                        <td><?php echo $test; ?></td>
                                                        <td><?php echo $symp; ?></td>
                                                        <td><?php echo $rep; ?></td>
                                                        <td><?php echo $last; ?></td>
                                                        <td><?php echo $status; ?></td>
                                                        <td><?php echo $appdate; ?></td>
                                                        <td><?php if ($status == 'pending') { ?><a
                                                                    href="plasmadet.php?uid=<?php echo $id; ?>"><input type="submit"
                                                                        value="Accept/Reject"
                                                                        style="background-color: blue;color: white;border-color: white"></a><?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php }
                                            } ?>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--End Row-->

                    <!--start overlay-->
                    <div class="overlay toggle-menu"></div>
                    <!--end overlay-->

                </div>
                <!-- End container-fluid-->

            </div><!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <footer class="footer text-center">

            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <div class="chat-windows "></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- apps -->
    <script src="dist/js/app.min.js "></script>
    <script src="dist/js/app.init-menusidebar.js"></script>
    <script src="dist/js/app-style-switcher.js "></script>
    <script src="dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js "></script>
    <script src="assets/extra-libs/sparkline/sparkline.js "></script>
    <!-- theme js -->
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js "></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js "></script>
</body>

</html>