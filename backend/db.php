<?php
    class Database{
        private $db_serverName = 'localhost';
        private $db_userName = 'root';
        private $db_password = '';
        private $db_name = 'travel';

        private $conn;

        public function __construct(){
            $this->conn = mysqli_connect($this->db_serverName, $this->db_userName, $this->db_password, $this->db_name);
            
            
        }
        public function insert($sql){
            return (mysqli_query($this->conn,$sql))? true : false;

        }
        
        public function select($sql){
            $result= mysqli_query($this->conn, $sql);

            if($result){
                $array = [];
                while($row = mysqli_fetch_array($result)){
                    array_push($array, $row);
                }
                return $array;
            }
            else{
                return false;
            }
        }
        
        public function update($sql){
            return (mysqli_query($this->conn,$sql))? true : false;
        }

        public function delet($sql){
            return (mysqli_query($this->conn,$sql))? true : false;
        }


        public function __destruct()
        {
            mysqli_close($this->conn);
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
