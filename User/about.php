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
                href="home.php">Home</a></span> <span><a href="about.html">About</a></span></p>
          <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">About Us</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row d-md-flex justify-content-center">

      <div class="col-md-8 ftco-animate order-md-first">
        <div class="row">
          <div class="col-md-12 nav-link-wrap mb-5">
            <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" id="v-pills-whatwedo-tab" data-toggle="pill" href="#v-pills-whatwedo"
                role="tab" aria-controls="v-pills-whatwedo" aria-selected="true">What we do</a>
              <a class="nav-link" id="v-pills-mission-tab" data-toggle="pill" href="#v-pills-mission" role="tab"
                aria-controls="v-pills-mission" aria-selected="false">Our Mission</a>
              <a class="nav-link" id="v-pills-goal-tab" data-toggle="pill" href="#v-pills-goal" role="tab"
                aria-controls="v-pills-goal" aria-selected="false">Our Goal</a>
            </div>
          </div>
          <div class="col-md-12">
            <div class="tab-content ftco-animate" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-whatwedo" role="tabpanel"
                aria-labelledby="v-pills-whatwedo-tab">
                <div>
                  <h2 class="mb-4">What we do</h2>
                  <p>We offer high-quality services to our clients, ensuring their satisfaction and well-being.</p>
                  <p>Our team is dedicated to providing exceptional care and support to meet all your needs.</p>
                  <p>We strive to make a positive impact on our community and promote a healthier lifestyle.</p>
                </div>
              </div>
              <div class="tab-pane fade" id="v-pills-mission" role="tabpanel" aria-labelledby="v-pills-mission-tab">
                <div>
                  <h2 class="mb-4">Our Mission</h2>
                  <p>Our mission is to accommodate all patients with the highest level of care and compassion.</p>
                  <p>We believe in the importance of lifting others up and making a difference in their lives.</p>
                  <p>Every action we take is guided by our commitment to serving our community with integrity and
                    kindness.</p>
                </div>
              </div>
              <div class="tab-pane fade" id="v-pills-goal" role="tabpanel" aria-labelledby="v-pills-goal-tab">
                <div>
                  <h2 class="mb-4">Our Goal</h2>
                  <p>Our goal is to meet our customers' needs and exceed their expectations.</p>
                  <p>We strive to make each day count by bringing smiles to people's faces and making a positive impact
                    on their lives.</p>
                  <p>Together, we can create a brighter and happier future for everyone.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="ftco-section-2">
  <div class="container-wrap">
    <div class="row d-flex no-gutters">
      <div class="col-md-6 img" style="background-image: url(images/about-2.jpg);">
      </div>
      <div class="col-md-6 d-flex">
        <div class="about-wrap">
          <div class="heading-section heading-section-white mb-5 ftco-animate">
            <h2 class="mb-2">Recovery plan for the world</h2>
            <p>It's time to reach everyone.</p>
          </div>
          <div class="list-services d-flex ftco-animate">
            <div class="icon d-flex justify-content-center align-items-center">
              <span class="icon-check2"></span>
            </div>
            <div class="text">
              <h3>Authorized/Approved Hospitals</h3>
              <p>We will provide the best hospitals for you.</p>
            </div>
          </div>
          <div class="list-services d-flex ftco-animate">
            <div class="icon d-flex justify-content-center align-items-center">
              <span class="icon-check2"></span>
            </div>
            <div class="text">
              <h3>Well experienced doctors</h3>
              <p>Best treatment by the best doctors.</p>
            </div>
          </div>
          <div class="list-services d-flex ftco-animate">
            <div class="icon d-flex justify-content-center align-items-center">
              <span class="icon-check2"></span>
            </div>
            <div class="text">
              <h3>Vaccination</h3>
              <p> It's not vaccines that will stop this pandemic, It's vaccination.</p>
            </div>
          </div>
          <div class="list-services d-flex ftco-animate">
            <div class="icon d-flex justify-content-center align-items-center">
              <span class="icon-check2"></span>
            </div>
            <div class="text">
              <h3>Covid Test/Bed Booking/Vaccination/Plasma Donation/Reports</h3>
              <p>Best solution to solve your challenge.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
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