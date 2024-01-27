<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Travel</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              
        </div>
        <div class="right-navbar">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Travel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Information</a>
                </li>
				<?php if(isset($_SESSION['id'])):?>

                <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="uploaded_media/<?php echo $_SESSION['id']?>.jpeg" alt="Avatar Logo" style="width:40px;" class="rounded-circle"> 
                        <?php $_SESSION['name']?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">LogOut</a></li>
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