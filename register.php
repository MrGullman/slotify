<?php

function sanitizeFormPassword($inputText) {
    $inputText = strip_tags($inputText);
    return $inputText;
}

function sanitizeFormUsername($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ","", $inputText);
    return $inputText;
}

function sanitizeFormString($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ","", $inputText);
    $inputText = ucfirst(strtolower($inputText));
    return $inputText;
}

if(isset($_POST['loginButton'])) {
    // Login button pressed

    $loginUsername = $_POST['loginUsername'];
    $loginPassword = $_POST['loginPassword'];
}

if(isset($_POST['registerButton'])) {
    // Register button progress-striped

    $username = sanitizeFormUsername($_POST['username']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormString($_POST['email']);
    $emailConfirm = sanitizeFormString($_POST['emailConfirm']);
    $password = sanitizeFormPassword($_POST['password']);
    $passwordConfirm = sanitizeFormPassword($_POST['passwordConfirm']);
}



?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Welcome to </title>
    </head>
    <body>
        <div id="inputContainer">
            <form id="loginForm" action="register.php" method="POST">
                <h2>Login to your account</h2>
                <p>
                    <label for="loginUsername">Username</label>
                    <input id="loginUsername" type="text" name="loginUsername" placeholder="Username" required>
                </p>
                <p>
                    <label for="loginPassword">Password</label>
                    <input id="loginPassword" type="password" name="loginPassword" placeholder="Password" required>
                </p>

                <button type="submit" name="loginButton">LOG IN</button>
            </form>


            <form id="registerForm" action="register.php" method="POST">
                <h2>Create your free account</h2>
                <p>
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" placeholder="Username" required>
                </p>

                <p>
                    <label for="firstName">Firstname</label>
                    <input id="firstName" type="text" name="firstName" placeholder="Firstname" required>
                </p>

                <p>
                    <label for="lastName">Lastname</label>
                    <input id="lastName" type="text" name="lastName" placeholder="Lastname" required>
                </p>

                <p>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" placeholder="Email" required>
                </p>

                <p>
                    <label for="emailConfirm">Confirm Email</label>
                    <input id="emailConfirm" type="email" name="emailConfirm" placeholder="Confirm Email" required>
                </p>

                <p>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Password" required>
                </p>

                <p>
                    <label for="passwordConfirm">Confirm Password</label>
                    <input id="passwordConfirm" type="password" name="passwordConfirm" placeholder="Confirm Password" required>
                </p>

                <button type="submit" name="registerButton">SIGN UP</button>
            </form>

        </div>

    </body>
</html>
