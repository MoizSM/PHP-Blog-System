<?php
include('./common/Header.php');
include('./classes/Users.php');
include('./handlers/blogHandler.php');
$user = $_SESSION['username'];
$currentuser = new Users($conn, $user);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
</head>

<body>
    <div class="row">
        <div class="userDetail col push-l3 l6 s12 push-m3 m6">
            <img class="materialboxed" width="200" src="assets/images/img.png">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title"><?php echo $currentuser->name(); ?></span>
                    <p>Email: <?php echo $currentuser->getEmail(); ?></p>
                    <p>Username: <?php echo $currentuser->username(); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="blogForm row">
        <h4 class='center'>Add New Post</h4>
        <form class='center' action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class='col l8'>
            <div class="input-field">
                <label for="title">Title</label>
                <input type="text" name="title" id="title">
            </div>
            <div class="input-field">
                <label for="body">Body</label>
                <input type="text" name="body" id="body">
            </div>
            <input type='submit' name='submit' class='btn' value='Create Post' />
        </form>
        <h4 style="color: green; text-align: center"><?php if (isset($msg)) {
                                        echo $msg;
                                    } ?></h4>
    </div>

</body>