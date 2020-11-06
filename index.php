<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: profile.php');
}
include('./common/libraries.php');
include('./config/connection.php');
include('./handlers/registerHandler.php');
include('./handlers/loginHandler.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>

<body>
    <div class="accountForm">

        <?php if ($reg_errors) : ?>
            <div style="border: 1px solid red; padding: 20px;">
                <?php foreach ($reg_errors as $error) : ?>
                    <p style="color: red; font-weight: 600;">*<?php echo $error ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <h4 style="color: #FFF;">Welcome to PHP Blogger</h4>

        <!-- Modal Trigger -->
        <a class="btn modal-trigger account" href="#modal1">Register</a>

        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>Create A New Account</h4>
                <form action="index.php" method="POST">
                    <div class="input-field">
                        <label for="fName">First Name</label>
                        <input type="text" name="fName" id="fName">
                    </div>
                    <div class="input-field">
                        <label for="lName">Last Name</label>
                        <input type="text" name="lName" id="lName">
                    </div>
                    <div class="input-field">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="input-field">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="input-field">
                        <input type="submit" name="submit" id="submit" value="CREATE ACCOUNT">
                    </div>
                </form>
            </div>
        </div>



        <!-- Modal Trigger -->
        <a class="btn modal-trigger account" href="#modal2">Login</a>

        <!-- Modal Structure -->
        <div id="modal2" class="modal">
            <div class="modal-content">
                <h4>Sign In</h4>
                <form action="index.php" method="POST">
                    <div class="input-field">
                        <label for="email">Email</label>
                        <input type="email" name="login_email" id="email">
                    </div>
                    <div class="input-field">
                        <label for="password">Password</label>
                        <input type="password" name="login_password" id="password">
                    </div>
                    <div class="input-field">
                        <input type="submit" name="login_submit" id="submit" value="SIGN IN">
                    </div>
                </form>
            </div>
        </div>

        <h5 style="color: #1abc9c;"><?php if (isset($sucess_msg)) {
                                        echo $sucess_msg;
                                    } ?></h5>
        <p style="color: red;"><?php if (isset($msg)) {
                                    echo $msg;
                                } ?></p>
    </div>

    <script>
        $('.modal').modal();
    </script>
</body>

</html>