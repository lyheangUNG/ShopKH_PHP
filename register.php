<?php
    include "header.php";
?>
    <!-- register-area start -->
    <div class="register-area ptb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-12 col-lg-12 col-xl-6 ml-auto mr-auto">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-form">
                                <form action="register.php" method="post">
                                    <?php echo display_error(); ?>
                                    <label for="Username">Username : </label>
                                    <input type="text" name="name" placeholder="username" value="<?php echo $name; ?>">
                                    <label for="Full Name">Full Name : </label>
                                    <input type="text" name="fname" placeholder="full name" value="<?php echo $fname; ?>">
                                    <label for="Email">Email :</label>
                                    <input name="email" placeholder="Email" type="email" value="<?php echo $email; ?>">
                                    <label for="Password">Password :</label>
                                    <input type="password" name="password" placeholder="password">
                                    <label for="Confirm Password">Confirm Password : </label>
                                    <input type="password" name="cpassword" placeholder="confirm password">
                                    <div class="button-box">
                                        <button type="submit" class="default-btn floatright" name="register_btn">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- register-area end -->

<?php
    include "footer.php";
?>