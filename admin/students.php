<?php
require 'header.php';
require 'sidebar.php';

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = $_GET['type'];

    if ($type == 'delete') {
        $id = $_GET['id'];

        mysqli_query($con, "delete from student_users where id='$id' ");
        redirect('students.php');
    }

    if ($type == 'deactive') {
        $id = $_GET['id'];

        mysqli_query($con, "update student_users set status=0 where id='$id' ");
        redirect('students.php');
    }

    if ($type == 'active') {
        $id = $_GET['id'];

        mysqli_query($con, "update student_users set status=1 where id='$id' ");
        redirect('students.php');
    }
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
                    <br><br>
                    <button type="button" class="btn btn-primary" href="add_user.php"><i class="fas fa-plus"></i> Add User</button>
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

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Registered Students</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
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
                                            <td><?php echo $row['date'] ?></td>

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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>



        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<?php

require 'footer.php';


?>