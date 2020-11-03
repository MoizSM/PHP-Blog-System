<?php
include('./common/Header.php');
include('./classes/Blogs.php');

if ($_SESSION['username'] == $_GET['q']) {
    header('Location: profile.php');
}

$blogs = new AllBlogs($conn);
$singleuserblogs = $blogs->displaySingleUserPosts($_GET['q']);
// foreach($singleuserblogs as $item)

?>

<body>
    <!-- <h2>Profile <?php print_r($singleuserblogs); ?></h2> -->
    <?php foreach ($singleuserblogs as $item) : ?>
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
        </ul>
    <?php endforeach ?>
</body>