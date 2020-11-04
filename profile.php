<?php
include('./common/Header.php');
include('./classes/Users.php');
include('./classes/Blogs.php');
include('./handlers/blogHandler.php');
include('./handlers/deleteblogHandler.php');

$user = $_SESSION['username'];
$currentuser = new Users($conn, $user);

$blogs = new AllBlogs($conn);
$singleblogs = $blogs->displaySingleUserPosts($user);
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
                <input type="text" name="title" id="title" required>
            </div>
            <div class="input-field">
                <label for="body">Body</label>
                <input type="text" name="body" id="body" required>
            </div>
            <input type='submit' name='submit' class='btn' value='Create Post' />
        </form>
        <h4 style="color: green; text-align: center"><?php if (isset($msg)) {
                                                            echo $msg;
                                                        } ?></h4>
    </div>

    <div class="divider"></div>
    <div class="userposts container">
        <h4>All Your Posts</h4>
        <?php foreach ($singleblogs as $item) : ?>
            <ul class="collection with-header">
                <li class="collection-header">
                    <h4><?php echo $item['title'] ?></h4>
                </li>
                <li class="collection-item">
                    <div><?php echo $item['body'] ?></div>
                </li>
                <li class="collection-item">
                    <div>Date Created: <?php echo $item['date_created'] ?></div>
                </li>
                <form action="profile.php" method="GET">
                    <input type="hidden" name='delete' value='<?php echo $item['id'] ?>'>
                    <button class='btn right' type='submit'>DELETE</button>
                </form>
            </ul>
        <?php endforeach ?>
    </div>

    <script>
        $(document).ready(function() {
            $('.materialboxed').materialbox();
        });
    </script>
</body>

<?php
    include('./common/Footer.php');
?>