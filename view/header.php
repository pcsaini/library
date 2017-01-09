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
        <script type="text/javascript" src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/jquery.form.js"></script>
        <script type="text/javascript" src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/main.js"></script>
        <script type="text/javascript" src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/app.js"></script>

    </head>

    <body>
    <main>
        <!--Navbar-->
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand " href="<?php echo $GLOBALS['base_url']; ?>">Online Library</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="<?php echo $GLOBALS['base_url']; ?>"><i class="fa fa-home" aria-hidden="true"></i>
                                Home</a>
                        </li>
                        <li>
                            <a href="<?php echo $GLOBALS['base_url']; ?>book"><i class="fa fa-book" aria-hidden="true"></i> Books</a>
                        </li>
                        <li>
                            <a href="<?php echo $GLOBALS['base_url']; ?>home/contact"><i class="fa fa-phone-square" aria-hidden="true"></i> Contact Us</a>
                        </li>
                        <?php
                        if (isset($_SESSION["id"]) == true){
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Prem<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo $GLOBALS['base_url']; ?>login/profile">View Profile</a></li>
                                    <li><a href="<?php echo $GLOBALS['base_url']; ?>login/setting">Profile Setting</a></li>
                                    <li><a href="<?php echo $GLOBALS['base_url']; ?>login/change_password">Change Password</a></li>
                                    <li><a href="<?php echo $GLOBALS['base_url']; ?>login/logout">Logout</a></li>
                                </ul>
                            </li>
                            <?php
                        }
                        else{
                            ?>
                            <li>
                                <a href="<?php echo $GLOBALS['base_url']; ?>login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                            </li>
                            <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!--/.Navbar -->
