<div class="main-content">
    <div class="login-logo">
        <img src="<?php echo $GLOBALS['base_url']; ?>view/assets/img/logo.png">
    </div>
    <div class="form-content">
        <div class="login-form">
            <h2>Login</h2>
            <?php
            if(!empty($errors)) {
                foreach($errors as $message) {
                    echo "<div class='alert-danger errorDiv'>".$message[0]."</div>";
                }
            }
            ?>
            <form method="post" id="login-form" action="<?php echo $GLOBALS['dynamic_url']; ?>login" autocomplete="off">
                <input type="text" placeholder="Username" id="username" name="username" value="<?php if(isset($_POST['username'])) { echo $post['username']; } ?>"/>
                <input type="password" placeholder="Password" id="password" name="password"/>
                <button type="submit" id="btn-login"><i class="fa fa-sign-in"></i> Login</button>
            </form>
            <div class="cta"><a href="<?php echo $GLOBALS['dynamic_url']; ?>login/forget_password"><i class="fa fa-info-circle"></i> Forgot your password?</a></div>
        </div>
    </div>
</div>