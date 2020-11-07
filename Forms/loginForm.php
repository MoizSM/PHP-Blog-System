<!-- Modal Trigger -->
<a class="btn modal-trigger account" href="#modal2">Login</a>

<!-- Modal Structure -->
<div id="modal2" class="modal">
    <div class="modal-content">
        <h4>Sign In</h4>
        <form action="index.php" method="POST">
            <div class="input-field">
                <label for="email">Email</label>
                <input type="email" name="login_email" id="email">
            </div>
            <div class="input-field">
                <label for="password">Password</label>
                <input type="password" name="login_password" id="password">
            </div>
            <div class="input-field">
                <input type="submit" name="login_submit" id="submit" value="SIGN IN">
            </div>
        </form>
    </div>