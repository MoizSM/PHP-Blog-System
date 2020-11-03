<?php 
    session_start();
    if($_SESSION['username'] == $_GET['q']){
        header('Location: profile.php');
    }
?>

<body>
    <h2>Profile <?php echo $_GET['q']; ?></h2>
</body>