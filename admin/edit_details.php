<?php
require 'header.php';
require 'sidebar.php';


$full_name = '';
$password = '';
$id = '';


$row = mysqli_fetch_assoc(mysqli_query($con, "select * from admin_user"));

$full_name = $row['full_name'];
$password = $row['password'];
$login_id = $row['login_id'];


if (isset($_POST['submit'])) {


  $full_name = $_POST['full_name'];
  $password = $_POST['password'];
  $login_id = $_POST['login_id'];

  // prx($_POST);


  mysqli_query($con, "update admin_user set full_name='$full_name',login_id='$login_id', password='$password' ");
  redirect('index.php');
}




$res = mysqli_query($con, 'select * from requests where status=0');
$sel = mysqli_query($con, 'select * from student_users');



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
        <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Admin s<small>EDIT YOUR DETAILS</small></h3>
        </div>

            <form method="post" id="quickForm" enctype="multipart/form-data">

   <div class="card-body">
                <div class="form-group">
                    <label for="inputName">Login ID </label>
                    <input type="text" name="login_id" class="form-control" value="<?php echo $login_id ?>">
                </div>
                <div class="form-group">
                    <label for="inputName">Full name </label>
                    <input type="text" name="full_name" class="form-control" value="<?php echo $full_name ?>">
                </div>
                <div class="form-group">
                    <label for="inputProjectLeader">Password</label>
                    <input type="" name="password" class="form-control" value="<?php echo $password ?>">
                </div>
                </ <div class="form-group mb-0">
        </div>
    </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </div>
    </form>
</div>
<!-- /.card -->

        

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>


<!-- /.content-wrapper -->
<?php

require 'footer.php';


?>