<!DOCTYPE html>
<html>
<head>
    <meta name="author" content="pcsaini">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>

    <!--css files-->
    <link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS['base_url']; ?>view/assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS['base_url']; ?>view/assets/css/style.css">
    <link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS['base_url']; ?>view/assets/font-awesome/css/font-awesome.css">
    <link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS['base_url']; ?>view/assets/css/style.css">

    <!--js files-->
    <script type="text/javascript" src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/main.js"></script>
    <script type="text/javascript" src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/app.js"></script>

</head>

<body>
<main>
    <div class="main-content">
        <div class="login-logo">
            <img src="<?php echo $GLOBALS['base_url']; ?>view/assets/img/logo.png">
        </div>
        <div class="form-content">
            <div class="login-form">
                <h2>Admin - Login</h2>
                <?php
                if(!empty($errors)) {
                    foreach($errors as $message) {
                        echo "<div class='alert-danger errorDiv'>".$message[0]."</div>";
                    }
                }
                ?>
                <form method="post" id="login-form" action="<?php echo $GLOBALS['dynamic_url']; ?>admin" autocomplete="off">
                    <input type="text" placeholder="Username" id="username" name="username" value="<?php if(isset($_POST['username'])) { echo $post['username']; } ?>"/>
                    <input type="password" placeholder="Password" id="password" name="password"/>
                    <button type="submit" id="btn-login"><i class="fa fa-sign-in"></i> Login</button>
                </form>
                <div class="cta"><a href="<?php echo $GLOBALS['dynamic_url']; ?>login/forget_password"><i class="fa fa-info-circle"></i> Forgot your password?</a></div>
            </div>
        </div>
    </div>
    <div class="text-center">Copiright 2016 <?php echo $website_name;?></div>
</main>

</body>
</html>





