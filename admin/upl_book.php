<?php
require 'header.php';
require 'sidebar.php';



$title = '';
$description = '';
$level = '';
$department = '';
$id = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];

    $row = mysqli_fetch_assoc(mysqli_query($con, "select * from upload where id='$id' "));

    $title = $row['title'];
    $description = $row['description'];
    $level = $row['level'];
    $department = $row['department'];
}
if (isset($_POST['submit'])) {


    $title = $_POST['title'];
    $description = $_POST['description'];
    $level = $_POST['level'];
    $department = $_POST['department'];


    if ($id == '') {

        $file = "e-library(forestry.com)" . '_' . $_FILES['file']['name'];
        $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
        //prx($_POST);

        $new_file = str_replace(" ", "-", $file);


        move_uploaded_file($_FILES['image']['tmp_name'], FILE_SERVER_PATH . $image);
        move_uploaded_file($_FILES['file']['tmp_name'], FILE_SERVER_PATH . $new_file);
        mysqli_query($con, "insert into upload(file,title,status,description,level,department,image) values('$new_file','$title',1,'$description','$level','$department','$image') ");
        $ers = mysqli_query($con, "select * from requests where title='$title' ");
        $crs = mysqli_num_rows($ers);
        if ($crs > 0) {
            
            while ($sl = mysqli_fetch_assoc($ers)) {
                $fname = $sl['name'];
                $fmatno = $sl['mat_no'];
                $message = "Dear $fname the book with the title $title you requested has been uploaded";
                mysqli_query($con, "insert into notification(book_title,message,name,mat_no) values('$title','$message','$fname','$fmatno') ");
            }
        }
        redirect('bb..bb.php');
    } else {
        $file = "e-library(forestry.com)" . '_' . $_FILES['file']['name'];
        $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
        //prx($_POST);

        $new_file = str_replace(" ", "-", $file);
        move_uploaded_file($_FILES['image']['tmp_name'], FILE_SERVER_PATH . $image);
        move_uploaded_file($_FILES['file']['tmp_name'], FILE_SERVER_PATH . $new_file);
        mysqli_query($con, "update  upload set title='$title',description='$description',level='$level',department='$department',image='$image' where id='$id'");
        redirect('bb..bb.php');
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
                    <h1 class="m-0">Add BOOK</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Upload Book</li>
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
                <div class="col-md-12">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Upload New Book <small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" id="quickForm" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputPassword1" placeholder="Enter title" value="<?php echo $title ?>" required>
                                </div>


                                <div class="form-group">
                                    <label>Book Details</label>
                                    <textarea class="form-control" name="description" rows="6" placeholder="Enter ..." value="<?php echo $description ?>"></textarea>
                                </div>


                                <h5>Department/Year</h5>
                                <div class="form-group">
                                    <select class="custom-select form-control-border" id="exampleSelectBorder" name="department" value="">
                                        <option><?php echo $department ?></option>
                                        <option>SLT</option>
                                        <option>STATISTICS</option>
                                        <option>COMPUTER SCIENCE</option>
                                        <option>FOT</option>
                                        <option>AGT</option>
                                        <option>GENERAL</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2" name="level" value="<?php echo $level ?>"">
                                <option><?php echo $level ?></option>
                                <option>ND 1</option>
                                <option>ND 2</option>
                                <option>HND 1</option>
                                <option>HND 2</option>
                            </select>
                        </div>


                        <div class=" form-group">
                                        <label>File</label>
                                        <input type="file" name="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Cover image</label>
                                    <input type="file" name="image" class="form-control"" required>
                        </div>
                        <div class=" form-group mb-0">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-danger">Submit</button>
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