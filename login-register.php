<?php include("components/header.php"); session_start(); ?>

<?php if(!isset($_SESSION['user_id']) && $_GET['case'] == "login"):?>

  <div class="login-register col-md-6"> 
    <h1>Login</h1> 
    <br>
    <form action="backend/login.php" method="POST"> 
        <div class="form-group">
            <label for="first"> Email </label> 
            <input type="email" class="form-control" id="first" name="email" placeholder="Enter your Username" required> 
        </div>

        <div class="form-group">
            <label for="password"> Password </label> 
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password" required> 
        </div>
        
        <?php if(isset($_SESSION['login_error'])): ?>
          
          <div class="alert alert-danger" role="alert">
              <?php echo $_SESSION['login_error'];?>
          </div>
        <?php 
            unset($_SESSION['login_error']);
            endif;
        ?>
        
        
        <button type="submit" name="submit"> Submit </button> 
    </form> 
    <p>Not registered?  
      <a href="login-register.php?case=register" style="text-decoration: none;"> 
        Create an account 
      </a> 
    </p>
     
  </div>  

<?php elseif(!isset($_SESSION['user_id']) && $_GET['case'] == "register"):?>
  <div class="login-register col-md-6"> 
    <h1>Register</h1> 
		<br>
        <form action="backend/register.php" method="POST"> 
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="first-name"> First Name </label> 
                    <input type="text" class="form-control" id="first" name="f-name" placeholder="Enter your First Name" required> 
                </div>
                <div class="form-group col-md-6">
                
                    <label for="second-name"> Second Name </label> 
                    <input type="text" class="form-control" id="second" name="s-name" placeholder="Enter your Second Name" required> 
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <label for="email"> Email </label> 
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" required> 
                </div>
                <div class="col-md-4">
                    <label for="age"> Birth Day</label> 
                    <input type="date" class="form-control" id="age" name="age" required> 
                </div>
            </div>                
            
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="password"> Password </label> 
                    <input type="Password" class="form-control" id="password" name="password" placeholder="Enter your Password" required> 
                </div>
                <div class="form-group col-md-6">
                
                    <label for="second-name"> Confirm Password </label> 
                    <input type="password" class="form-control" id="confirm" name="password-confirm" placeholder="Enter your Password Confirmation" required> 
                </div>
            </div>

            <?php if(isset($_SESSION['register_error'])): ?>

                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['register_error'];?>
                </div>
            <?php 
                unset($_SESSION['register_error']);
                endif;
            ?>
            
            <button type="submit" value="zoz"> Submit </button> 
        </form> 
        <p>Have email already?  
            <a href="login-register.php?case=login" style="text-decoration: none;"> 
                login now 
            </a> 
        </p> 
  </div>
<?php else: header("Location: index.php")?>

<?php endif;?>