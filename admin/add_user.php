<?php
require 'header.php';
require 'sidebar.php';

$mat_no = '';
$password = '';
$first_name = '';
$last_name = '';
$id = '';
$m = '';
$level = '';
$department = '';
$id = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];

    $row = mysqli_fetch_assoc(mysqli_query($con, "select * from student_users where id='$id' "));

    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $mat_no = $row['mat_no'];
    $password = $row['password'];
    $level = $row['level'];
    $department = $row['department'];
}

if (isset($_POST['submit'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mat_no = $_POST['mat_no'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $department = $_POST['department'];
    $date =  date("Y-m-d h:i:sa");

    // prx($_POST);

    if ($id == '') {
        $ress=mysqli_query($con,"select * from student_users where mat_no='$mat_no' ");
        $check = mysqli_num_rows($ress);
        if ($check>0){
            $m = "Mat Number Already Exists In Database";
            $m = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Failed to add student: </strong> Student with this matnumber is regsitered already try again.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
        }else{
            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], IMAGE_SERVER_PATH . $image);
            mysqli_query($con, "insert into student_users(first_name,last_name,mat_no,password,level,department,image,status,date) values('$first_name','$last_name','$mat_no','$password','$level','$department','$image',1,'$date')");
            redirect('students.php');
        }
        //$row=mysqli_fetch_assoc($res);

        
    } else {
        $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
        //prx($_POST);
        move_uploaded_file($_FILES['image']['tmp_name'], IMAGE_SERVER_PATH . $image);
        mysqli_query($con, "update student_users set mat_no='$mat_no',password='$password',first_name='$first_name',last_name='$last_name',image='$image',level='$level',department='$department' where id='$id'");
        redirect('students.php');
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
                            <h3 class="card-title">Admin Privilege <small>Add stduent Users</small></h3>
                        </div>

                        <form method="post" enctype="multipart/form-data">


                            <div class="card-body">
                                <div class="form-group">
                                    <labe>First Name</label>
                                        <input type="" name="first_name" class="form-control" value="<?php echo $first_name ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="" name="last_name" class="form-control" value="<?php echo $last_name ?>" required>
                                </div>
                               
                                <div><?php echo $m ?></div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Matric Number</label>
                                    <div style="color: red;"><?php echo $m ?></div>
                                    <input type="" name="mat_no" class="form-control" id="exampleInputPassword1" placeholder="CFJ/***/***/**/***" value="<?php echo $mat_no ?>" required>
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
                                <h5>Department/Year</h5>
                                <div class="form-group">
                                    <select class="custom-select form-control-border" id="exampleSelectBorder" name="department">
                                        <option>Select Department</option>
                                        <option>SLT</option>
                                        <option>STATISTICS</option>
                                        <option>COMPUTER SCIENCE</option>
                                        <option>FOT</option>
                                        <option>AGT</option>
                                        <option>GENERAL</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2" name="level">
                                        <option>Select level</option>
                                        <option>ND 1</option>
                                        <option>ND 2</option>
                                        <option>HND 1</option>
                                        <option>HND 2</option>
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

<!-- /.content-wrapper -->
<?php

require 'footer.php';


?>