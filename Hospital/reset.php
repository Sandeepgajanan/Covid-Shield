<!DOCTYPE html>
<html>

<head>
  <title>reset</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: linear-gradient(to right, #4facfe, #00f2fe);">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow p-3 mb-5 bg-white rounded">
          <div class="card-body">
            <h2 class="text-center mb-4">Reset Password</h2>
            <form method="post" action="#" class="form">
              <div class="form-group">
                <label for="email">Hospital Email</label>
                <input type="email" class="form-control" name="email" placeholder="Hospital Email" required
                  maxlength="50" />
              </div>
              <div class="form-group">
                <label for="question">Security Question</label>
                <select name="question" class="form-control" style="border:transparent;" required="">
                  <option value="">Select Security Question</option>
                  <option value="1">What's Your Favourite food?</option>
                  <option value="2">What's Your Favourite City?</option>
                  <option value="3">Where did you meet your Spouse</option>
                  <option value="4">What's Your pet's name</option>
                </select>
              </div>
              <div class="form-group">
                <label for="answer">Answer</label>
                <input type="text" class="form-control" name="answer" placeholder="Answer" required maxlength="50" />
              </div>
              <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" class="form-control" name="password" placeholder="New Password" required
                  maxlength="50" />
              </div>
              <button type="submit" name="submit" class="btn btn-primary btn-block">Reset</button>
            </form>

          </div>
          <p class="text-center"><a href="index.php">Back to Login</a></p>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['submit'])) {
    include ('config.php');
    $email = $_POST['email'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $password = $_POST['password'];

    $sql = "update hospital set password='" . $password . "' where email='" . $email . "' and question='" . $question . "' and answer='" . $answer . "'";
    mysqli_query($con, $sql);
    $count = mysqli_affected_rows($con);
    echo $count;
    if ($count > 0) {
      echo "<script>
        alert('Password has been reset');
        </script>";
      echo "<script> location.href='index.php'; </script>";
    } else {
      echo "<script>
        alert('invalid information');
        </script>";
      echo "<script> location.href='index.php'; </script>";
    }
  }
  ?>


</body>

</html>