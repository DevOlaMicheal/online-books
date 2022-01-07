<?php

require 'header.php';




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
                <h1 class="fg-white text-center">Notification</h1>
            </div>
        </div>
    </div>
</div> <!-- .page-banner -->
</header>

<main>
    <div class="page-section">
        <div class="container">
            <div class="row justify-content-center">
                <div id="loadnoti" class="col-lg-10">
                    <?php
                    $uuuid = $_SESSION["STUDENT_USER_ID"];
                    $ufullname = mysqli_query($con, "select * from student_users where id='$uuuid'");
                    $fetchit = mysqli_fetch_assoc($ufullname);
                    $matnum = $fetchit['mat_no'];
                    $noti = mysqli_query($con, "select * from notification where mat_no='$matnum' order by id desc");
                    ?>
                    <div class="row">
                        <?php while ($getnoti = mysqli_fetch_assoc($noti)) { ?>
                            <div class="col-4">
                                <div class='alert alert-primary alert-dismissible'>
                                    <button type='button' class='close' onclick="noticlose(<?php echo $getnoti['id'] ?>)">&times;</button>
                                    <h5><i class='icon fa fa-bell'></i> <?php echo $getnoti['book_title'] ?></h5>
                                    <?php echo $getnoti['message'] ?>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    
                </div> <!-- .container -->
            </div> <!-- .page-section -->
</main>
<script>
    function noticlose(id) {
        $.ajax({
            url: 'deletenoti.php',
            type: 'post',
            data: 'id=' + id,
            success: function(result) {
                if (result = "complete") {
                    $("#loadnoti").load("loadnoti.php");
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted Successful',
                        showConfirmButton: true,

                    })
                }
            }
        })
    }
</script>

<?php

require 'footer.php';

?>