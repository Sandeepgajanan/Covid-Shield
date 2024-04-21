<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CovidShield - Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body style="background: linear-gradient(to right, #4facfe, #00f2fe);">
	<div class="container mt-5">
		<div class="row justify-content-center ">
			<div class="col-md-6">
				<div class="card shadow p-3 mb-5 bg-white rounded">
					<div class="card-body">
						<h2 class="text-center mb-4">Login - User Portal</h2>
						<form method="post" action="#">
							<div class="form-group">  <label for="exampleInputUsername">Email</label>
								<input type="email" class="form-control" name="email" placeholder="Email"
									pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="xyz@something.com" required maxlength="50" />
							</div>
							<div class="form-group"><label for="exampleInputPassword">Password</label>
								<input type="password" class="form-control" name="password" placeholder="Password"
									pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
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

							$sql = "select * from user where email='$email' and password='$password'";
							$result = mysqli_query($con, $sql);
							$count = mysqlI_num_rows($result);

							if ($count > 0) {
								$_SESSION['user'] = $email;
								echo "<script>
                                    alert('Login Successful');
                                </script>";
								echo "<script> location.href='home.php'; </script>";
							} else {
								echo "<script>
                                    alert('Invalid Email or Password');
                                </script>";
								echo "<script> location.href='index.php'; </script>";
							}
						}
						?>
						<p class="mt-3 text-center">Don't have an account? <a href="register.php">Register here</a></p>
						<p class="text-center"><a href="forgot.php">Forgot password?</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		let container = document.querySelector(".container");
		toggle = () => {
			container.classList.toggle("sign-in");
			container.classList.toggle("sign-up");
		};
		setTimeout(() => {
			container.classList.add("sign-in");
		}, 200);
	</script>

</body>

</html>