<?php session_start();
if (!isset($_SESSION['user'])) {
  echo "<script> location.href='index.php'; </script>";
}
$hemail = $_GET['hid'];
?>


<?php include ('nav.php'); ?>

<section class="home-slider owl-carousel">
  <div class="slider-item bread-item" style="background-image: url('images/bggg.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container" data-scrollax-parent="true">
      <div class="row slider-text align-items-end">
        <div class="col-md-7 col-sm-12 ftco-animate mb-5">

          <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Thank you for the initiative
          </h1>
          <p class="mb-4">You are saving a life by donating plasma</p>
        </div>
      </div>
    </div>
  </div>
</section>
<br>


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

  input[type=radio] {
    padding: 12px 10px;
    width: 5%;
    height: 1em;



  }

  input[type=submit] {
    width: 20%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type=submit]:hover {
    background-color: #45a049;
  }
</style>

<section class="ftco-section">
  <div class="container">
    <form action="#" method="post" class="box">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Donor Name" name="name" pattern="[A-Za-z\s]+"
          title="letters only" maxlength="50" required="" />
      </div>
      <div class="form-group">
        <input placeholder="Date of Birth" type="date" title="dob" name="dob"
          max="<?php echo date("Y-m-d", strtotime("-6570 day")); ?>" required="">
      </div>
      <div class="form-group">
        <input type="number" name="age" class="form-control" placeholder="Age" required="" pattern="[0-9]+"
          title="numbers only" min="18" max="65" />
      </div>
      <br>
      <div class="form-group">
        <label for="gen">Gender</label><br>
        <input type="radio" id="male" name="gender" value="Male" required="">Male
        <input type="radio" id="female" name="gender" value="Female">Female
        <br><br>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="phone" placeholder="Phone Number" required="" pattern="[0-9]+"
          title="numbers only" minlength="10" maxlength="10" />
      </div>
      <div class="form-group">
        <label for="state">State</label>
        <select id="state" name="state" required="">
          <option value="0">--Select--</option>
          <option value="Karnataka">Karnataka</option>
          <option value="Kerala">Kerala</option>
          <option value="Telangana">Telangana</option>
          <option value="Tamilnadu">Tamilnadu</option>
        </select>
      </div>
      <div class="form-group">
        <label for="ad">Address</label>
        <input type="text" id="ad" name="ad" placeholder="Address" pattern="[A-Za-z0-9\s]+" required maxlength="50" />
      </div>
      <div class="form-group">
        <label for="bg">Blood Group</label>
        <select name="bg" id="bg" required="">
          <option value="">--Select--</option>
          <option value="A+">A+</option>
          <option value="AB+">AB+</option>
          <option value="A-">A-</option>
          <option value="AB-">AB-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="O+">O+</option>
          <option value="O+">O-</option>
        </select>
      </div>
      <br>
      <div class="form-group">
        <label for="test">Was your COVID-19 diagnosis confirmed by a lab test?</label>
        <br>
        <input type="radio" name="test" id="t" value="yes" required="">Yes &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <input type="radio" name="test" id="t" value="No">No &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <br>
        <br>
      </div>
      <div class="form-group">
        <label for="sym">Do you currently have symptoms?</label>
        <br>
        <input type="radio" name="symp" id="t" value="Yes" required="">Yes &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <input type="radio" name="symp" id="t" value="No">No &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <br>
        <br>
      </div>
      <div class="form-group">
        <label for="rep">Have you taken follow up test that was negative for COVID-19?</label>
        <br>
        <input type="radio" name="rep" id="t" value="Yes" required="">Yes &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <input type="radio" name="rep" id="t" value="No">No &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <br>
        <br>
      </div>
      <div class="form-group">
        <input placeholder="Date of last symptom (approximate)" name="last" type="date"
          max="<?php echo date("Y-m-d", strtotime("-90 day")); ?>" required="">
      </div>
      <center>
        <input type="Submit" value="Submit" name="save">
      </center>
  </div>
  </form>
  <?php
  if (isset($_POST['save'])) {
    error_reporting(1);
    include ("config.php");
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $state = $_POST['state'];
    $ad = $_POST['ad'];
    $bg = $_POST['bg'];
    $test = $_POST['test'];
    $symp = $_POST['symp'];
    $rep = $_POST['rep'];
    $last = $_POST['last'];

    $sql1 = "INSERT INTO `donate`(`name`, `dob`, `age`, `gender`, `phone`, `state`, `address`, `blood`, `test`, `smptoms`, `test2`, `last`, `email`, `hemail`) VALUES ('" . $name . "','" . $dob . "','" . $age . "','" . $gender . "','" . $phone . "','" . $state . "','" . $ad . "','" . $bg . "','" . $test . "','" . $symp . "','" . $rep . "','" . $last . "','" . $_SESSION['user'] . "','" . $hemail . "')";
    if (mysqli_query($con, $sql1)) {
      echo "<script>
						alert('Info Saved');
					</script>";
      echo "<script> location.href='services.php'; </script>";
    } else {
      echo "<script>
						alert('Update Failed');
					</script>";
      echo "<script> location.href='hplasma.php'; </script>";
    }
  }
  ?>

</section>








<?php include ('footer.php'); ?>



<!-- loader -->
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