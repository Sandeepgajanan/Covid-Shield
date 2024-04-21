<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CovidShield - Register</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body style="background: linear-gradient(to right, #4facfe, #00f2fe);">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow p-3 mb-5 bg-white rounded">
          <div class="card-body">
            <h2 class="text-center mb-4">Register - User Portal</h2>
            <form method="post" action="#">
              <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" pattern="[A-Za-z\s]+"
                  title="letters only" required maxlength="50" />
              </div>
              <div class="form-group">
                <input type="date" class="form-control" name="dob" placeholder="Date Of Birth"
                  max="<?php echo date("Y-m-d", strtotime("-6570 day")); ?>" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="phone" placeholder="Phone number" pattern="[0-9]+"
                  minlength="10" maxlength="10" title="accepts only numeric values with 10 digit." required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email"
                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="xyz@something.com" required maxlength="50" />
              </div>
              <select class="form-control mb-3" name="question" required>
                <option value="">Select Security Question</option>
                <option value="1">What's Your Favourite food?</option>
                <option value="2">What's Your Favourite City?</option>
                <option value="3">Where did you meet your Spouse?</option>
                <option value="4">What's Your pet's name?</option>
              </select>
              <div class="form-group">
                <input type="text" class="form-control" name="answer" placeholder="Answer" pattern="[A-Za-z0-9\s]+"
                  required maxlength="50" />
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password"
                  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                  title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                  required maxlength="50" />
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="cpassword" placeholder="Confirm password"
                  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                  title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                  required maxlength="50" />
              </div>
              <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
            </form>
            <?php
            if (isset($_POST['register'])) {
              error_reporting(1);
              include ("config.php");

              $email = $_POST['email'];

              $sql = "select * from user where email='$email'";
              $result = mysqli_query($con, $sql);
              $count = mysqlI_num_rows($result);

              if ($count > 0) {
                echo "<script>
				alert('There is an existing account associated with this email.');
			</script>";
                echo "<script> location.href='index.php'; </script>";
              } else {
                $username = $_POST['username'];
                $dob = $_POST['dob'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $question = $_POST['question'];
                $answer = $_POST['answer'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];
                if ($password == $cpassword) {
                  $query = "INSERT INTO `user`(`username`, `dob`, `phone`, `email`, `password`, `question`, `answer`) VALUES  ('" . $username . "','" . $dob . "','" . $phone . "','" . $email . "','" . $password . "','" . $question . "','" . $answer . "')";

                  mysqli_query($con, $query) or die(mysqli_error($con));

                  echo "<script>
				alert('Registeration Completed, Please Login.');
			</script>";
                  echo "<script> location.href='index.php'; </script>";
                } else {
                  echo "<script>
				alert('Passwords dont match');
			</script>";
                  echo "<script> location.href='index.php'; </script>";
                }
              }
            }
            ?>
            <p class="mt-3 text-center">Already have an account? <a href="index.php">Sign In here</a></p>
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