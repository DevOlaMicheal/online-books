<div class="page-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 py-3">
        <div class="subhead">Recents</div>
        <h3 class="title-section">Department: SLT</h3>
      </div>
      <div class="col-md-6 py-3 text-md-right">
        <a href="slt.php" class="btn btn-outline-primary">Show all <span class="mai-arrow-forward ml-2"></span></a>
      </div>
    </div>
    <?php 
          if($no_slt == 0){
            echo $msgg;
          }else{

          
        ?>
    <div class="owl-carousel team-carousel mt-5">
      <?php
      while ($row = mysqli_fetch_assoc($res)) {

      ?>
        <div class="team-wrap">
          <div class="team-profile" style="height: 300px;">
            <img src="<?php echo FILE_SITE_PATH . $row['image'] ?>" alt="">
          </div>
          <div class="team-content">
            <h5><?php echo $row['title'] ?></h5>
            <div class="text-sm fg-grey">level: <?php echo $row['level'] ?></div>

            <div class="action-button">
              <a href="books/<?php echo $row['file'] ?>" download><span class="badge badge-pill badge-dark">download</span></span></a>
              <a href="details.php?id=<?php echo $row['id'] ?>"><span class="badge badge-pill badge-primary">view</span></a>

            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <?php } ?>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  <div class="page-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 py-3">
          <div class="subhead">Recents</div>
          <h3 class="title-section">Department: Computer Science</h3>
        </div>
        <div class="col-md-6 py-3 text-md-right">
          <a href="cs.php" class="btn btn-outline-primary">Show all <span class="mai-arrow-forward ml-2"></span></a>
        </div>
      </div>
      <?php 
          if($no_cs == 0){
            echo $msgg;
          }else{

          
        ?>
      <div class="owl-carousel team-carousel mt-5">
        <?php
        while ($row2 = mysqli_fetch_assoc($res2)) {

        ?>
          <div class="team-wrap">
            <div class="team-profile" style="height: 300px;">
              <img src="<?php echo FILE_SITE_PATH . $row2['image'] ?>" alt="">
            </div>
            <div class="team-content">
              <h5><?php echo $row2['title'] ?></h5>
              <div class="text-sm fg-grey">level: <?php echo $row2['level'] ?></div>

              <div class="action-button">
                <a href="books/<?php echo $row2['file'] ?>" download><span class="badge badge-pill badge-dark">download</span></span></a>
                <a href="details.php?id=<?php echo $row2['id'] ?>"><span class="badge badge-dark">view</span></a>

              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <?php } ?>
      </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 py-3">
          <div class="subhead">Recents</div>
          <h3 class="title-section">Department: Statistics</h3>
        </div>
        <div class="col-md-6 py-3 text-md-right">
          <a href="cs.php" class="btn btn-outline-primary">Show all <span class="mai-arrow-forward ml-2"></span></a>
        </div>
      </div>
      <?php 
          if($no_stats == 0){
            echo $msgg;
          }else{

          
        ?>
      <div class="owl-carousel team-carousel mt-5">
        <?php
        while ($row3 = mysqli_fetch_assoc($res3)) {

        ?>
          <div class="team-wrap">
            <div class="team-profile" style="height: 300px;">
              <img src="<?php echo FILE_SITE_PATH . $row3['image'] ?>" alt="">
            </div>
            <div class="team-content">
              <h5><?php echo $row3['title'] ?></h5>
              <div class="text-sm fg-grey">level: <?php echo $row3['level'] ?></div>

              <div class="action-button">
                <a href="books/<?php echo $row3['file'] ?>" download><span class="badge badge-pill badge-dark">download</span></span></a>
                <a href="details.php?id=<?php echo $row3['id'] ?>"><span class="badge badge-dark">view</span></a>

              </div>
            </div>
          </div>
        <?php } ?>
        </div>
        <?php } ?>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
    <div class="page-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 py-3">
          <div class="subhead">Recents</div>
          <h3 class="title-section">Department: Agrictural tech</h3>
        </div>
        
        <div class="col-md-6 py-3 text-md-right">
          <a href="cs.php" class="btn btn-outline-primary">Show all <span class="mai-arrow-forward ml-2"></span></a>
        </div>
      </div>
      <?php 
          if($no_agt == 0){
            echo $msgg;
          }else{

          
        ?>
      <div class="owl-carousel team-carousel mt-5">
        <?php
        while ($row4 = mysqli_fetch_assoc($res4)) {

        ?>
          <div class="team-wrap">
            <div class="team-profile" style="height: 300px;">
              <img src="<?php echo FILE_SITE_PATH . $row4['image'] ?>" alt="">
            </div>
            <div class="team-content">
              <h5><?php echo $row4['title'] ?></h5>
              <div class="text-sm fg-grey">level: <?php echo $row4['level'] ?></div>

              <div class="action-button">
                <a href="books/<?php echo $row4['file'] ?>" download><span class="badge badge-pill badge-dark">download</span></span></a>
                <a href="details.php?id=<?php echo $row4['id'] ?>"><span class="badge badge-dark">view</span></a>

              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <?php  } ?>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
    <div class="page-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 py-3">
          <div class="subhead">Recents</div>
          <h3 class="title-section">Department: Forestry Tech</h3>
        </div>
        <div class="col-md-6 py-3 text-md-right">
          <a href="cs.php" class="btn btn-outline-primary">Show all <span class="mai-arrow-forward ml-2"></span></a>
        </div>
      </div>
      <?php 
          if($no_fot == 0){
            echo $msgg;
          }else{

          
        ?>
      <div class="owl-carousel team-carousel mt-5">
        <?php
        while ($row5 = mysqli_fetch_assoc($res5)) {

        ?>
          <div class="team-wrap">
            <div class="team-profile" style="height: 300px;">
              <img src="<?php echo FILE_SITE_PATH . $row5['image'] ?>" alt="">
            </div>
            <div class="team-content">
              <h5><?php echo $row5['title'] ?></h5>
              <div class="text-sm fg-grey">level: <?php echo $row5['level'] ?></div>

              <div class="action-button">
                <a href="books/<?php echo $row5['file'] ?>" download><span class="badge badge-pill badge-dark">download</span></span></a>
                <a href="details.php?id=<?php echo $row5['id'] ?>"><span class="badge badge-dark">view</span></a>

              </div>
            </div>
          </div>
        <?php } ?>
        </div>
        <?php } ?>
      </div> <!-- .container -->
    </div> <!-- .page-section -->