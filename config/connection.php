<?php
    $conn = mysqli_connect('localhost', 'root', '', 'blogsystem');
    if(!$conn){
        echo 'An error has occured'.mysqli_connect_error();
    }
?>