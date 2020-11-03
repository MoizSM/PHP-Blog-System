<?php
$sucess_msg;
$fName = '';
$lName = '';
$email = '';
$password = '';
$username = '';
if (isset($_POST['submit'])) {
    $fName = mysqli_escape_string($conn, $_POST['fName']);
    $lName = mysqli_escape_string($conn, $_POST['lName']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = mysqli_escape_string($conn, md5($_POST['password']));
    $username = $fName . '_' . $lName;

    $query = "INSERT INTO users(first_name, last_name, email, password, username) values (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $query)){
        echo "SOME ERROR HAS OCCURED";
    }else{
        mysqli_stmt_bind_param($stmt, 'sssss', $fName, $lName, $email, $password, $username);
        mysqli_stmt_execute($stmt);
        print_r(mysqli_stmt_get_result($stmt));
        $sucess_msg = 'ACCOUNT HAS BEEN CREATED.';
    }
}
