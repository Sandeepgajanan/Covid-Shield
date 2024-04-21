<?php session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Login - Hospital Portal</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: linear-gradient(to right, #4facfe, #00f2fe);">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow p-3 mb-5 bg-white rounded">
          <div class="card-body">
            <h2 class="text-center mb-4">Login - Hospital Portal</h2>
            <form method="post" action="#" class="form-wrapper">
              <div class="form-group">
                <label for="username">Hospital Name</label>
                <input type="text" class="form-control" name="username" placeholder="Hospital Name" required
                  maxlength="50" />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required maxlength="50" />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required
                  maxlength="50" />
              </div>
              <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
            </form>

            <?php
            if (isset($_POST['login'])) {
              error_reporting(1);
              include ("config.php");

              $hospital = $_POST['username'];
              $email = $_POST['email'];
              $password = $_POST['password'];

              $sql = "select status from hospital where email='$email' and password='$password' and hname='$hospital'";
              $result = mysqli_query($con, $sql);
              $count = mysqlI_num_rows($result);
              $approve = "approve";
              $reject = "reject";

              if ($count > 0) {
                while ($row = mysqli_fetch_array($result)) {
                  $status = $row[0];
                }
                if ($status == $approve) {
                  $_SESSION['huser'] = $email;
                  echo "<script>
				alert('Login Successful');
			</script>";
                  echo "<script> location.href='home.php'; </script>";
                } else if ($status == $reject) {
                  echo "<script>
				alert('Your Registration is Rejected');
			</script>";
                  echo "<script> location.href='index.php'; </script>";
                } else {
                  echo "<script>
				alert('Your Approval is Pending, Please Wait $status');
			</script>";
                  echo "<script> location.href='index.php'; </script>";
                }
              } else {
                echo "<script>
				alert('Invalid Email or Password');
			</script>";
                echo "<script> location.href='index.php'; </script>";
              }
            }
            ?>

            <p class="text-center">Not a member? <a href="register.php">Register Here</a></p>
            <p class="text-center"><a href="reset.php">Forgot Password??</a></p>
          </div>




</body>

</html>