<div class="main-content">
    <div class="login-logo">
        <img src="<?php echo $GLOBALS['base_url']; ?>view/assets/img/logo.png">
    </div>
    <div class="form-content">
        <div class="login-form">
            <h2>Change Password</h2>
            <?php
            if(!empty($errors)) {
                foreach($errors as $message) {
                    echo "<div class='alert-danger errorDiv'>".$message[0]."</div><br/>";
                }
            }
            if (!empty($result)) {
                if($result == 1) {
                    echo "<div class='alert-success errorDiv'> Your password successfully changed <a href='".$GLOBALS['dynamic_url']."'>Go to Home Click here</a> </div>";
                }
            }
            ?>
            <form action="" method="post" id="change-password">
                <input type="password" placeholder="Current Password" id="current_password" name="current_password"/>
                <input type="password" placeholder="New Password" id="new_password" name="new_password"/>
                <input type="password" placeholder="Confirm Password" id="new_password_again" name="new_password_again"/>
                <button type="submit"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    Change Password
                </button>
            </form>
        </div>
    </div>
</div>