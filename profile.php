<?php

require 'header.php';

$uuuid = $_SESSION["STUDENT_USER_ID"];
$ufullname = mysqli_query($con, "select * from student_users where id='$uuuid'");
$fetchit = mysqli_fetch_assoc($ufullname);
$uufname = $fetchit['first_name'];
$uulname = $fetchit['last_name'];
$uulevel = $fetchit['level'];
$uudepartment = $fetchit['department'];
$uupassword = $fetchit['password'];
$uufullnsme = $uufname . " " . $uulname;

$row = mysqli_query($con,"select * from student_users where id='$uuuid' ");

if (isset($_POST['submit'])) {

  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $mat_no = $row['mat_no'];
  $password = $row['password'];
  $level = $row['level'];
  $department = $row['department'];

   //prx($_POST);
  $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
 
  move_uploaded_file($_FILES['image']['tmp_name'], IMAGE_SERVER_PATH . $image);
  mysqli_query($con, "update student_users set mat_no='$mat_no',password='$password',first_name='$first_name',last_name='$last_name',image='$image',level='$level',department='$department' where id='$uuuid'");
  redirect('students.php');
}

?>



<div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url(assets/assets/img/alexandra-fuller-wkgv7I2VTzM-unsplash.jpg);">
  <div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-lg-8">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">profile</li>
          </ol>
        </nav>
        <h1 class="fg-white text-center">Profile</h1>
      </div>
    </div>
  </div>
</div> <!-- .page-banner -->
</header>

<main>
  <div class="page-section">
    <div class="container">
      <div class="text-center">
        <h2 class="title-section mb-3">Your profile</h2>
        <a href="mailto:example@mail.com"></a></p>
      </div>
      <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
        <div class="avatar">
                      <img src="<?php echo IMAGE_SITE_PATH . $fetchit['image'] ?>" height="150px"  alt="" style="border-radius: 50%;">
                    </div>
                    <br>
                    <div class="col-12 py-2">
                <label for="subject" class="fg-grey">change image</label>
                <input type="file" class="form-control" style="width: 200px;" name="image" id="subject">
              </div>
                    <br><br>
          <form  class="form-contact">
            
            <div class="row">
              <div class="col-sm-6 py-2">
              
                <label for="name" class="fg-grey">first name</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo $uufname ?>" id="name">
              </div>
              <div class="col-sm-6 py-2">
                <label for="email" class="fg-grey">last name</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo $uulname ?>" id="email">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 py-2">
                <label for="name" class="fg-grey">level</label>
                <input type="text" class="form-control"  value="<?php echo $uulevel ?>" name="level" id="name">
              </div>
              <div class="col-sm-6 py-2">
                <label for="email" class="fg-grey">Department</label>
                <input type="text" class="form-control" value="<?php echo $uudepartment ?>" name="department" id="email" readonly>
              </div>

              <div class="col-12 py-2">
                <label for="subject" class="fg-grey">Mat Number</label>
                <input type="text" class="form-control" value="<?php echo $_SESSION['MAT_NO'] ?>" name="mat_no" id="subject" readonly>
              </div>
              <div class="col-12 py-2">
                <label for="subject" class="fg-grey">Password</label>
                <input type="text" value="<?php echo $uupassword ?>" class="form-control" name="password" id="subject">
              </div>

              <div class="col-12 mt-3">
                <button name="submit" class="btn btn-primary px-5">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  <div class="maps-container">
    <div id="google-maps"></div>
  </div>
</main>



<?php

require 'footer.php';

?>