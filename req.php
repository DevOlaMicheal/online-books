<?php



if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $title = $_POST['title'];
    $department = $_POST['department'];
    $level = $_POST['level'];
    $more = $_POST['more'];
    $mat_no = $_POST['mat_no'];

    mysqli_query($con, "insert into requests(name,title,level,department,mat_no,more,status) values('$name','$title','$level','$department','$mat_no','$more','1') ");
}


?>


<div class="page-section">
    <div class="container">
        <div class="text-center">
            <h2 class="title-section mb-3">I NEED A BOOK</h2>
            <p>Enter details<a href="mailto:example@mail.com">example@mail.com</a></p>
        </div>
        <div class="row justify-content-center mt-5">
        <?php if (isset($_SESSION["STUDENT_USER_NAME"])) { ?>

            <div class="col-lg-8">
                <form method="post" class="form-contact">
                    <div class="row">
                        <div class="col-sm-6 py-2">
                            <?php 
                                $uuuid=$_SESSION["STUDENT_USER_ID"];
                                $ufullname=mysqli_query($con,"select * from student_users where id='$uuuid'");
                                $fetchit=mysqli_fetch_assoc($ufullname);
                                $uufname=$fetchit['first_name'];
                                $uulname=$fetchit['last_name'];
                                $uufullnsme=$uufname." ".$uulname;
                            ?>
                            <label for="name" class="fg-grey">Senders name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name.." value="<?php echo $uufullnsme; ?>">
                        </div>
                        <div class="col-sm-6 py-2">
                            <label for="name" class="fg-grey">Student mat number</label>
                            <input type="text" class="form-control" id="name" name="mat_no" placeholder="Matric number" value="<?php echo $_SESSION["MAT_NO"]; ?>">
                        </div>
                    </div>
                    <div class=" col-12 py-2">
                        <div class="form-group">
                        <label for="name" class="fg-grey">Book Title/name</label>
                            <input type="text" class="form-control" id="name" name="title" placeholder="book title.">
                        </div>
                        </div>
                        <div class=" col-12 py-2">
                        <div class="form-group">
                            <select class="custom-select form-control-border" name="department" id="exampleSelectBorder">
                                <option>department</option>
                                <option>SLT</option>
                                <option>STATISTICS</option>
                                <option>COMPUTER SCIENCE</option>
                                <option>FOT</option>
                                <option>AGT</option>
                                <option>GENERAL</option>
                            </select>
                        </div>
                        </div>
                        <div class=" col-12 py-2">
                        <div class="form-group">
                            <select class="custom-select form-control-border border-width-2" name="level" id="exampleSelectBorderWidth2">
                                <option>level</option>
                                <option>Unspecified</option>
                                <option>ND 1</option>
                                <option>ND 2</option>
                                <option>HND 1</option>
                                <option>HND 2</option>
                            </select>
                        </div>
                        </div>
                <div class=" col-12 py-2">
                                <label for="message" class="fg-grey">More Details</label>
                                <textarea id="message" rows="8" name="more" class="form-control" placeholder="Enter message.."></textarea>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" name="submit" class="btn btn-primary px-5">Submit</button>
                        </div>
                    </div>
                </form>
                
            </div>
            <?php }else{ ?>
            <h2>click <a href="login.php"> Login </a> to request content</h2>
       <?php } ?>
        </div>
       
    </div> <!-- .container -->
</div> <!-- .page-section -->