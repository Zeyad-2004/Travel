<?php include("components/header.php");
session_start(); ?>

<!-- Login Part at login-register page -->


<?php if (!isset($_SESSION['user_id']) && $_GET['case'] == "login") : ?>

    <div class="login-register col-md-6">
        <h1>Login</h1>
        <br>
        <form id="login-form" action="backend/login.php" method="POST">
            <div class="form-group">
                <label for="login-email"> Email </label>
                <input type="email" class="form-control" id="login-email" name="email" placeholder="Enter your Email" required>

            </div>

            <div class="form-group">
                <label for="login-password"> Password </label>

                <div class="input-group">
                    <span id="password-eye" class="input-group-text invisible-password" style="cursor: pointer;" onclick="changePasswordVisibility(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                            <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
                            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
                        </svg>
                    </span>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Enter your Password" required>
                </div>

            </div>

            <?php if (isset($_SESSION['login_error'])) : ?>
                <br>
                <div id="login-error" class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['login_error']; ?>
                </div>
            <?php
                unset($_SESSION['login_error']);

            endif;
            ?>


            <button type="submit" id="login-submit" name="submit"> Submit </button>
        </form>
        <p>Not registered?
            <a href="login-register.php?case=register" style="text-decoration: none;">
                Create an account
            </a>
        </p>

    </div>

    <!-- Register Part at login-register page -->

<?php elseif (!isset($_SESSION['user_id']) && $_GET['case'] == "register") : ?>

    <div class="login-register col-md-6">
        <h1>Register</h1>
        <br>
        <form id="register-form" action="backend/register.php" method="POST">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="register-firstName"> First Name </label>
                    <input type="text" class="form-control" id="register-firstName" name="f-name" placeholder="Enter your First Name" required>

                    <!-- First Name Feedback -->
                    <div id="register-firstName-wrong" class="invalid-feedback">TEST Fname</div>
                </div>
                <div class="form-group col-md-6">

                    <label for="register-secondName"> Second Name </label>
                    <input type="text" class="form-control" id="register-secondName" name="s-name" placeholder="Enter your Second Name" required>

                    <!-- Second Name Feedback -->
                    <div id="register-secondName-wrong" class="invalid-feedback">TEST Sname</div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <label for="register-email"> Email </label>
                    <input type="email" class="form-control" id="register-email" name="email" placeholder="Enter your Email" required>

                    <!-- Email Feedback -->
                    <div id="register-email-wrong" class="invalid-feedback hidden">TEST Email</div>
                </div>
                <div class="col-md-4">
                    <label for="register-age"> Birth Day</label>
                    <input type="date" class="form-control" id="register-age" name="age" required>

                    <!-- Age Feedback -->
                    <div id="register-age-wrong" class="invalid-feedback">TEST Age</div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="register-password"> Password </label>

                    <div class="input-group">
                        <span id="password-eye" class="input-group-text invisible-password" style="cursor: pointer;" onclick="changePasswordVisibility(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                                <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
                                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
                            </svg>
                        </span>
                        <input type="Password" class="form-control" id="register-password" name="password" placeholder="Enter your Password" required>
    
                        <!-- Password Feedback -->
                        <div id="register-password-wrong" class="invalid-feedback">TEST Password</div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="register-confirmPassword"> Confirm Password </label>

                    <div class="input-group">
                        <span id="confirmPassword-eye" class="input-group-text invisible-password" style="cursor: pointer;" onclick="changePasswordVisibility(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                                <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
                                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
                            </svg>
                        </span>

                        <input type="password" class="form-control" id="register-confirmPassword" name="password-confirm" placeholder="Enter your Password Confirmation" required>
    
                        <!-- Confirm Password Feedback -->
                        <div id="register-confirmPassword-wrong" class="invalid-feedback">TEST Confirm password</div>
                    </div>
                </div>
            </div>

            <?php if (isset($_SESSION['register_error'])) : ?>
                <br>
                <div id="register-error" class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['register_error']; ?>
                </div>
            <?php
                unset($_SESSION['register_error']);

            endif;
            ?>

            <button type="submit" id="register-submit" class="submit-disabled"> Submit </button>
        </form>
        <p>Have email already?
            <a href="login-register.php?case=login" style="text-decoration: none;">
                login now
            </a>
        </p>
    </div>

<?php else : header("Location: index.php") ?>

<?php endif; ?>

<script src="js/login-register-validation.js"></script>