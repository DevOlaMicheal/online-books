<?php
require 'header.php';
require 'sidebar.php';

$full_name = '';
$id = '';
$m = '';
$department='';
$type = '';
$password = '';
$login_id = '';
$id = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];

    $row = mysqli_fetch_assoc(mysqli_query($con, "select * from admin_user where id='$id' "));
    $full_name = $row['full_name'];
    $password = $row['password'];
    $login_id = $row['login_id'];
    $type= $row['type'];
}

if (isset($_POST['submit'])) {

    $full_name = $_POST['full_name'];
    $password = $_POST['password'];
    $department = $_POST['department'];
    $type= $_POST['type'];
    $loginooo=str_shuffle("1234567890");
    $loginxo=substr($loginooo,0,4);
    $loginxrr=substr($full_name,0,3);
    $login_id=$loginxrr.$loginxo;
    // prx($_POST);

    if ($id == '') {
        $ress=mysqli_query($con,"select * from admin_user where login_id='$login_id' ");
        $check = mysqli_num_rows($ress);
        if ($check>0){
            $m = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Failed to add staff: </strong> Use another login id.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
        }else{
            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], IMAGE_SERVER_PATH . $image);
            mysqli_query($con, "insert into admin_user(full_name,password,login_id,department,image,status,type) values('$full_name','$password','$login_id','$department','$image',1,'$type')");
            redirect('manage_staffs.php');
        }
        //$row=mysqli_fetch_assoc($res);

        
    } else {
        $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
        //prx($_POST);
        move_uploaded_file($_FILES['image']['tmp_name'], IMAGE_SERVER_PATH . $image);
        mysqli_query($con, "update admin_user set full_name='$full_name',password='$password',image='$image',department='$department',type='$type' where id='$id'");
        redirect('manage_staffs.php');
    }
}



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
                        <li class="breadcrumb-item active">Dashboard</li>
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


                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Admin Privilege <small>Add New Admin</small></h3>
                        </div>

                        <form method="post" enctype="multipart/form-data">


                            <div class="card-body">
                                <div class="form-group">
                                    <labe>full Name</label>
                                        <input type="" name="full_name" placeholder="first name . middle name . last name" class="form-control" value="<?php echo $full_name ?>" required>
                                </div>
                                

                                <div class="form-group">
                                    <label for="exampleInputPassword1">password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="password" value="<?php echo $password ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Image</label>
                                    <input type="file" name="image" class="form-control" id="exampleInputPassword1" required>
                                </div>
                                <!--<div class="form-group mb-0">
            </div> -->
                                <h5>Department</h5>
                                <div class="form-group">
                                    <select class="custom-select form-control-border" id="exampleSelectBorder" name="department">
                                        <option><?php echo $department ?></option>
                                        <option>SLT</option>
                                        <option>STATISTICS</option>
                                        <option>COMPUTER SCIENCE</option>
                                        <option>FOT</option>
                                        <option>AGT</option>
                                        <option>NIL</option>
                                    </select>
                                </div>
                               
                                <h5>level</h5>
                                <div class="form-group">
                                    <select class="custom-select form-control-border" id="exampleSelectBorder" name="type">
                                        <option><?php echo $type ?></option>
                                        <option value="full_admin">Full admin</option>
                                        <option value="half_admin">Half admin</option>
                                        <option value="staff">Staff</option>
                                    </select>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button name="submit" type="submit" class="btn btn-danger">Submit</button>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>



        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
</div>

<!-- /.content-wrapper -->
<?php

require 'footer.php';


?>