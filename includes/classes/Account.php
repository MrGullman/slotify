<?php

    class Account {

        private $conn;
        private $errorArray;

        public function __construct($conn){
            $this->conn = $conn;
            $this->errorArray = array();
        }

        public function login($username, $password){
            $password = md5($password);

            $query = mysqli_query($this->conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

            if(mysqli_num_rows($query) == 1) {
                return true;
            }else{
                array_push($this->errorArray, Constants::$loginFailed);
                return false;
            }
        }

        public function register($username, $firstName, $lastName, $email, $emailConfirm, $password, $passwordConfirm){
            $this->validaterUsername($username);
            $this->validateFirstname($firstName);
            $this->validateLastname($lastName);
            $this->validateEmails($email, $emailConfirm);
            $this->validatePasswords($password, $passwordConfirm);


            // Kollar om där är något i errorArray
            if(empty($this->errorArray)){
                // Insert into database

                return $this->insertUserDetails($username, $firstName, $lastName, $email, $password);
            }else{
                return false;
            }
        }

        public function getError($error){
            if(!in_array($error, $this->errorArray)) {
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }

        private function insertUserDetails($username, $firstname, $lastname, $email, $password){
            $encryptedPassword = md5($password);
            $profilePic = "assets/images/profile-pics/head_emerald.png";
            $date = date("Y-m-d");

            $result = mysqli_query($this->conn, "INSERT INTO users VALUES ('', '$username', '$firstname', '$lastname', '$email', '$encryptedPassword', '$date', '$profilePic')");

            return $result;

        }

        private function validaterUsername($username){

            if(strlen($username) > 25 || strlen($username) < 5){
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }

            // todo: Check if username exist

            $checkUsernameQuery = mysqli_query($this->conn, "SELECT username FROM users WHERE username = '$username'");

            if(mysqli_num_rows($checkUsernameQuery) != 0) {
                array_push($this->errorArray, Constants::$usernameTaken);
                return;
            }
        }

        private function validateFirstname($firstname){
            if(strlen($firstname) > 25 || strlen($firstname) < 2){
                array_push($this->errorArray, Constants::$firstNameCharacters);
                return;
            }
        }

        private function validateLastname($lastname){
            if(strlen($lastname) > 25 || strlen($lastname) < 2){
                array_push($this->errorArray, Constants::$lastNameCharacters);
                return;
            }
        }

        private function validateEmails($email1, $email2){
            if($email1 != $email2){
                array_push($this->errorArray, Constants::$emailDontMatch);
                return;
            }

            if(!filter_var($email1, FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }

            // todo: check that username hasen´t alreadt been used

            $checkEmailQuery = mysqli_query($this->conn, "SELECT email FROM users WHERE email = '$email1'");
            if(mysqli_num_rows($checkEmailQuery) != 0) {
                array_push($this->errorArray, Constants::$emailTaken);
                return;
            }

        }

        private function validatePasswords($pass1, $pass2){
            if($pass1 != $pass2){
                array_push($this->errorArray, Constants::$passwordDontMatch);
                return;
            }

            if(preg_match('/[^A-Za-z0-9]/', $pass1)){
                array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
                return;
            }

            if(strlen($pass1) > 30 || strlen($pass1) < 5){
                array_push($this->errorArray, Constants::$passwordCharacters);
            }


        }

    }

?>
