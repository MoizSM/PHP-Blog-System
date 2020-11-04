<?php
include('./common/Header.php');
include('./classes/Users.php');
include('./handlers/blogHandler.php');
$user = $_SESSION['username'];
$currentuser = new Users($conn, $user);
?>

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
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class='col l8'>
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
    </div>
    <h4 style="color: green"><?php if (isset($msg)) {
                                    echo $msg;
                                } ?></h4>
</body>