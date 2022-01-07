
   <?php
  require 'header.php';
  require 'sidebar.php';


  $res = mysqli_query($con, 'select * from requests ');

  


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
       
      
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">REQUESTS</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Matric Number</th>
                    <th>Senders name</th>
                    <th>Book Title</th>
                    <th>More description</th>
                    <th>Department</th>
                    <th>Level</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
              while($row=mysqli_fetch_assoc($res)){     
              
              ?>
               <tr>
                  
                  <!-- <td></td> -->
                  
                  <td><?php echo $row['mat_no'] ?></td>
                  <td><?php echo $row['name'] ?></td>
                  <td><?php echo $row['title'] ?></td>
                  
                  <td><p class="mb-0"><?php echo $row['more'] ?></p></td>
                  <td><?php echo $row['department'] ?></td>
                  <td><?php echo $row['level'] ?></td>

                  <td>
                  

                  <?php
                    if($row['status']==1){
                      echo "<a href='?type=pending&id=".$row['id']."'><span class='badge badge-primary bgee'>Pending</span></a>";
                    }else{
                      echo "<a href='?type=posted&id=".$row['id']."'><span class='badge badge-dark bgee'>POSTED</span></a>"; 
                    }
                  ?>                  
                  
                  <a href="?type=delete&id=<?php echo $row['id'] ?>"><span class="badge badge-danger bgee">Decline</span></a>
                  </td>
               </tr>

               <?php } ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Matric Number</th>
                    <th>Senders name</th>
                    <th>Book Title</th>
                    <th>More description</th>
                    <th>Department</th>
                    <th>Level</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
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
 