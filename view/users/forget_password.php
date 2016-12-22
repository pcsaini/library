<div class="main-content">
    <div class="login-logo">
        <img src="<?php echo $GLOBALS['base_url']; ?>view/assets/img/logo.png">
    </div>
    <div class="form-content">
        <div class="login-form">
            <h2>Forget Password</h2>
            <?php
            if(!empty($errors)) {
                foreach($errors as $message) {
                    echo "<div class='alert-danger errorDiv'>".$message[0]."</div><br/>";
                }
            }
            if (!empty($result)) {
                if($result == 1) {
                    echo "<div class='alert-success errorDiv'> Your password rest link sent in email please check your email. </div>";
                }
            }
            ?>
            <form action="<?php echo $GLOBALS['dynamic_url']; ?>login/forget_password" method="post" id="forget_password">
                <input type="email" placeholder="Email Address" id="email" name="email" value="<?php if(isset($_POST['email'])) { echo $post['email']; } ?>"/>
                <button type="submit"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    Submit
                </button>
            </form>
            <div class="cta"><a href="<?php echo $GLOBALS['dynamic_url']; ?>login"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to Login</a></div>
        </div>
    </div>
</div>