<?php
$sucess_msg;
$fName = '';
$lName = '';
$email = '';
$password = '';
$username = '';

$reg_errors = array();

if (isset($_POST['submit'])) {
    $fName = mysqli_escape_string($conn, $_POST['fName']);
    if (!$fName) {
        array_push($reg_errors, 'Please Enter Your First Name');
    } else {
        if (!preg_match("/^[A-Za-z]+$/", $fName)) {
            array_push($reg_errors, 'Please Enter a Valid First Name');
        }
    }

    $lName = mysqli_escape_string($conn, $_POST['lName']);
    if (!$lName) {
        array_push($reg_errors, 'Please Enter Your Last Name');
    } else {
        if (!preg_match("/^[A-Za-z]+$/", $lName)) {
            array_push($reg_errors, 'Please Enter a Valid Last Name');
        }
    }

    $email = mysqli_escape_string($conn, $_POST['email']);
    if (!$email) {
        array_push($reg_errors, 'Please Enter Your Email ID');
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($reg_errors, 'Please Enter a Valid Email Address');
        }
    }

    $password = mysqli_escape_string($conn, md5($_POST['password']));
    if (!$password) {
        array_push($reg_errors, "Please Enter A Password");
    }

    if (!$reg_errors) {
        $username = $fName . '_' . $lName;
        $query = "INSERT INTO users(first_name, last_name, email, password, username) values (?,?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)) {
            echo "SOME ERROR HAS OCCURED";
        } else {
            mysqli_stmt_bind_param($stmt, 'sssss', $fName, $lName, $email, $password, $username);
            mysqli_stmt_execute($stmt);
            print_r(mysqli_stmt_get_result($stmt));
            $sucess_msg = 'ACCOUNT HAS BEEN CREATED.';
        }
    }
}
