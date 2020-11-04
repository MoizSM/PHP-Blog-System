<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
include('./common/libraries.php');
include('./config/connection.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
        </div>
    </nav>

    <ul id="slide-out" class="sidenav">
        <li><a href="profile.php"><?php echo $_SESSION['username'] ?></a></li>
        <li><a href="homepage.php">Display All Posts</a></li>
        <li><a href="handlers/logoutHandler.php">Logout</a></li>
    </ul>


    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
        })
    </script>
</body>