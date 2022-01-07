<?php
require 'header.php';
require 'sidebar.php';

if (isset($_GET['type']) && $_GET['type'] != '') {
  $type = $_GET['type'];

  if ($type == 'delete') {
    $id = $_GET['id'];

    mysqli_query($con, "delete from requests where id='$id' ");
    redirect('index.php');
  }

  if ($type == 'pending') {
    $id = $_GET['id'];

    mysqli_query($con, "update requests set status=0 where id='$id' ");
    redirect('index.php');
  }
}


$res = mysqli_query($con, 'select * from requests where status=1 order by id desc');
$sel = mysqli_query($con, 'select * from student_users order by id desc limit 4');



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
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">REGISTERED STUDENTS</span>
              <span class="info-box-number">
                <?php echo $no_va ?>

              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-school"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Admins</span>
              <span class="info-box-number"><?php echo $no_admins ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Uploaded Books</span>
              <span class="info-box-number"><?php echo $count ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">pending requestss</span>
              <span class="info-box-number"><?php echo $no_requests ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-6">
          <!-- DIRECT CHAT -->
          <div class="card direct-chat direct-chat-warning">
            <div class="card-header">
              <h3 class="card-title">Latest Book Requests</h3>


            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                <?php
                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left"><?php echo $row['name'] ?></span>
                      <span class="direct-chat-timestamp float-right"><?php echo $row['mat_no'] ?></span>
                    </div>
                    <!-- /.direct-chat-infos -->

                    <div class="direct-chat-text">
                      Book Name: <?php echo $row['title'] ?>
                    </div>
                    Status: <?php
                            if ($row['status'] == 1) {
                              echo "<span class='badge badge-primary bgee'><a href='?type=pending&id=" . $row['id'] . "' style='color:white'>pending</a></span>";
                            }

                            ?>
                    <span class="badge badge-danger bgee"><a href="?type=delete&id=<?php echo $row['id'] ?>" style='color:white'><i class='fa fa-times'></i></a></span>
                    <!-- /.direct-chat-text -->
                  </div>
                <?php } ?>
                <!-- /.direct-chat-msg -->

                <!-- Message to the right -->

                <!-- /.direct-chat-msg -->

              </div>
              <!--/.direct-chat-messages-->

              <!-- Contacts are loaded here -->
              <div class="direct-chat-contacts">
                <ul class="contacts-list">
                  <li>
                    <a href="#">
                      <img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Avatar">

                      <div class="contacts-list-info">
                        <span class="contacts-list-name">
                          Count Dracula
                          <small class="contacts-list-date float-right">2/28/2015</small>
                        </span>
                        <span class="contacts-list-msg">How have you been? I was...</span>
                      </div>
                      <!-- /.contacts-list-info -->
                    </a>
                  </li>
                  <!-- End Contact Item -->

                </ul>
                <!-- /.contacts-list -->
              </div>
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
          </div>
          <!--/.direct-chat -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
          <!-- USERS LIST -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Latest Members</h3>


            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <ul class="users-list clearfix">
                <?php while ($roww = mysqli_fetch_assoc($sel)) { ?>
                  <li>
                    <img src="<?php echo IMAGE_SITE_PATH . $roww['image'] ?>" alt="No image for this user">
                    <p class=""><?php echo $roww['first_name'] . ' ' . $roww['last_name'] ?></a>
                      <span class="users-list-date">Today</span>
                  </li>
                <?php } ?>
              </ul>
              <!-- /.users-list -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <a href="javascript:">View All Users</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!--/.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->



    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<?php

require 'footer.php';


?>