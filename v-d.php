<?php
require 'header.php';


if(isset($_GET['id']) && $_GET['id']>0){
    $id=$_GET['id'];
}else{
    redirect('index.php');
}

$res = mysqli_query($con, "select * from uploaded_videos where id='$id' ");
$row = mysqli_fetch_assoc($res);


?>
<main>
    <div class="page-section pt-4">
      <div class="container">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb bg-transparent mb-4">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="slt.php"><?php  echo $row['department'] ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php  echo $row['title'] ?></li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-lg-8">
            <div class="blog-single-wrap">
              <div class="container">
              <div class="post-thumbnail" style="height: 350px;">
              <?php if ($row['type'] == 'video') { ?>
                <a href="<?php echo FILE_SITE_PATH . $row['file'] ?>" data-fancybox="portfolio">
                  <video controls>
                    <source src="<?php echo FILE_SITE_PATH . $row['file'] ?>">
                    Your browser does not support the video.
                  </video>
                </a>
                
              <?php } else { ?>
                <img src="<?php echo FILE_SITE_PATH . $row['image'] ?>" width="400" height="200">
                <audio controls>
                  
                  <source src="<?php echo FILE_SITE_PATH . $row['file'] ?>">
                  
                  Your browser does not support the audio tag.
                </audio>
              <?php } ?>
               
              </div>
              </div>
              <h1 class="post-title"><?php  echo $row['title'] ?></h1>
              <div class="post-meta">
                <div class="post-author">
                  <span class="text-grey">By</span> <a href="#">Admin</a>  
                </div>
                <span class="gap">|</span>
                <span class="gap">|</span>
                <div>
                  <a href="#"><?php echo $row['level'] ?></a>
                </div>
                <span class="gap">|</span>
                <div class="post-comment-count">
                  <a href="#"><?php echo $row['department'] ?></a>
                </div>
              </div>
              <div class="post-content">
                <p><?php  echo $row['description'] ?></p>
                <?php if(isset($_SESSION['STUDENT_USER_NAME'])){?>
                <div class="post-tags">
                  
                  <a href="books/<?php echo $row['file'] ?>" download id="download"><button class="btn btn-primary">Download now!</button></a>
                </div>
                <?php }else{ ?>
                  <div class="post-tags">
                  <p>YOU ARE NOT LOGGED IN LOGIN TO DOWNLOAD</p>
                  <a href="login.php"><button class="btn btn-primary">Login</button></a>
                </div>
                <?php } ?>
              </div>
            </div> <!-- .blog-single-wrap -->

           
          
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  </main>
<?php
require 'footer.php';
?>