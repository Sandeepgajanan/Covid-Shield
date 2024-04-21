<?php session_start();
if (!isset($_SESSION['user'])) {
  echo "<script> location.href='index.php'; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include ('nav.php'); ?>

  <section class="home-slider owl-carousel">
    <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');"
      data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container" data-scrollax-parent="true">
        <div class="row slider-text align-items-end">
          <div class="col-md-7 col-sm-12 ftco-animate mb-5">

            <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Patient Details</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <style type="text/css">

  </style>


  <section class="ftco-section ftco-counter img" id="section-counter">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-md-3 aside-stretch py-5">
          <div class=" heading-section heading-section-white ftco-animate pr-md-4">
            <h2 class="mb-3">Covid Test</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br>
  <center>
    <table width=1110 height=200 cellpadding="10">
      <tr>
        <th>Hospital Name</th>
        <th>Patient Name</th>
        <th>Adhar Number</th>
        <th>Phone Number</th>
        <th>DOB</th>
        <th>Slot</th>
        <th>Email</th>
        <th>cost</th>
        <th>Payment Status</th>
        <th>Result</th>
        <th>download</th>
      </tr>
      <?php
      include ("config.php");
      $sql = "select booktest.*, hospital.hname, test.cost from booktest inner join hospital on hospital.email=booktest.hemail inner join test on hospital.email=test.hemail where booktest.uemail='" . $_SESSION['user'] . "'";
      $result = mysqli_query($con, $sql);
      $count = mysqlI_num_rows($result);

      if ($count > 0) {
        while ($row = mysqli_fetch_array($result)) {
          $id = $row[0];
          $name = $row[1];
          $aadhar = $row[2];
          $phone = $row[3];
          $dob = $row[4];
          $slot = $row[5];
          $email = $row[6];
          $hemail = $row[7];
          $payment = $row[8];
          $report = $row[10];
          $hname = $row['hname'];
          $cost = $row['cost'];
          ?>
          <tr>
            <td><?php echo $hname; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $aadhar; ?></td>
            <td><?php echo $phone; ?></td>
            <td><?php echo $dob; ?></td>
            <td><?php echo $slot; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $cost; ?></td>
            <td><?php echo $payment; ?></td>
            <td><?php echo $report; ?></td>
            <?php
            if ($report == 'Positive') { ?>
              <td>
                <center> <a href="images/pos.png" download="Positive">Download Certificate</a></center>
              </td>
              <?php
            } else if ($report == 'Negative') { ?>
                <td>
                  <center><a href="images/neg.png" download="Negative">Download Certificate</a></center>
                </td>
              <?php
            }
            ?>
            <td><?php if ($payment == 'pending') { ?><a
                  href="payment.php?id=<?php echo $id; ?>&type=test&cost=<?php echo $cost ?>"><input type="submit" name="save"
                    value="Pay" class="btn btn-primary py-3 px-5"></a><?php } ?></td>
          </tr>
        <?php }
      } ?>
    </table>
  </center>

  <section class="ftco-section ftco-counter img" id="section-counter">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-md-3 aside-stretch py-5">
          <div class=" heading-section heading-section-white ftco-animate pr-md-4">
            <h2 class="mb-3">Bed Booking</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <center>
    <br>
    <table width=1110 height=200 cellpadding="20" style="border-color:lightblue">
      <tr>
        <th>Hospital Name</th>
        <th>Patient Name</th>
        <th>Phone Number</th>
        <th>Adhar Number</th>
        <th>DOB</th>
        <th>Email</th>
        <th>Number of Days</th>
        <th>From Date</th>
        <th>Booking Advance</th>
        <th>Payment Status</th>
      </tr>
      <?php
      include ("config.php");
      $sql1 = "select bookbed.*, hospital.hname from bookbed inner join hospital on hospital.email=bookbed.hemail where bookbed.email='" . $_SESSION['user'] . "'";
      $result1 = mysqli_query($con, $sql1);
      $count1 = mysqlI_num_rows($result1);

      if ($count1 > 0) {
        while ($row1 = mysqli_fetch_array($result1)) {
          $id = $row1[0];
          $name = $row1[1];
          $phone = $row1[2];
          $aadhar = $row1[3];
          $dob = $row1[4];
          $email = $row1[5];
          $days = $row1[7];
          $date = $row1[8];
          $hemail = $row1[9];
          $payment = $row1[10];
          $hname = $row1['hname'];
          ?>
          <tr>
            <td><?php echo $hname; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $phone; ?></td>
            <td><?php echo $aadhar; ?></td>
            <td><?php echo $dob; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $days; ?></td>
            <td><?php echo $date; ?></td>
            <td>1000</td>
            <td><?php echo $payment; ?></td>
            <td><?php if ($payment == 'pending') { ?><a href="payment.php?id=<?php echo $id; ?>&type=bed&cost=1000"><input
                    type="submit" name="save" value="Pay" class="btn btn-primary py-3 px-5"></a><?php } ?></td>
          </tr>
        <?php }
      } ?>
    </table>
  </center>
  <br>

  <section class="ftco-section ftco-counter img" id="section-counter">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-md-3 aside-stretch py-5">
          <div class=" heading-section heading-section-white ftco-animate pr-md-4">
            <h2 class="mb-3">Vaccination</h2>

          </div>
        </div>
      </div>
    </div>
  </section>
  <center>
    <table width=1110 height=200 cellpadding="20" style="border-color:lightblue">
      <tr>
        <th>Hospital Name</th>
        <th>Vaccine Name</th>
        <th>Patient Name</th>
        <th>Adhar Number</th>
        <th>Phone Number</th>
        <th>DOB</th>
        <th>Date Of Test</th>
        <th>Cost</th>
        <th>Payment Status</th>
      </tr>
      <?php
      include ("config.php");
      $sql1 = "select bookvaccine.*, hospital.hname, vaccine.cost from bookvaccine left join hospital on hospital.email=bookvaccine.hemail inner join vaccine on hospital.email=vaccine.hemail where bookvaccine.email='" . $_SESSION['user'] . "' group by bookvaccine.aadhar";
      $result1 = mysqli_query($con, $sql1);
      $count1 = mysqlI_num_rows($result1);

      if ($count1 > 0) {
        while ($row1 = mysqli_fetch_array($result1)) {
          $id = $row1[0];
          $name = $row1[1];
          $aadhar = $row1[2];
          $phone = $row1[3];
          $dob = $row1[4];

          $vaccine = $row1[6];
          $date = $row1[7];
          $payment = $row1[9];
          $hname = $row1['hname'];
          $cost = $row1['cost'];
          ?>
          <tr>
            <td><?php echo $hname; ?></td>
            <td><?php echo $vaccine; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $aadhar; ?></td>
            <td><?php echo $phone; ?></td>
            <td><?php echo $dob; ?></td>
            <td><?php echo $date; ?></td>
            <td><?php echo $cost; ?></td>
            <td><?php echo $payment; ?></td>

            <td><?php if ($payment == 'pending') { ?><a
                  href="payment.php?id=<?php echo $id; ?>&type=vaccine&cost=<?php echo $cost ?>"><input type="submit"
                    name="save" value="Pay" class="btn btn-primary py-3 px-5"></a><?php } ?></td>
          </tr>
        <?php }
      } ?>
    </table>
  </center>
  <br>

  <section class="ftco-section ftco-counter img" id="section-counter">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-md-3 aside-stretch py-5">
          <div class=" heading-section heading-section-white ftco-animate pr-md-4">
            <h2 class="mb-3">Plasma Donation</h2>

          </div>
        </div>
      </div>
    </div>
  </section>
  <center>
    <table width=1110 height=200 cellpadding="20" style="border-color:lightblue">
      <tr>
        <th>Name</th>
        <th>DOB</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>State</th>
        <th>Address</th>
        <th>Blood Group</th>
        <th>Lab Test</th>
        <th>Symptoms</th>
        <th>Negative Report</th>
        <th>Date Of Last Symptoms</th>
        <th>Hospital email</th>
        <th>Status</th>
      </tr>
      <?php
      include ("config.php");
      $sql4 = "select * from donate where email='" . $_SESSION['user'] . "'";
      $result4 = mysqli_query($con, $sql4);
      $count4 = mysqlI_num_rows($result4);

      if ($count4 > 0) {
        while ($row4 = mysqli_fetch_array($result4)) {
          $id = $row4[0];
          $name = $row4[1];
          $dob = $row4[2];
          $age = $row4[3];
          $gender = $row4[4];
          $phone = $row4[5];
          $state = $row4[6];
          $address = $row4[7];
          $blood = $row4[8];
          $test = $row4[9];
          $symp = $row4[10];
          $rep = $row4[11];
          $last = $row4[12];
          $hemail = $row4[14];
          $status = $row4[15];
          ?>
          <tr>
            <td><?php echo $name; ?></td>
            <td><?php echo $dob; ?></td>
            <td><?php echo $age; ?></td>
            <td><?php echo $gender; ?></td>
            <td><?php echo $phone; ?></td>
            <td><?php echo $state; ?></td>
            <td><?php echo $address; ?></td>
            <td><?php echo $blood; ?></td>
            <td><?php echo $test; ?></td>
            <td><?php echo $symp; ?></td>
            <td><?php echo $rep; ?></td>
            <td><?php echo $last; ?></td>
            <td><?php echo $hemail; ?></td>
            <td><?php echo $status; ?></td>
            <td><a href="?delid=<?php echo $id; ?>"><button>Delete</button></a></td>
          </tr>
        <?php }
      }
      if (isset($_GET['delid'])) {
        $delid = $_GET['delid'];
        $query = "delete from donate where `id`='" . $delid . "'";

        mysqli_query($con, $query) or die(mysqli_error($con));
        echo "<script>
				alert('deleted');
			</script>";
        echo "<script> location.href='not.php'; </script>";
      }
      ?>
    </table>
  </center>
  <br>
  <center>

  </center>
  <br>

  <br>
  <?php include ('footer.php'); ?>


  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" />
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