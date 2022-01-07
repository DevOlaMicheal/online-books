<?php

require 'header.php';
$res = mysqli_query($con, "select * from upload where department='SLT' order by id desc");



?>

<div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url(assets/assets/img/christin-hume-k2Kcwkandwg-unsplash.jpg);">
      <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-lg-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">books</li>
              </ol>
            </nav>
            <h1 class="fg-white text-center">Science Laboratory Technology</h1>
              <br>
              
          </div>
        </div>
      </div>
    </div> <!-- .page-banner -->
  </header>
  
  <main>
    <div class="page-section">
      <div class="container">
      <div class="filterable-btn">
  
          <form action="#">
            <input type="text" id="searchh" name="query" autocomplete="off" class="form-control" placeholder="book name/title">
            <br>
            <div style="background-color: white;  border-radius: 10px; margin-top:-13px !important;">
								<ul id="append" class="list-group" style="margin-bottom:0px;">


								</ul>
            </div>
            
            <button type="submit"  class="btn btn-primary btn-sm mt-2">Search</button>
          </form>
      
        </div>
        <div class="row justify-content-center">
          <?php
          if($no_slt == 0){
                echo $msgg;
              }else{
                ?>
          <div class="col-lg-10">
            <div class="row">
              
            <?php
                while($row=mysqli_fetch_assoc($res)){     
                      
              ?>
              <div class="col-md-6 col-lg-4 py-3">
                <div class="<?php $row['level'] ?>">
                <div class="card-blog">
                  <div class="header">
                    <div class="avatar">
                      <img src="<?php echo FILE_SITE_PATH . $row['image'] ?>" alt="">
                    </div>
                    <div class="entry-footer">
                      <div class="post-author"><?php echo $row['title'] ?></div>
                      <a href="#" class="post-date">23 Apr 2020</a>
                    </div>
                  </div>
                  <div class="body">
                    <div class="post-title"><a href="blog-single.html">level : <?php echo $row['level'] ?></a></div>
                  </div>
                  <div class="footer" style="background-color: black;">
                    <a href="details.php?id=<?php echo $row['id'] ?>">Open <span class="mai-chevron-forward text-sm"><span class="mai-chevron-forward text-sm"></span></a>
                  </div>
                </div>
                </div>
              </div>
                    <?php } ?>
              <div class="col-12 my-5">
                <nav aria-label="Page Navigation">
                  <ul class="pagination justify-content-center">
                    
                    <li class="page-item"><a class="page-link" href="#"><?php echo $no_slt ?></a></li>
                    
                  </ul>
                </nav>
              </div>
              
            </div>
          </div>
          <?php } ?>
          
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  </main>


<?php

require 'footer.php'

?>