<?php include("db.php"); session_start();?>
<?php include("validation.php");?>
<?php 

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = santEmail($_POST['email']);
        $password = $_POST['password'];
        
        if(validEmail($email)){
            $db = new Database();
            $sql = "SELECT `id`, `name`, `email`, `password`, `age` FROM `users` WHERE `email` = '$email'";

            if ($row = $db->select($sql)) {

                if ($row[0]['email'] === $email && password_verify($password, $row[0]['password'])) {
                    $birthDateTime = new DateTime($row[0]['age']);
                    $currentDate = new DateTime();
                    $ageInterval = $currentDate->diff($birthDateTime);
                    
                    session_start();
                    $_SESSION['user_id'] = $row[0]['id'];
                    $_SESSION['user_name'] = $row[0]['name'];
                    $_SESSION['user_email'] = $row[0]['email'];
                    $_SESSION['user_age'] = $ageInterval->y;
                    
                    header("Location: ../profile.php");
                    exit();
                } else {
                    $_SESSION['login_error'] = "Incorrect email or password";
                }
            } else {
                $_SESSION['login_error'] = "Email not found, make sure about email";
            }

            unset($db);
        }
        else{
            $_SESSION['login_error'] = "Invalid Email";
        }
    }
    sleep(2);
    header("Location: ../login-register.php?case=login");
?>