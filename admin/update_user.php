<?php
    // $id = $_GET['id'] ? $_GET['id']:"";
    // $name = $_GET['name'] ? $_GET['name']:"";
    // $fname = $_GET['fname'] ? $_GET['fname']:"";
    // $user_type = $_GET['user_type'] ? $_GET['user_type']:"";
    // $password = $_GET['password'] ? $_GET['password']:"";
    require_once('DB.php');
    $db = new DB();
    $connectDB = $db->connectDBProduct();
    $users = $db->listDB("select * from users");
?>
<?php
        ob_start();
        include('header.php');
?>

<div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Update Users</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="index.php" class="btn btn-sm btn-primary">Back to list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-name">Username</label>
                                            <input type="text" name="name" id="input-name" class="form-control" placeholder="Username" value="<?php echo $name;?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-fname">Full Name</label>
                                            <input type="text" name="fname" id="input-fname" class="form-control" placeholder="Full Name" value="<?php echo $fname?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email</label>
                                            <input type="text" name="email" id="input-email" class="form-control" placeholder="Email" value="<?php echo $email?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-user_type">User Type</label>
                                    <select class="form-control" name="user_type" id="user_type">
                                    <?php 
                                        // while($user = $users->fetch_assoc()) {                                                   
                                    ?>
                                        <!-- <option value="<?php echo $user['id']?>"><?php echo $user['user_type']?></option> -->
                                    <?php
                                        // }
                                    ?>
                                        <option value="user" <?php if($user_type == "user"){
                                                echo 'selected';}?>
                                             >User</option>
                                        <option value="admin"<?php if($user_type == "admin"){
                                                echo 'selected';}?>
                                            >Admin</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-password">Password</label>
                                            <input type="password" name="password" id="input-password" class="form-control" placeholder="Password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                            <div class="form-group">
                                            <label class="form-control-label" for="input-cpassword">Confirm Password</label>
                                            <input type="password" name="cpassword" id="input-cpassword" class="form-control" placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4" name="edit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
            include('footer.php');
        ?>

        
    </div>

