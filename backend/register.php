<?php include("db.php"); session_start();?>
<?php include("validation.php"); ?>

<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = sanitizeString($_POST['f-name'])." ".sanitizeString($_POST['s-name']);
        $name = ucwords($name);
        $email = santEmail($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $age = $_POST['age'];

        $db = new Database();
        $sql = "SELECT `email` FROM `users` WHERE `email` = '$email'";

        if (!$db->select($sql)) {
            $sql = "INSERT INTO `users` (`name`, `email`, `password`, `age`) VALUES ('$name','$email','$password','$age')";

            if ($db->insert($sql)) {
                $sql = "SELECT `id` FROM `users` WHERE `email` = '$email'";
                $result = ($db->select($sql))[0];

                if (!empty($result)) {
                    $birthDateTime = new DateTime($age);
                    $currentDate = new DateTime();
                    $ageInterval = $currentDate->diff($birthDateTime);

                    session_start();
                    $_SESSION['user_id'] = $result['id'];
                    $_SESSION['user_name'] = $name;
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_age'] = $ageInterval->y;

                    header("Location: ../profile.php");
                    exit();
                } else {
                    $_SESSION['register_error'] = "Something went error, Please try again later";
                }
            } else {
                $_SESSION['register_error'] = "Something went error, Please try again later";
            }
        } else {
            $_SESSION['register_error'] = "This email is already used, you can Login";
        }

        unset($db);
    }

    header("Location: ../login-register?case=register");

?>