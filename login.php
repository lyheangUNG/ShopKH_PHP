<?php
    include "header.php";
?>

    <div class="register-area ptb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-12 col-lg-6 col-xl-6 ml-auto mr-auto">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-form">
                                <form action="login.php" method="post">
                                    <?php echo display_error(); ?>
                                    <label for="Username">Username : </label>
                                    <input type="text" name="name" placeholder="Username">
                                    <label for="Password">Password : </label>
                                    <input type="password" name="password" placeholder="Password">
                                    <div class="button-box">
                                        <div class="login-toggle-btn">
                                            <input type="checkbox">
                                            <label>Remember me</label>
                                            <a href="#">Forgot Password?</a>
                                        </div>
                                        <button type="submit" class="default-btn floatright" name="login_btn">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include "footer.php";
?>

