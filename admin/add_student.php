<?php



?>

<div class="content">
    <div class="container-fluid">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Admin Privilege <small>Add stduent Users</small></h3>
            </div>

            <form method="post" enctype="multipart/form-data">


                <div class="card-body">
                    <div class="form-group">
                        <labe>First Name</label>
                            <input type="" name="first_name" class="form-control" value="<?php echo $first_name ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="" name="last_name" class="form-control" value="<?php echo $last_name ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Matric Number</label>
                        <div style="color: red;"><?php echo $m ?></div>
                        <input type="" name="mat_no" class="form-control" id="exampleInputPassword1" placeholder="CFJ/***/***/**/***" value="<?php echo $mat_no ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="password" value="<?php echo $password ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="form-group mb-0">
                    </div>
                    <h5>Department/Year</h5>
                    <div class="form-group">
                        <select class="custom-select form-control-border" id="exampleSelectBorder" name="department">
                            <option>Select Department</option>
                            <option>SLT</option>
                            <option>STATISTICS</option>
                            <option>COMPUTER SCIENCE</option>
                            <option>FOT</option>
                            <option>AGT</option>
                            <option>GENERAL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2" name="level">
                            <option>Select level</option>
                            <option>ND 1</option>
                            <option>ND 2</option>
                            <option>HND 1</option>
                            <option>HND 2</option>
                        </select>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button id="submit" name="submit" type="submit" class="btn btn-danger">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->