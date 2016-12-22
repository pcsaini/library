<div class="main-content">
    <div class="login-logo">
        <img src="<?php echo $GLOBALS['base_url']; ?>view/assets/img/logo.png">
    </div>
    <div class="form-content">
        <div class="login-form">
            <h2>Reset Password</h2>
            <?php
            if (!empty($result)) {
                if($result == 1) {
                    echo "<div class='alert-success errorDiv'> Your password successfully changed for Login <a href='".$GLOBALS['dynamic_url']."login'>Click here</a></div>";
                }
            }
            ?>
            <form action="<?php echo $GLOBALS['dynamic_url']; ?>login/reset_password?email=<?php echo $_GET['email'] ?>" method="post" id="reset-password">
                <input type="password" placeholder="New Password" id="new_password" name="new_password"/>
                <input type="password" placeholder="Confirm Password" id="new_password_again" name="new_password_again"/>
                <button type="submit"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    Reset Password
                </button>
            </form>
        </div>
    </div>
</div>