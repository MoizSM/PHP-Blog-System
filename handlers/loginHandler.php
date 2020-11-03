<?php
    $msg;
    $email = '';
    $password = '';
    if (isset($_POST['login_submit'])) {
        $email = $_POST['login_email'];
        $password = md5($_POST['login_password']);

        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $res = mysqli_query($conn, $query);
        $numRows = mysqli_num_rows($res);
        if ($numRows == 1) {
            $rec = mysqli_fetch_array($res);
            $_SESSION['username'] = $rec['username'];
            header('Location: profile.php');
        } else {
            $msg = 'PASSWORD OR EMAIL WAS INCORRECT';
        }
    }
?>
