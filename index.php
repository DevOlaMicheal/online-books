<?php
require 'header.php';





?>

<div class="page-banner home-banner mb-5">
  <div class="slider-wrapper">
    <div class="owl-carousel hero-carousel">
      <div class="hero-carousel-item">
        <img src="assets/assets/img/alexandra-fuller-wkgv7I2VTzM-unsplash.jpg" alt="">
        <div class="img-caption">
          <div class="subhead">FEDERAL COLLEGE OF FORESTRY, JOS</div>
          <h1 class="mb-4">Online Library system</h1>
          <a href="#services" class="btn btn-outline-light">Explore</a>
        </div>
      </div>
      <div class="hero-carousel-item">
        <img src="assets/assets/img/seven-shooter-hPKTYwJ4FUo-unsplash.jpg" alt="">
        <div class="img-caption">
          <h1 class="mb-4">Easy book access For Students</h1>
          <a href="#page-section" class="btn btn-outline-light">Get Started</a>
          <a href="#page-section" class="btn btn-primary">Explore</a>
        </div>
      </div>
      <div class="hero-carousel-item">
        <img src="assets/assets/img/libedu.jpg" alt="">
        <div class="img-caption">
          <div class="subhead">ICT to improve reading culture</div>
          <h1 class="mb-4">Download free online</h1>
          <a href="#page-section" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
  </div> <!-- .slider-wrapper -->
</div> <!-- .page-banner -->
</header>

<main>
  <div class="container">
    <div class="row">
  <div class="col-lg-3 py-3">
          <h5>What are you looking for?</h5>
          <form action="#">
            <input type="text" id="searchh" name="query" autocomplete="off" class="form-control" placeholder="book name/title">
            <br>
            <div style="background-color: white;  border-radius: 10px; margin-top:-13px !important;">
								<ul id="append" class="list-group" style="margin-bottom:0px;">


								</ul>
            </div>
            
            <button type="submit"  class="btn btn-primary btn-sm mt-2">Search</button>
          </form>
        </div>
        </div>
    </div>
    <?php
    require 'books.php'
    ?>

    <div class="page-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3">
            <div class="subhead">About Project</div>
            <h2 class="title-section">The <span class="fg-primary">CF Jos E-library</span> </h2>

            <p>Built by graduating students of the set of 2021 computer scince under the supervision of prof john Doe. all rights reserved!</p>

            <a href="about.html" class="btn btn-primary mt-4">Read More</a>
          </div>
          <div class="col-lg-6 py-3">
            <div class="about-img">
              <img src="assets/assets/img/logo.png" alt="lo">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .page-section -->


    <?php
    require 'req.php';
    ?>


</main>
<?php
require 'footer.php'
?>