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
        <div class="input-field">
            <select name='displayType' id='displayType'>
                <option value="1">Public</option>
                <option value="0">Private</option>
            </select>
            <label for='displayType'>Display Type</label>
        </div>
        <input type='submit' name='submit' class='btn' value='Create Post' />
    </form>
    <h4 style="color: green; text-align: center"><?php if (isset($_COOKIE['msg'])) {
                                                        echo $_COOKIE['msg'];
                                                    } ?></h4>
</div>