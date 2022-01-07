<?php
session_start();
require 'database.php';
require 'function.php';

?>
<?php 
    $uuuid=$_SESSION["STUDENT_USER_ID"];
    $ufullname=mysqli_query($con,"select * from student_users where id='$uuuid'");
    $fetchit=mysqli_fetch_assoc($ufullname);
    $matnum=$fetchit['mat_no'];
    $noti=mysqli_query($con,"select * from notification where mat_no='$matnum' order by id desc");
?>
            <div class="row">
            <?php while($getnoti=mysqli_fetch_assoc($noti)){?>
          <div class="col-12">
            <div class='alert alert-primary alert-dismissible'>
<button type='button' class='close' onclick="noticlose(<?php echo $getnoti['id']?>)">&times;</button>
<h5><i class='icon fas fa-ban'></i> <?php echo $getnoti['book_title']?></h5>
<?php echo $getnoti['message']?>
</div>
          </div>
          <?php } ?>
        </div>