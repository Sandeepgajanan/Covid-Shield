<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CovidShield - Forgot Password</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body style="background: linear-gradient(to right, #4facfe, #00f2fe);">
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card shadow p-3 mb-5 bg-white rounded">
					<div class="card-body">
						<h2 class="text-center mb-4">Forgot Password</h2>
						<form method="post" action="#">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-envelope"></i></span>
									</div>
									<input type="email" class="form-control" name="email" placeholder="Enter Your Email" required
										maxlength="50" />
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-question"></i></span>
									</div>
									<select class="form-control" name="question" required>
										<option value="">Select Security Question</option>
										<option value="1">What's Your Favourite food?</option>
										<option value="2">What's Your Favourite City?</option>
										<option value="3">Where did you meet your Spouse?</option>
										<option value="4">What's Your pet's name?</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-key"></i></span>
									</div>
									<input type="text" class="form-control" name="answer" placeholder="Enter Your Answer" required
										maxlength="50" />
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-lock"></i></span>
									</div>
									<input type="password" class="form-control" name="password" placeholder="Enter New Password" required
										maxlength="50" />
								</div>
							</div>
							<button type="submit" name="submit" class="btn btn-primary btn-block">Reset</button>
						</form>
						<?php
						if (isset($_POST['submit'])) {
							include ('config.php');
							$email = $_POST['email'];
							$question = $_POST['question'];
							$answer = $_POST['answer'];
							$password = $_POST['password'];

							$sql = "UPDATE user SET password='$password' WHERE email='$email' AND question='$question' AND answer='$answer'";
							$result = mysqli_query($con, $sql);

							if ($result) {
								echo "<script>alert('Password has been reset');</script>";
								echo "<script>location.href='index.php';</script>";
							} else {
								echo "<script>alert('Invalid information');</script>";
								echo "<script>location.href='index.php';</script>";
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>