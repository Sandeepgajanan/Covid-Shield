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

    <title>Hospital</title>
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
                        <li class="nav-item dropdown">
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
        <style type="text/css">
            .form-control {
                border-color: lightblue;
            }
        </style>

        <?php include ('nav.php'); ?>

        <div class="page-wrapper">

            <div class="clearfix"></div>

            <div class="content-wrapper">
                <div class="container-fluid">

                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <div class="card profile-card-2">

                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                                                <li class="nav-item">
                                                    <a href="javascript:void();" data-target="#profile"
                                                        data-toggle="pill" class="nav-link active"></i> <span
                                                            class="hidden-xs">Profile</span></a>
                                                </li>

                                            </ul>
                                            <div class="tab-content p-3">
                                                <div class="tab-pane active" id="profile">

                                                    <div class="row">

                                                        <div class="tab-pane" id="edit">
                                                            <?php
                                                            include 'config.php';
                                                            $sql1 = "select * from hospital where email='" . $_SESSION['huser'] . "'";
                                                            $result1 = mysqli_query($con, $sql1);
                                                            $num1 = mysqlI_num_rows($result1);
                                                            $sl = 0;
                                                            if ($num1 > 0) {
                                                                while ($row1 = mysqli_fetch_array($result1)) {

                                                                    $id = $row1[0];
                                                                    $name = $row1[1];
                                                                    $email = $row1[4];
                                                                    $phone = $row1[5];
                                                                    $address = $row1[6];
                                                                    $city = $row1[7];
                                                                    $state = $row1[8];
                                                                    $pin = $row1[9];
                                                                    $uname = $row1[10];
                                                                    $pass = $row1[11];
                                                                }
                                                            }
                                                            ?>
                                                            <form class="box" method="post" action="#">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-lg-3 col-form-label form-control-label">Hospital
                                                                        name</label>
                                                                    <div class="col-lg-9">
                                                                        <input class="form-control" type="text"
                                                                            name="hospital" required=""
                                                                            pattern="[A-Za-z\s]+" title="lettersonly"
                                                                            placeholder="Hospital Name"
                                                                            value="<?php echo $name; ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-lg-3 col-form-label form-control-label">Email</label>
                                                                    <div class="col-lg-9">
                                                                        <input class="form-control" type="email"
                                                                            name="email"
                                                                            value="<?php echo $_SESSION['huser']; ?>"
                                                                            readonly="true">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-lg-3 col-form-label form-control-label">Address</label>
                                                                    <div class="col-lg-9">
                                                                        <input class="form-control" type="text"
                                                                            name="address" placeholder="Street"
                                                                            required="" value="<?php echo $address; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-lg-3 col-form-label form-control-label"></label>
                                                                    <div class="col-lg-4">
                                                                        <input class="form-control" type="text"
                                                                            name="city" placeholder="City" required=""
                                                                            pattern="[A-Za-z\s]+" title="lettersonly"
                                                                            value="<?php echo $city; ?>">
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <input class="form-control" type="text"
                                                                            name="state" placeholder="State" required=""
                                                                            pattern="[A-Za-z\s]+" title="lettersonly"
                                                                            value="<?php echo $state; ?>">
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <input class="form-control" type="text"
                                                                            name="pincode" placeholder="Pincode"
                                                                            required="" pattern="[0-9]+"
                                                                            title="numbers only" minlength="6"
                                                                            maxlength="6" value="<?php echo $pin; ?>">
                                                                    </div>


                                                                </div>

                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-lg-3 col-form-label form-control-label">Username</label>
                                                                    <div class="col-lg-9">
                                                                        <input class="form-control" type="text"
                                                                            name="username"
                                                                            placeholder="Enter the Username" required=""
                                                                            pattern="[A-Za-z\s]+" title="lettersonly"
                                                                            value="<?php echo $uname; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-lg-3 col-form-label form-control-label">Password</label>
                                                                    <div class="col-lg-9">
                                                                        <input class="form-control" type="password"
                                                                            name="password"
                                                                            placeholder="Enter the password"
                                                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                                                            title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                                                            required value="<?php echo $pass; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-lg-3 col-form-label form-control-label">Confirm
                                                                        password</label>
                                                                    <div class="col-lg-9">
                                                                        <input class="form-control" type="password"
                                                                            name="cpassword"
                                                                            placeholder="Confirm the password"
                                                                            value="<?php echo $pass; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-lg-3 col-form-label form-control-label"></label>
                                                                    <div class="col-lg-9">
                                                                        <input type="reset" class="btn btn-secondary"
                                                                            value="Cancel">
                                                                        <input type="submit" name="update"
                                                                            class="btn btn-primary"
                                                                            value="Save Changes">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <?php
                                                            if (isset($_POST['update'])) {
                                                                error_reporting(1);
                                                                include ("config.php");

                                                                $hospital = $_POST['hospital'];
                                                                $email = $_POST['email'];
                                                                $phone = $_POST['phone'];
                                                                $address = $_POST['address'];
                                                                $city = $_POST['city'];
                                                                $state = $_POST['state'];
                                                                $pincode = $_POST['pincode'];
                                                                $username = $_POST['username'];
                                                                $password = $_POST['password'];
                                                                $cpassword = $_POST['cpassword'];
                                                                if ($password == $cpassword) {

                                                                    $query = "Update `hospital` set `hname`='" . $hospital . "', `address`='" . $address . "', `city`='" . $city . "', `state`='" . $state . "', `pincode`='" . $pincode . "', `username`='" . $username . "', `password`='" . $password . "' where `email`='" . $email . "'";

                                                                    mysqli_query($con, $query) or die(mysqli_error($con));

                                                                    echo "<script>
				alert('profile updated');
			</script>";
                                                                    echo "<script> location.href='profile.php'; </script>";
                                                                } else {
                                                                    echo "<script>
				alert('Passwords dont match');
			</script>";
                                                                    echo "<script> location.href='profile.php'; </script>";
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


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