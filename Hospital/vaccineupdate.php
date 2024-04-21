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

    <title>Vaccine Result</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">

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
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <!-- Notification -->

                        <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                            <ul class="list-style-none">

                            </ul>
                        </div>
                        </li>
                        <!-- End Notification -->
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

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
                                    <h5 class="card-title">Vaccine Result</h5>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <th scope="col"> Name of Vaccine</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Cost</th>
                                            </thead>
                                            <tr>

                                                <form method="post" action="#">
                                                    <td><select name="vaccine" required="">
                                                            <option value="">--Select--</option>
                                                            <option value="CovidShield">CovidShield</option>
                                                            <option value="Covaxin">Covaxin</option>
                                                            <option value="Sputnik">Sputnik</option>
                                                        </select></td>
                                                    <td><input type="text" name="quantity" pattern="[0-9]+"
                                                            title="accepts only numbers 0, 1, 2" required="" />
                                                    </td>
                                                    <td><input type="text" name="price" pattern="[0-9]+"
                                                            title="accepts only numbers 0, 1, 2" required="" /> </td>
                                                    <td><input type="submit"
                                                            style="background-color: blue;color: white;border-color: white"
                                                            name="update"></td>
                                                </form>
                                                <?php
                                                if (isset($_POST['update'])) {
                                                    error_reporting(1);
                                                    include ("config.php");
                                                    $sql = "select * from vaccine where hemail='" . $_SESSION['huser'] . "'";
                                                    $result = mysqli_query($con, $sql);
                                                    $count = mysqlI_num_rows($result);

                                                    if ($count > 0) {
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            $vname = $row[2];
                                                            $qty = $row[3];
                                                            $cost = $row[4];
                                                        }
                                                    } else {
                                                        $vname = '';
                                                    }
                                                    $vaccine = $_POST['vaccine'];
                                                    $quantity = $_POST['quantity'];
                                                    $price = $_POST['price'];

                                                    if ($vname != $vaccine) {
                                                        $sql1 = "insert into vaccine(hemail, vname, qty, cost) values('" . $_SESSION['huser'] . "','$vaccine','$quantity','$price')";
                                                        if (mysqli_query($con, $sql1)) {
                                                            echo "<script>
				alert('Info Updated');
			</script>";
                                                            echo "<script> location.href='vaccineupdate.php'; </script>";
                                                        } else {
                                                            echo "<script>
				alert('Update Failed');
			</script>";
                                                            echo "<script> location.href='vaccineupdate.php'; </script>";
                                                        }
                                                    } else {
                                                        $sql2 = "update vaccine set cost='" . $price . "', qty='" . $quantity . "' where hemail='" . $_SESSION['huser'] . "' and vname='$vaccine'";
                                                        if (mysqli_query($con, $sql2)) {
                                                            echo "<script>
				alert('Info Updated');
			</script>";
                                                            echo "<script> location.href='vaccineupdate.php'; </script>";
                                                        }
                                                    }
                                                }
                                                ?>
                                            </tr>
                                        </table>
                                        <table class="table">
                                            <thead>
                                                <th scope="col">Name of Vaccine</th>
                                                <th scope="col">Quantity Available</th>
                                                <th scope="col">Cost</th>
                                            </thead>
                                            <?php
                                            include ("config.php");
                                            $sql = "select * from vaccine where hemail='" . $_SESSION['huser'] . "'";
                                            $result = mysqli_query($con, $sql);
                                            $count = mysqlI_num_rows($result);

                                            if ($count > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $vname = $row[2];
                                                    $qty = $row[3];
                                                    $cost = $row[4];
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $vname ?></td>
                                                        <td><?php echo $qty ?></td>
                                                        <td><?php echo $cost ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
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