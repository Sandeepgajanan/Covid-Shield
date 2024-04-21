<?php session_start();
if (!isset($_SESSION['user'])) {
  echo "<script> location.href='index.php'; </script>";
}
?>

<?php include ('nav.php'); ?>

<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text align-items-center" data-scrollax-parent="true">
        <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
          <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Recovery plan for the World
          </h1>
          <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Modern mankind just a click
            away</p>
        </div>
      </div>
    </div>
  </div>
  <div class="slider-item" style="background-image: url('images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text align-items-center" data-scrollax-parent="true">
        <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
          <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Recovery plan for the World
          </h1>
          <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Modern mankind just a click
            away</p>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <h2 class="mb-2">We serve you the best</h2>
        <p>Modern mankind just a click away</p>
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
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <h2 class="mb-3">Registered Hospitals</h2>
        <p>Below is a list of currently registered hospitals. You can explore their details and avail their services.
        </p>
      </div>
    </div>
    <div class="row">
      <?php
      include 'config.php';
      $sql = "SELECT * FROM hospital";
      $result = mysqli_query($con, $sql);

      while ($row = mysqli_fetch_array($result)) {
        $name = $row['hname'];
        $address = $row['address'];
        $city = $row['city'];
        $phone = $row['phone'];
        $email = $row['email'];
        $image = $row['image'];
        ?>
        <div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
          <div class="staff">
            <div class="img mb-4" style="background-image: url(../Hospital/uploads/<?php echo $image; ?>);"></div>
            <div class="info text-center">
              <h3><?php echo $name; ?></h3>
              <div class="text">
                <p>Address: <?php echo $address;
                echo ', ';
                echo $city; ?></p>
                <p>Phone: <?php echo $phone; ?></p>
                <a href="services.php" class="py-2 d-block">Services</a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>


<section class="ftco-section testimony-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-8 text-center">
        <h2 class="mb-2">What Our Customers Say</h2>
        <span class="subheading">Read the testimonials from our satisfied customers</span>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="carousel-testimony owl-carousel">
          <div class="item">
            <div class="card testimonial-card border border-primary">
              <div class="card-body">
                <span class="quote d-flex align-items-center justify-content-center"><i
                    class="icon-quote-left"></i></span>
                <p class="card-text">"Luckily, I came across the COVIDSHIELD website, which gave me instant
                  access to
                  our hospital doctors online."</p>
                <p class="card-text"><strong>Suhan Shetty</strong>, Marketing Manager</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card testimonial-card border border-primary">
              <div class="card-body">
                <span class="quote d-flex align-items-center justify-content-center"><i
                    class="icon-quote-left"></i></span>
                <p class="card-text">"The services that I receive are excellent. Doctors and the staff are
                  friendly and
                  ensure that I am properly informed about my health and care."</p>
                <p class="card-text"><strong>Pooja Hegade</strong>, Interface Designer</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card testimonial-card border border-primary">
              <div class="card-body">
                <span class="quote d-flex align-items-center justify-content-center"><i
                    class="icon-quote-left"></i></span>
                <p class="card-text">"Finally! I donated plasma to the COVID patient. Thank you,
                  COVIDSHIELD."</p>
                <p class="card-text"><strong>Nidhima</strong>, Artist</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card testimonial-card border border-primary">
              <div class="card-body">
                <span class="quote d-flex align-items-center justify-content-center"><i
                    class="icon-quote-left"></i></span>
                <p class="card-text">"I got vaccinated. Much thanks to COVIDSHIELD."</p>
                <p class="card-text"><strong>Kabir</strong>, Musician</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card testimonial-card border border-primary">
              <div class="card-body">
                <span class="quote d-flex align-items-center justify-content-center"><i
                    class="icon-quote-left"></i></span>
                <p class="card-text">"I belong to the rural area. Through this website, it was easy for me to
                  book the
                  bed for my father. Now my father is doing fine... Gratitude always."</p>
                <p class="card-text"><strong>Ramanna</strong>, Farmer</p>
              </div>
            </div>
          </div>
          <!-- Additional testimonial items go here -->
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