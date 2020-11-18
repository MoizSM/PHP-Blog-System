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
            <?php include('./Forms/uploadImage.php') ?>
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title"><?php echo $currentuser->name(); ?></span>
                    <p>Email: <?php echo $currentuser->getEmail(); ?></p>
                    <p>Username: <?php echo $currentuser->username(); ?></p>
                </div>
            </div>
        </div>
    </div>

    <?php include('./Forms/addBlogForm.php'); ?>

    <div class="divider"></div>

    <?php if ($singleblogs) : ?>
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
                    <li class="collection-item">
                        <div>Display Type: <?php echo $item['displayType'] ? 'Public' : 'Private' ?></div>
                    </li>
                    <form action="profile.php" method="GET">
                        <input type="hidden" name='delete' value='<?php echo $item['id'] ?>'>
                        <button class='btn right' type='submit'>DELETE</button>
                    </form>
                </ul>
            <?php endforeach ?>
        </div>
    <?php else : ?>
        <div class="container">
            <h5>You do not have any posts. Why don't you create one?</h5>
        </div>
    <?php endif ?>

    <script>
        $(document).ready(function() {
            $('.materialboxed').materialbox();
            $('select').formSelect();
        });
    </script>
</body>

<?php
include('./common/Footer.php');
?>