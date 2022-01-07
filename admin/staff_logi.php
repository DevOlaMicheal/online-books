<?php
session_start();
require 'database.php';
require 'function.php';

$login_id='';
$password='';
$msgg='';
if(isset($_POST['submit'])){
    $login_id=$_POST['login_id'];
    $password=$_POST['password'];

    $res=mysqli_query($con,"select * from staffs where login_id='$login_id' and password='$password' ");
    //$row=mysqli_fetch_assoc($res);
    $cc=mysqli_num_rows($res);
    if($cc>0){

      $row=mysqli_fetch_assoc($res);
          if($row['status']==0){
              $msg='Your Account Is Suspended, Please Contact Admin';
          }else{
              $_SESSION['STAFF_LOGIN']='yes';
              $_SESSION['STAFF_USER_NAME']=$row['first_name'];
              $_SESSION['STAFF_USER_ID']=$row['id'];
              $_SESSION['LOGIN_ID']=$row['login_id'];
              redirect('index.php');
          }
  
        
      }else{
        $msgg="<div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h5><i class='icon fas fa-ban'></i> Opps sorry!</h5>
       Login Failed, check Password or mat no
      </div>";
      }
      
  }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background-image: url('admin/front-end/img/seven-shooter-hPKTYwJ4FUo-unsplash.jpg'); background-size: cover; background-position: center;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Student </b>SignIn</a>
      
      
    </div>
   
    <div class="card-body">
      <?php echo $msgg ?>
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="login_id" placeholder="Mat No">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
  
          <!-- /.col -->
          <div class="col-12">
            <button name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          
          <!-- /.col -->
        </div>
      </form>

     
      <p class="mb-0">
        <a href="register.html" class="text-center">Register? <i style="color: black;">or</i> login as staff </a>
      </p>
    </div>
    <!-- /.card-body -->
    <div class="card-outline card-primary">

</div>
  </div>
  
 
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>
</body>
</html>