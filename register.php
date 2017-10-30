<?php
    include 'includes/config.php';
    include 'includes/classes/Account.php';
    include 'includes/classes/Constants.php';

    $account = new Account($conn);
    //$constants = new Constants();


    include 'includes/handlers/register_handler.php';
    include 'includes/handlers/login_handler.php';

    function getInputValue($name){
        if(isset($_POST[$name])){
            echo $_POST[$name];
        }
    }
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Welcome to </title>
        <link rel="stylesheet" href="assets/css/register.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/register.js">

        </script>
    </head>
    <body>
        <?php

            if(isset($_POST['registerButton'])){
                echo '<script type="text/javascript">
                        $(document).ready(function() {
                            $("#loginForm").hide();
                            $("#registerForm").show();
                        });
                    </script>';
            }else{
                echo '<script type="text/javascript">
                        $(document).ready(function() {
                            $("#loginForm").show();
                            $("#registerForm").hide();
                        });
                    </script>';
            }



        ?>

        <div id="background">

            <div id="loginContainer">

                <div id="inputContainer">
                    <form id="loginForm" action="register.php" method="POST">
                        <h2>Login to your account</h2>
                        <p>
                            <?php echo $account->getError(Constants::$loginFailed); ?>
                            <label for="loginUsername">Username</label>
                            <input id="loginUsername" type="text" name="loginUsername" placeholder="Username" value="<?php getInputValue('loginUsername') ?>" required>
                        </p>
                        <p>
                            <label for="loginPassword">Password</label>
                            <input id="loginPassword" type="password" name="loginPassword" placeholder="Password" required>
                        </p>

                        <button type="submit" name="loginButton">LOG IN</button>

                        <div class="hasAccountText">
                            <span id="hideLogin">Don´t have an account yet? Signup here.</span>
                        </div>

                    </form> <!-- / Login Form End -->


                    <form id="registerForm" action="register.php" method="POST">
                        <h2>Create your free account</h2>
                        <p>
                            <?php echo $account->getError(Constants::$usernameCharacters); ?>
                            <?php echo $account->getError(Constants::$usernameTaken); ?>
                            <label for="username">Username</label>
                            <input id="username" type="text" name="username" value="<?php getInputValue('username') ?>" placeholder="Username" required>
                        </p>

                        <p>
                            <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                            <label for="firstName">Firstname</label>
                            <input id="firstName" type="text" name="firstName" placeholder="Firstname" value="<?php getInputValue('firstName') ?>" required>
                        </p>

                        <p>
                            <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                            <label for="lastName">Lastname</label>
                            <input id="lastName" type="text" name="lastName" placeholder="Lastname" value="<?php getInputValue('lastName') ?>" required>
                        </p>

                        <p>
                            <?php echo $account->getError(Constants::$emailDontMatch); ?>
                            <?php echo $account->getError(Constants::$emailInvalid); ?>
                            <?php echo $account->getError(Constants::$emailTaken); ?>
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" placeholder="Email" value="<?php getInputValue('email') ?>" required>
                        </p>

                        <p>
                            <label for="emailConfirm">Confirm Email</label>
                            <input id="emailConfirm" type="email" name="emailConfirm" placeholder="Confirm Email" value="<?php getInputValue('emailConfirm') ?>" required>
                        </p>

                        <p>
                            <?php echo $account->getError(Constants::$passwordDontMatch); ?>
                            <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                            <?php echo $account->getError(Constants::$passwordCharacters); ?>
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password" placeholder="Password" required>
                        </p>

                        <p>
                            <label for="passwordConfirm">Confirm Password</label>
                            <input id="passwordConfirm" type="password" name="passwordConfirm" placeholder="Confirm Password" required>
                        </p>

                        <button type="submit" name="registerButton">SIGN UP</button>

                        <div class="hasAccountText">
                            <span id="hideRegister">Already have an account? Log in here.</span>
                        </div>

                    </form> <!-- / Register Form End -->

                </div> <!-- / Input Container End -->

                <div id="loginText">
                    <h1>Get great music, right now</h1>
                    <h2>Kisten to loads of songs for free</h2>
                    <ul>
                        <li>Discover music you´ll fall in love with</li>
                        <li>Create your own playlists</li>
                        <li>Follow artists to keep up to date</li>
                    </ul>
                </div>

            </div> <!-- / Login Container End -->
        </div> <!-- / Background End -->
    </body>
</html>
