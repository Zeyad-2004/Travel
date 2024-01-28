<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Travel</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              
        </div>
        <div class="right-navbar">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="travel.php">Travel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="information.php">Information</a>
                </li>

<?php session_start(); if(isset($_SESSION['user_id'])):?>

                <li class="nav-item dropdown" style="display: flex;">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                        <!-- Check if User have profile Picture ot not -->
                        <?php if(file_exists("media/uploaded_media/profile_photos/".$_SESSION['user_id'].".jpg")): ?>
                            <!-- If true, print his photo -->
                            <img src="media/uploaded_media/profile_photos/<?php echo $_SESSION['user_id']?>.jpg" alt="" style="width:50px; height: 50px; object-fit: cover;" class="rounded-circle"> 
                        
                        <?php else: ?>
                            <!-- If false, print default photo -->
                            <img src="media/default/profile.jpg" alt="" style="width:40px;" class="rounded-circle"> 
                        
                        <?php endif; ?>
                        
                        <span style="font-size: 17px;font-weight: bold"><?php echo $_SESSION['user_name']?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="backend/logout.php">LogOut</a></li>
                    </ul>
                </li>

<?php else:?>

				<form class="container-fluid justify-content-start">
					<a href="login-register.php?case=login" style="text-decoration: none;">
						<button class="btn  btn-outline-secondary" type="button" >Login</button>
    				</a>
					<a href="login-register.php?case=register">
						<button class="btn btn-success me-2" type="button">Register</button>
					</a>
                </form>
<?php endif;?>
            </ul>
        </div>
    
    </nav>


