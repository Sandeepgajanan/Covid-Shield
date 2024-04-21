<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body style="background: linear-gradient(to right, #4facfe, #00f2fe);">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow p-3 mb-5 bg-white rounded">

          <div class="card-body">
            <h2 class="text-center mb-4">Register - Hospital Portal</h2>
            <form action="#" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <input class="form-control" type="text" name="hospital" placeholder="Hospital Name"
                  pattern="[A-Za-z\s]+" title="letters only" required maxlength="50" />
              </div>
              <div class="form-group">
                <label for="profile-pic">Insert Profile Picture</label>
                <input class="form-control-file" type="file" name="image" id="profile-pic" required="">
              </div>
              <div class="form-group">
                <select required class="form-control" name="question">
                  <option value="">Select Security Question</option>
                  <option value="1">What's Your Favourite food?</option>
                  <option value="2">What's Your Favourite City?</option>
                  <option value="3">Where did you meet your Spouse?</option>
                  <option value="4">What's Your pet's name?</option>
                </select>
              </div>
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Enter answer" name="answer"
                  pattern="[A-Za-z0-9\s]+" title="letters only" required maxlength="50" />
              </div>
              <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email"
                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="xyz@something.com" required maxlength="50" />
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="phone" placeholder="Phone" required pattern="[0-9]+"
                  maxlength="10" minlength="10" title="accepts only numeric values with 10 digit." />
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="address" placeholder="Address" pattern="[A-Za-z0-9\s]+"
                  title="letters only" required maxlength="50" />
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="city" placeholder="City" required pattern="[A-Za-z\s]+"
                  title="letters only" required maxlength="50" />
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="state" placeholder="State" required pattern="[A-Za-z\s]+"
                  title="letters only" required maxlength="50" />
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="pin" placeholder="Pincode" required pattern="[0-9]+"
                  maxlength="6" minlength="6" title="accepts only numbers 0, 1, 2" />
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="Username" required
                  pattern="[A-Za-z\s]+" title="letters only" required maxlength="50" />
              </div>
              <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password" required
                  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                  title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                  required maxlength="50" />
              </div>
              <div class="form-group">
                <input class="form-control" type="password" name="cpassword" placeholder="Confirm Password" required
                  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                  title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                  required maxlength="50" />
              </div>

              <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
            </form>
            <?php
            if (isset($_POST['register'])) {
              error_reporting(1);
              include ("config.php");

              $email = $_POST['email'];

              $sql = "select * from hospital where email='$email'";
              $result = mysqli_query($con, $sql);
              $count = mysqlI_num_rows($result);

              if ($count > 0) {
                echo "<script>
				alert('There is an existing account associated with this email.');
			</script>";
                echo "<script> location.href='index.php'; </script>";
              } else {

                $hospital = $_POST['hospital'];
                $question = $_POST['question'];
                $answer = $_POST['answer'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $pin = $_POST['pin'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];
                $fname = $_FILES["image"]["name"];
                $tempname = $_FILES["image"]["tmp_name"];
                $folder = "uploads/" . $fname;
                if ($password == $cpassword) {
                  if (move_uploaded_file($tempname, $folder)) {
                    $query = "INSERT INTO `hospital`(`hname`,`question`, `answer`, `email`, `phone`, `address`, `city`, `state`, `pincode`, `username`, `password`, `image`) VALUES ('" . $hospital . "','" . $question . "','" . $answer . "','" . $email . "','" . $phone . "','" . $address . "','" . $city . "','" . $state . "','" . $pin . "','" . $username . "','" . $password . "','" . $fname . "')";

                    mysqli_query($con, $query) or die(mysqli_error($con));

                    echo "<script>
				alert('Registeration Completed, Please Login.');
			</script>";
                    echo "<script> location.href='index.php'; </script>";
                  } else {
                    echo "<script>
				alert('Upload small sized image');
			</script>";
                    echo "<script> location.href='register.php'; </script>";
                  }
                } else {
                  echo "<script>
				alert('Passwords dont match');
			</script>";
                  echo "<script> location.href='register.php'; </script>";
                }
              }
            }
            ?>
            <p class="text-center mt-3">Already have an Account? <a href="index.php">Login Now!</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>