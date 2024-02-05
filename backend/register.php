<?php include("db.php"); session_start();?>
<?php include("validation.php"); ?>

<?php
    function checkFormData(){
        $first_name = sanitizeString($_POST['f-name']);
        $second_name = sanitizeString($_POST['s-name']);
        $email = santEmail($_POST['email']);
        $age = $_POST['age'];
        $password = $_POST['password'];

        // Reset previous error messages
        $_SESSION['register_error'] = '';

        // Check first name
        if (strlen($first_name) < 3 || !ctype_alpha($first_name)) {
            $_SESSION['register_error'] = "First name must be at least 3 characters long and contain only English letters.";
            return false;
        }

        // Check second name
        if (strlen($second_name) < 3 || !ctype_alpha($second_name)) {
            $_SESSION['register_error'] = "Second name must be at least 3 characters long and contain only English letters.";
            return false;
        }

        // Check email
        if (!preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email)) {
            $_SESSION['register_error'] = "Invalid email address.";
            return false;
        }

        // Check age
        $yesterday = date('Y-m-d', strtotime('yesterday'));
        if (strtotime($age) >= strtotime($yesterday)) {
            $_SESSION['register_error'] = "Age must be earlier than yesterday.";
            return false;
        }

        // Check password
        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
            $_SESSION['register_error'] = "Password must be at least 8 characters at most 64 long and include at least one digit of <br> [uppercase, lowercase, number]";
            return false;
        }

        // If all checks pass, return true
        return true;
    }


    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(!checkFormData()){
            header("Location: ../login-register?case=register");
        }

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