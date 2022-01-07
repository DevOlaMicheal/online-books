<?php
require 'header.php';
require 'sidebar.php';

if (isset($_GET['type']) && $_GET['type'] != '') {
  $type = $_GET['type'];

  if ($type == 'delete') {
    $id = $_GET['id'];

    mysqli_query($con, "delete from past_question where id='$id' ");
    redirect('pqanda.php');
  }

  if ($type == 'deactive') {
    $id = $_GET['id'];

    mysqli_query($con, "update past_question set status=0 where id='$id' ");
    redirect('pqanda.php');
  }

  if ($type == 'active') {
    $id = $_GET['id'];

    mysqli_query($con, "update past_question set status=1 where id='$id' ");
    redirect('pqanda.php');
  }
}


$res = mysqli_query($con, "select * from past_question");






?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Books</h1>
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

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Books</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>

                        <th>Title</th>
                        <th>Department</th>
                        <th>Level</th>
                        <th>description</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($row = mysqli_fetch_assoc($res)) {

                      ?>
                        <tr>

                          <!-- <td></td> -->

                          <td><?php echo $row['id'] ?></td>
                          <td><?php echo $row['title'] ?></td>
                          <td><?php echo $row['department'] ?></td>
                          <td><?php echo $row['level'] ?></td>
                          <td>
                            <p class="mb-0"><?php echo $row['description'] ?></p>
                          </td>
                          <td>
                            <span class="badge badge-success bgee"><a href="upl_book.php?id=<?php echo $row['id'] ?>" style="color: white;"><i class='fa fa-edit'></i></a></span>

                            <?php
                            if ($row['status'] == 1) {
                              echo "<span class='badge badge-primary bgee'><a href='?type=deactive&id=" . $row['id'] . "' style='color:white'><i class='fa fa-unlock'></i></a></span>";
                            } else {
                              echo "<span class='badge badge-dark bgee'><a href='?type=active&id=" . $row['id'] . "' style='color:white'><i class='fa fa-lock'></i></a></span>";
                            }
                            ?>

                            <span class="badge badge-danger bgee"><a href="?type=delete&id=<?php echo $row['id'] ?>" style='color:white'><i class='fa fa-times'></i></a></span>
                          </td>
                        </tr>

                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>

                        <th>Title</th>
                        <th>Department</th>
                        <th>Level</th>
                        <th>description</th>
                        <th>Status</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->




    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<?php

require 'footer.php';


?>