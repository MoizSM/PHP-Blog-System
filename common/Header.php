<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: index.php');
    }
    include('./common/libraries.php');
    include('./config/connection.php');
?>

<head>
</head>

<body>
    <nav>
        <div class="nav-wrapper">
            <a href="homepage.php" class="logo brand-logo">Mo'zART</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="profile.php"><?php echo $_SESSION['username'] ?></a></li>
                <li><a href="homepage.php">Display All Posts</a></li>
                <li><a href="handlers/logoutHandler.php"><i class="fal fa-sign-out"></i></a></li>
            </ul>
        </div>
    </nav>
</body>