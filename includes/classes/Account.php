<?php

    class Account {

        private $conn;
        private $errorArray;

        public function __construct($conn){
            $this->conn = $conn;
            $this->errorArray = array();
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

                return true;
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

        }

        private function validaterUsername($username){

            if(strlen($username) > 25 || strlen($username) < 5){
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }

            // todo: Check if username exist
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
            }

            // todo: check that username hasen´t alreadt been used

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
