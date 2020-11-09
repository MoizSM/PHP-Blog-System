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
        
        <!-- Registeration Form -->
        <?php include('./Forms/registrationForm.php'); ?>
        <!-- Login Form -->
        <?php include('./Forms/loginForm.php'); ?>
    </div>

    <h5 style="color: #1abc9c;"><?php if (isset($sucess_msg)) {
                                    echo $sucess_msg;
                                } ?></h5>`
    <p style="color: red;"><?php if (isset($msg)) {
                                echo $msg;
                            } ?></p>
    </div>

    <script>
        $('.modal').modal();
    </script>
</body>

</html>