<?php session_start();
if (!isset($_SESSION['user'])) {
  echo "<script> location.href='index.php'; </script>";
}

?>

<?php include ('nav.php'); ?>

<section class="home-slider owl-carousel">
  <div class="slider-item bread-item" style="background-image: url('images/qq.jpg');"
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

  label,
  th {

    font-size: 1em;
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

  .box input[type="submit"]:hover {
    box-shadow: 0 0 10px 0 #00d7c3 inset, 0 0 20px 2px #00d7c3;
    border: 3px solid #00d7c3;
  }
</style>
<section class="ftco-section">
  <div class="container">
    <br>
    <form action="#" class="box" method="post">
      <div class="form-group">
        <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder="Patient Name" pattern="[A-Za-z\s]+"
            title="letters only" maxlength="50" required="" />
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="aadhar" placeholder="Adhar Number" required="" pattern="[0-9]+"
            maxlength="12" minlength="12" title="numbers only with a length of 12" />

        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="phone" placeholder="Phone Number" required="" pattern="[0-9]+"
            title="numbers only" maxlength="10" minlength="10" />
        </div>
        <div class="form-group">
          <input placeholder="Date of Birth" type="date" name="dob" title="dob"
            max="<?php echo date("Y-m-d", strtotime("-6570 day")); ?>" required="">
        </div>
        <label for="hosiptals">Name of the Hospital : </label>
        <select name="hospital" id="hospitals" required="">
          <option value="">--Select--</option>
          <?php
          include ("config.php");
          $sql = "select hname,email from hospital";
          $result = mysqli_query($con, $sql);
          $count = mysqlI_num_rows($result);
          if ($count > 0) {
            while ($row = mysqli_fetch_array($result)) {
              $hname = $row[0];
              $hmail = $row[1];
              ?>
              <option value="<?php echo $hmail; ?>"><?php echo $hname; ?></option>
            <?php }
          } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="vaccine">Name of the Vaccine : </label>
        <select name="vaccine" id="hospitals" required="">
          <option value="">--Select--</option>
          <option value="CovidShield">CovidShield</option>
          <option value="Covaxin">Covaxin</option>
          <option value="Sputnik">Sputnik</option>
        </select>
      </div>
      <div class="form-group">
        <input placeholder="Book Slot" type="date" name="slot" min="<?php echo date("Y-m-d", strtotime("+1 day")); ?>"
          required="" />
      </div>
      <table width=1110 height=300 cellpadding="20" border=1 style="border-color:lightblue">
        <tr>
          <th>Name of the Hospital</th>
          <th>Name of the Vaccine</th>
          <th>Available/Unavailable</th>
          <th>Cost Of The Vacciene</th>
        </tr>
        <?php
        include ("config.php");
        $sql = "select hospital.hname, vaccine.vname, vaccine.qty, vaccine.cost from hospital inner join vaccine on vaccine.hemail=hospital.email";
        $result = mysqli_query($con, $sql);
        $count = mysqlI_num_rows($result);
        if ($count > 0) {
          while ($row = mysqli_fetch_array($result)) {
            $hname = $row[0];
            $vname = $row[1];
            $qty = $row[2];
            $cost = $row[3];
            ?>
            <tr>
              <td><?php echo $hname ?></td>
              <td><?php echo $vname ?></td>
              <td><?php echo $qty ?></td>
              <td><?php echo $cost ?></td>
            </tr>
          <?php }
        } ?>
      </table>
      <center>
        <div class="form-group">
          <input type="submit" value="Confirm" class="btn btn-primary py-3 px-5" name="save">
        </div>
      </center>
    </form>
    <?php
    if (isset($_POST['save'])) {
      error_reporting(1);
      include ("config.php");
      $aadhar = $_POST['aadhar'];

      $sql = "select * from bookvaccine where aadhar='$aadhar'";
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
      $hospital = $_POST['hospital'];
      $vaccine = $_POST['vaccine'];
      $slot = $_POST['slot'];

      $sql2 = "select * from vaccine where hemail='" . $hospital . "' and vname='" . $vaccine . "' and qty>0";
      $result2 = mysqli_query($con, $sql2);
      $count2 = mysqlI_num_rows($result2);
      if ($count2 > 0) {
        $sql0 = "select * from bookvaccine where aadhar='" . $aadhar . "'";
        $result0 = mysqli_query($con, $sql0);
        $count0 = mysqlI_num_rows($result0);
        if ($count0 > 0) {
          echo "<script>
							alert('The User with this Aadhar No has already booked a Vaccine');
						</script>";
        } else {
          $sql1 = "INSERT INTO `bookvaccine`(`name`, `aadhar`, `phone`, `dob`, `hemail`, `vname`, `slot`,`email`) VALUES ('" . $name . "','" . $aadhar . "','" . $phone . "','" . $dob . "','" . $hospital . "','" . $vaccine . "','" . $slot . "','" . $_SESSION['user'] . "')";
          if (mysqli_query($con, $sql1)) {
            $sql3 = "Update vaccine set qty=qty-1 where hemail='" . $hospital . "' and vname='" . $vaccine . "'";
            if (mysqli_query($con, $sql3)) {
              echo "<script>
							alert('Info Saved');
						</script>";
              echo "<script> location.href='services.php'; </script>";
            }
          } else {
            echo "<script>
						alert('Update Failed');
					</script>";
            echo "<script> location.href='vaccine.php'; </script>";
          }
        }
      } else {
        echo "<script>
					alert('Vaccine not available $vaccine $hospital');
				</script>";
        echo "<script> location.href='vaccine.php'; </script>";
      }
    }
    ?>
    <br>

  </div>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>

</html>