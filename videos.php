<?php

require 'header.php';
$res = mysqli_query($con, "select * from uploaded_videos");



?>
<div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url(assets/assets/img/tv.jpg);">
  <div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-lg-8">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">videos</li>
          </ol>
        </nav>
        <h1 class="fg-white text-center">Videos</h1>
      </div>
    </div>
  </div>
</div> <!-- .page-banner -->
</header>

<main>
  <div class="page-section">
    <div class="container">
      <div class="filterable-btn">
        <button class="btn active" data-filter="*">All</button>
        <button class="btn" data-filter=".Audio">Audios only</button>
        <button class="btn" data-filter=".video">videos</button>
      </div>

      <div class="grid mt-3">

        <?php
        while ($row = mysqli_fetch_assoc($res)) {

        ?>
          <div class="grid-item <?php echo $row['type'] ?>">
            <div class="portfolio">
              <?php if ($row['type'] == 'video') { ?>
                <a href="<?php echo FILE_SITE_PATH . $row['file'] ?>" data-fancybox="portfolio">
                  <video width="320" height="240" controls>
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
              <a href="v-d.php?id=<?php echo $row['id'] ?>" class="badge badge-secondary">download</a>
                <a href="#" class="badge badge-primary">view</a>
                <p>Title:<?php echo $row['title'] ?>  | <?php echo $row['type'] ?></p>
                
            </div>

          </div>
        <?php } ?>
      </div>
    </div> <!-- .grid -->
  </div> <!-- .container -->
  </div> <!-- .page-section -->
</main>


<?php

require 'footer.php'

?>