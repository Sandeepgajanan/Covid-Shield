<?php session_start();
if (!isset($_SESSION['user'])) {
  echo "<script> location.href='index.php'; </script>";
}
$hemail = $_GET['hid'];
?>
<?php include ('nav.php'); ?>

<section class="home-slider owl-carousel">
  <div class="slider-item bread-item" style="background-image: url('images/kiii.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container" data-scrollax-parent="true">
      <div class="row slider-text align-items-end">
        <div class="col-md-7 col-sm-12 ftco-animate mb-5">
          <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Enter the Details</h1>
        </div>
      </div>
    </div>
  </div>
</section>


</div>
</div>
</div>
</section>

<style type="text/css">
  input[type=text],
  select,
  [type=email],
  [type=date],
  [type=number] {
    width: 100%;
    padding: 12px 10px;
    margin: 8px 0;
    display: inline-block;
    border-radius: 4px;
    box-sizing: border-box;
    box-shadow: none !important;
    border: none;
    border-bottom: 1px solid #e6e6e6;
  }

  .box input[type="submit"] {
    border: 0;
    background: #2f89fc;
    display: block;
    margin: 20px auto;
    border: 2px solid lightblue;
    padding: 14px 40px;
    width: 200px;
    outline: none;
    color: whitesmoke;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer;
  }

  label,
  form-control {

    font-size: 1em;
  }

  .box input[type="submit"]:hover {
    box-shadow: 0 0 10px 0 #00d7c3 inset, 0 0 20px 2px #00d7c3;
    border: 3px solid #00d7c3;
  }
</style>

<section class="ftco-section">
  <div class="container">
    <form action="#" class="box" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Patient Name" pattern="[A-Za-z\s]+"
          title="letters only" maxlength="50" required="" />
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="phone" placeholder="Phone Number" required="" pattern="[0-9]+"
          title="numbers only" minlength="10" maxlength="10" />
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="aadhar" placeholder="Adhar Number" required="" pattern="[0-9]+"
          maxlength="12" minlength="12" title="numbers only with a length of 12" />
      </div>
      <div class="form-group">
        <input placeholder="Date of Birth" type="date" name="dob"
          max="<?php echo date("Y-m-d", strtotime("-6570 day")); ?>" required="">
      </div>
      <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Enter the Email"
          value="<?php echo $_SESSION['user']; ?>" readonly="true">
      </div>
      <div class="form-group">
        <label for="user">ID Proof</label>
        <input type="file" class="form-control" name="image" placeholder="ID Proof" required="">
      </div>

      <div class="form-group">
        <input type="Number" class="form-control" name="days" placeholder="Enter the Number of Days" required=""
          pattern="[0-9]+" min="1" />
      </div>
      <div class="form-group">
        <label>From</label>
        <br>
        <input placeholder="From Date" type="date" name="date" min="<?php echo date("Y-m-d", strtotime("+1 day")); ?>"
          required="">
      </div>
      <center>
        <div class="form-group">
          <a href="services.php"><input type="submit" name="save" value="Confirm" class="btn btn-primary py-3 px-5"></a>
        </div>
      </center>
    </form>
    <?php
    if (isset($_POST['save'])) {
      error_reporting(1);
      include ("config.php");
      $aadhar = $_POST['aadhar'];

      $sql = "select * from bookbed where aadhar='$aadhar'";
      $result = mysqli_query($con, $sql);
      $count = mysqlI_num_rows($result);

      if ($count > 0) {
        echo "<script>
        alert('There is an existing account associated with this aadhar number.');
      </script>";
        echo "<script> location.href='services.php'; </script>";
      } else

        $name = $_POST['name'];
      $aadhar = $_POST['aadhar'];
      $phone = $_POST['phone'];
      $dob = $_POST['dob'];
      $days = $_POST['days'];
      $date = $_POST['date'];
      $fname = $_FILES["image"]["name"];
      $filename = $name . $fname;
      $tempname = $_FILES["image"]["tmp_name"];
      $folder = "uploads/" . $filename;


      if (move_uploaded_file($tempname, $folder)) {
        $sql1 = "INSERT INTO `bookbed`(`name`, `phone`, `aadhar`, `dob`, `email`, `idproof`, `days`, `date`, `hemail`) VALUES ('" . $name . "','" . $phone . "','" . $aadhar . "','" . $dob . "','" . $_SESSION['user'] . "','" . $filename . "','" . $days . "','" . $date . "','" . $hemail . "')";
        if (mysqli_query($con, $sql1)) {
          echo "<script>
						alert('Info Saved');
					</script>";
          echo "<script> location.href='services.php'; </script>";
        } else {
          echo "<script>
						alert('Update Failed');
					</script>";
          echo "<script> location.href='services.php'; </script>";
        }
      } else {
        echo "<script>
				alert('Upload Failed');
			</script>";
      }
    }
    ?>
  </div>
</section>

<?php include ('footer.php'); ?>

<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
  </svg></div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>

<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>

</html>