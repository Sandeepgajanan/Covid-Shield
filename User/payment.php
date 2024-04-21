<?php session_start();
if (!isset($_SESSION['user'])) {
  echo "<script> location.href='index.php'; </script>";
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $type = $_GET['type'];
  $cost = $_GET['cost'];

}
?>


<?php include ('nav.php'); ?>

<section class="home-slider owl-carousel">
  <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container" data-scrollax-parent="true">
      <div class="row slider-text align-items-end">
        <div class="col-md-7 col-sm-12 ftco-animate mb-5">
          <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Payment</h1>
        </div>
      </div>
    </div>
  </div>
</section>



<section>
  <div class="container">
    <div class="row justify-content-center mt-5 mb-5">
      <div class="col-md-6">
        <div class="border p-4">
          <form action="#" class="box" method="post">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Card Number" required pattern="[0-9]+" minlength="16"
                maxlength="16" title="Numbers only with a length of 16" maxlength="50" />
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Card Holder Name" required pattern="[A-Za-z\s]+"
                title="Letters only" maxlength="50" required />
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="CVV" required pattern="[0-9]+" title="Numbers only"
                maxlength="4" minlength="3" maxlength="50" />
            </div>
            <div class="form-group">
              <input type="date" class="form-control" placeholder="Date Of Expire" required
                min="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" />
            </div>
            <div class="form-group">
              <input type="number" class="form-control" value="<?php echo $cost; ?>" readonly />
            </div>
            <div class="form-group">
              <input type="submit" name="submit" value="Pay" class="btn btn-primary py-3 px-5">
            </div>
          </form>
          <?php
          if (isset($_POST['submit'])) {
            include ("config.php");
            if ($type = "test") {
              $query = "update booktest set payment='paid' where `id`='" . $id . "'";
              mysqli_query($con, $query) or die(mysqli_error($con));
              echo "<script>alert('Payment Successful');</script>";
              echo "<script> location.href='home.php'; </script>";
            }
            if ($type = "bed") {
              $query = "update bookbed set payment='paid' where `id`='" . $id . "'";
              mysqli_query($con, $query) or die(mysqli_error($con));
              echo "<script>alert('Payment Successful');</script>";
              echo "<script> location.href='home.php'; </script>";
            }
            if ($type = "vaccine") {
              $query = "update bookvaccine set payment='paid' where `id`='" . $id . "'";
              mysqli_query($con, $query) or die(mysqli_error($con));
              echo "<script>alert('Payment Successful');</script>";
              echo "<script> location.href='home.php'; </script>";
            }
            echo "<script>alert('Payment Module in Development');</script>";
            echo "<script> location.href='not.php'; </script>";
          }
          ?>
        </div>
      </div>
    </div>
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
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>

</html>