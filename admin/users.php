<?php
require 'header.php';
require 'sidebar.php';


$res = mysqli_query($con, 'select * from requests where status=0');
$sel = mysqli_query($con, 'select * from student_users');

$content='';
$mat_no='';
$password='';
$first_name = '';
$last_name = '';
$id='';
$m='';
$level='';
$department='';

if(isset($_GET['id']) && $_GET['id']!=''){
    $id=$_GET['id'];

    $row=mysqli_fetch_assoc(mysqli_query($con,"select * from student_users"));
    
    $mat_no=$row['mat_no'];
    $password=$row['password'];
    $first_name=$row['first_name'];
    $last_name=$row['last_name'];
    $level=$row['level'];
    $department=$row['department'];
    

    
}

if(isset($_POST['submit'])){
    

    $mat_no=$_POST['mat_no'];
    $password=$_POST['password'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $level=$_POST['level'];
    $department=$_POST['department'];
    
    $ress=mysqli_query($con,"select * from student_users where mat_no='$mat_no' ");
    $check = mysqli_num_rows($ress);
    if ($check>0){
        $m = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Failed to add student: </strong> Student with this matnumber is regsitered already try again.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
        
    }else{
        if($id==''){

            $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
            //prx($_POST);
            move_uploaded_file($_FILES['image']['tmp_name'],IMAGE_SERVER_PATH.$image);
            mysqli_query($con,"insert into student_users(image,mat_no,first_name,last_name,password,level,department, status) values('$image','$mat_no','$first_name','$last_name','$password','$level', '$department', 1)");
            redirect('user.php');
        }else{
            $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
            //prx($_POST);
            move_uploaded_file($_FILES['image']['tmp_name'],IMAGE_SERVER_PATH.$image);
            mysqli_query($con,"update student_users set mat_no='$mat_no',first_name='$first_name',last_name='$last_name',image='$image',i where id='$id' '$level' $department'");
            redirect('user.php');
        }

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
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-sm-6">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Launch demo modal
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div>
            <?php echo $m ?>
            </div>

            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Messages</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Settings</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                    <table id="add-row-table" class="table  table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>First Name</th>
                                                <th>Surname Name</th>
                                                <th>Matriculation number</th>
                                                <th>password</th>
                                                <th>Sign up date</th>
                                                <th>image</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($sel)) {

                                            ?>
                                                <tr>
                                                    <td><?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['first_name'] ?></td>
                                                    <td><?php echo $row['last_name'] ?></td>
                                                    <td><?php echo $row['mat_no'] ?></td>
                                                    <td><?php echo $row['password'] ?></td>
                                                    <td>dd/yy/mm</td>
                                                    <td width="30px"><img src="<?php echo IMAGE_SITE_PATH . $row['image'] ?>" style="width: 70%; height: 30px;"></td>

                                                    <td>
                                                        <span class="badge badge-success bgee"><a href="add_user.php?id=<?php echo $row['id'] ?>" style="color: white;"><i class='fa fa-edit'></i></a></span>

                                                        <?php
                                                        if ($row['status'] == 1) {
                                                            echo "<span class='badge badge-primary bgee'><a href='?type=deactive&id=" . $row['id'] . "' style='color:white'><i class='fa fa-unlock'></i></a></span>";
                                                        } else {
                                                            echo "<span class='badge badge-dark bgee'><a href='?type=active&id=" . $row['id'] . "' style='color:white'><i class='fa fa-lock'></i></a></span>";
                                                        }
                                                        ?>

                                                        <span class="badge badge-danger bgee"><a href="?type=delete&id=<?php echo $row['id'] ?>" style='color:white'><i class='fa fa-times' onclick="show()"></i></a></span>
                                                    </td>
                                                </tr>


                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>First Name</th>
                                                <th>Surname Name</th>
                                                <th>Matriculation number</th>
                                                <th>password</th>
                                                <th>Sign up date</th>
                                                <th>image</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                    <?php
                                    require 'add_student.php';
                                    ?>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                    Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                                    Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
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