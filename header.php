<?php

session_start();
require 'database.php';
require 'function.php';

$res = mysqli_query($con, "select * from upload where department='SLT' order by id desc limit 4");
$cc = mysqli_num_rows($res);

$res2 = mysqli_query($con, "select * from upload where department='COMPUTER SCIENCE' order by id desc limit 4");
$res3 = mysqli_query($con, "select * from upload where department='STATISTICS' order by id desc limit 4");
$res4 = mysqli_query($con, "select * from upload where department='AGT' order by id desc limit 4");
$res5 = mysqli_query($con, "select * from upload where department='FOT' order by id desc limit 4");

$no_slt = mysqli_num_rows($res);
$no_cs = mysqli_num_rows($res2);
$no_stats = mysqli_num_rows($res3);
$no_agt = mysqli_num_rows($res4);
$no_fot = mysqli_num_rows($res5);


$msgg="<div class='alert alert-primary alert-dismissible'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h5><i class='icon fas fa-ban'></i> Nothing to show here!</h5>
No book Has been uploaded to this departmnet
</div>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>E-LIBRARY | FEDERAL COLLEGE OF FORESTRY JOS</title>
  <link rel="shortcut icon" href="admin/dist/img/logo.png">

  <link rel="stylesheet" href="assets/assets/css/bootstrap.css">

  <link rel="stylesheet" href="assets/assets/css/maicons.css">

  <link rel="stylesheet" href="assets/assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="assets/assets/vendor/owl-carousel/css/owl.carousel.css">
<link rel="stylesheet" href="assets/assets/fonts/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/assets/vendor/fancybox/css/jquery.fancybox.css">
  <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="assets/assets/css/theme.css">

</head>

<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="top-bar">
      <div class="container">
        <div class="row align-items-center">
          <?php if (isset($_SESSION["STUDENT_USER_NAME"])) { ?>


            <div class="col-md-8">
              <div class="d-inline-block">
                <h5> <?php echo $_SESSION["STUDENT_USER_NAME"]; ?> </h5>
              </div>
              <div class="d-inline-block ml-2">

              </div>
            </div>
            <div class="col-md-4 text-right d-none d-md-block">
              <div class="social-mini-button">
                <h5> <?php echo $_SESSION["MAT_NO"]; ?> </h5>

              </div>
            </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .top-bar -->

  <?php } else { ?>
    <div class="col-md-8">
      <div class="d-inline-block">
        <span class="mai-mail fg-primary"></span> <a href="mailto:contact@mail.com">FCFJ@gmail.com</a>
      </div>
      <div class="d-inline-block ml-2">
        <span class="mai-call fg-primary"></span> <a href="tel:+0011223495">Jos</a>
      </div>
    </div>
    <div class="col-md-4 text-right d-none d-md-block">
      <div class="social-mini-button">
        <a href="#"><span class="mai-logo-facebook-f"></span></a>
        <a href="#"><span class="mai-logo-twitter"></span></a>

      </div>
    </div>
    </div>
    </div> <!-- .container -->
    </div> <!-- .top-bar -->

  <?php } ?><br>

  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a href="index.html" class="navbar-brand">FCF<span class="text-primary"> Jos.</span></a>

      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse" id="navbarContent">
        <ul class="navbar-nav ml-auto pt-3 pt-lg-0">
          <li class="nav-item active">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="pqanda.php" class="nav-link">Past Questions</a>
          </li>
          <li class="nav-item">
            <a href="videos.php" class="nav-link">Video/Audio</a>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                Departments
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="slt.php">SLT</a>
                <a class="dropdown-item" href="cs.php">Computer science</a>
                <a class="dropdown-item" href="agt.php">Agt</a>
                <a class="dropdown-item" href="stats.php">Statistics</a>
                <a class="dropdown-item" href="fot.php">Fot</a>
              </div>
            </div>
          </li>
         
          <?php if (isset($_SESSION["STUDENT_USER_NAME"])) { ?>
            &nbsp &nbsp &nbsp
      <li class="nav-item">
         
         <div class="dropdown">
         <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown""> <i class="fa fa-user" style="font-size: 20px;"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="notification.php">Notification</a>
                <a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION['STUDENT_USER_ID'] ?>">Profile page</a>
                <a class="dropdown-item" href="logout.php">logout</a>
                
              </div>
            </div>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a href="login.php" class="nav-link"><button class="btn btn-primary">login</button></a>
            </li>
          <?php } ?>
         
        </ul>
      </div>
    </div> <!-- .container -->
  </nav> <!-- .navbar -->