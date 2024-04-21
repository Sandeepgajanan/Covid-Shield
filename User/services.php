<?php session_start();
if (!isset($_SESSION['user'])) {
  echo "<script> location.href='index.php'; </script>";
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
          <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a
                href="home.php">Home</a></span> <span><a href="services.php">Services</a></span></p>
          <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Recovery plan for the world
          </h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <h2 class="mb-2">Discover Our Services</h2>
        <p>Experience modern healthcare at your fingertips</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 ftco-animate">
        <div class="card shadow p-3 mb-5 bg-white rounded">
          <div class="card-body text-center">
            <a href="test.php">
              <i class="fa fa-plus-square fa-3x text-primary"></i>
              <h3 class="mb-0">Covid Test</h3>
            </a>
            <div class="mt-3">

              <p class="text-muted">Get tested for Covid-19 with our efficient and reliable testing services.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="card shadow p-3 mb-5 bg-white rounded">
          <div class="card-body text-center">
            <a href="bed.php">
              <i class="fa fa-bed fa-3x text-primary"></i>
              <h3 class="mb-0">Bed Booking</h3>
            </a>
            <div class="mt-3">

              <p class="text-muted">Book hospital beds conveniently and securely for your healthcare needs.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="card shadow p-3 mb-5 bg-white rounded">
          <div class="card-body text-center">
            <a href="vaccine.php">
              <i class="fa fa-stethoscope fa-3x text-primary"></i>
              <h3 class="mb-0">Vaccination</h3>
            </a>
            <div class="mt-3">

              <p class="text-muted">Get vaccinated against Covid-19 with our safe and effective services.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-4 ftco-animate">
        <div class="card shadow p-3 mb-5 bg-white rounded">
          <div class="card-body text-center">
            <a href="hplasma.php">
              <i class="fa fa-user-plus fa-3x text-primary"></i>
              <h3 class="mb-0">Plasma Donation</h3>
            </a>
            <div class="mt-3">

              <p class="text-muted">Donate plasma to help save lives and support critical Covid-19 patients.</p>
            </div>
          </div>
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