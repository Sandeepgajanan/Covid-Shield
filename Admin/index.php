<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Admin</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet" />
  <script src="assets/js/pace.min.js"></script>
  <!--favicon-->

  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
  

</head>

<body style="background: linear-gradient(to right, #4facfe, #00f2fe);">
 
  	<div class="container mt-5">
		<div class="row justify-content-center ">
			<div class="col-md-6">
				<div class="card shadow p-3 mb-5 bg-white rounded">
					<div class="card-body">
          <h2 class="text-center mb-4">Login - Admin Portal</h2>
          <form method="post" action="#">
            <div class="form-group">
              <label for="exampleInputUsername">Email</label>
              <input type="text" name="email" id="exampleInputUsername" class="form-control"
                  placeholder="Enter email" title="xyz@something.com" required maxlength="50" />
            </div>
            <div class="form-group">
              <label for="exampleInputPassword">Password</label>
              <input type="password" name="password" id="exampleInputPassword" class="form-control"
                  placeholder="Enter Password"
                  title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                  required maxlength="50" />
            </div>
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </form>
          <?php
          if (isset($_POST['login'])) {
            error_reporting(1);
            include ("config.php");

            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "select * from admin where email='$email' and password='$password'";
            $result = mysqli_query($con, $sql);
            $count = mysqli_num_rows($result);

            if ($count > 0) {
              $_SESSION['admin'] = $email;
              echo "<script>
				alert('Login Successful');
			</script>";
              echo "<script> location.href='Dasboard.php'; </script>";
            } else {
              echo "<script>
				alert('Invalid Email or Password');
			</script>";
              echo "<script> location.href='index.php'; </script>";
            }
          }
          ?>
        </div>
      </div>
    </div>
    </div>
    </div>

  

  </div><!--wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>

  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>

</body>

</html>
