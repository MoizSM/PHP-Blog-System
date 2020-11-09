<?php 
    $currentuser = $_SESSION['username'];
    $msg;
    if(isset($_POST['submit'])){
        $title = mysqli_escape_string($conn, $_POST['title']);
        $body = mysqli_escape_string($conn, $_POST['body']);
        $displayType = mysqli_escape_string($conn, $_POST['displayType']);
        $displayType = (int)($displayType);
        $query = "SELECT id FROM users WHERE username='$currentuser'";
        $res = mysqli_query($conn, $query);
        if(mysqli_num_rows($res) == 1){
            $id = mysqli_fetch_array($res)['id'];
            mysqli_free_result($res);
            $query = "INSERT INTO blogs(title, body, userId, displayType) values ('$title','$body',$id, $displayType)";
            mysqli_query($conn, $query);
            $msg = 'POST ADDED SUCCESFULLY';
            setcookie('msg', $msg, time() + 1, '/');
            header('Location: profile.php');
        }
    }
?>