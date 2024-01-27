<?php
    function login_validation($email, $password)
    {
        $conn = mysqli_connect("localhost", "root", "", "travel");
        $sql = "SELECT FROM `users` (`id`, `name`, `email`, `password`, `age`) WHERE `email` = '$email'";

        $result = mysqli_query($conn, $sql);

        // End connection to database
        mysqli_close($conn);

        if ($result) {
            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && $row['password'] === $password) {
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_age'] = $row['age'];

                return true;
            } else {
                return "Incorrect email or password";
            }
        } else {
            return "Email not found, make sure about email";
        }
    }

    function registration_validation($name, $email, $password, $age)
    {
        $conn = mysqli_connect("localhost", "root", "", "travel");
        $sql = "SELECT FROM `users` (`email`) WHERE `email` = '$email'";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            $sql = "INSERT INTO `users` (`name`, `email`, `password`, `age`) VALUES ('$name','$email','$password','$age')";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                $sql = "SELECT (`id`) FROM users WHERE `email` = $email";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $birthDateTime = new DateTime($age);
                    $currentDate = new DateTime();
                    $ageInterval = $currentDate->diff($birthDateTime);

                    session_start();
                    $_SESSION['user_id'] = ($result->fetch_assoc())['id'];
                    $_SESSION['user_name'] = $name;
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_age'] = $ageInterval->y;

                    // Close database connection before return result
                    mysqli_close($conn);
                    return true;
                } else {
                    // Close database connection before return result
                    mysqli_close($conn);
                    return "Something went error, Please try again later";
                }
            } else {
                // Close database connection before return result
                mysqli_close($conn);
                return "Something went error, Please try again later";
            }
        } else {
            // Close database connection before return result
            mysqli_close($conn);
            return "This email is already used, you can Login";
        }
    }
