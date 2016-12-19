<!DOCTYPE html>
<html>
    <head>
        <meta name="author" content="pcsaini">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $page_title; ?></title>

        <!--css files-->
        <link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS['base_url']; ?>view/assets/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS['base_url']; ?>view/assets/css/mdb.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS['base_url']; ?>view/assets/css/style.css">
        <link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS['base_url']; ?>view/assets/font-awesome/css/font-awesome.css">
        <link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS['base_url']; ?>view/assets/css/style.css">


        <!--js files-->
        <script type="text/javascript" src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/mdb.min.js"></script>
        <script type="text/javascript" src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/tether.js"></script>
        <script type="text/javascript" src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/main.js"></script>

    </head>

    <body>
    <main>
        <!--Navbar-->
        <nav class="navbar navbar-dark navbar-fixed-top scrolling-navbar">

            <!-- Collapse button-->
            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
                <i class="fa fa-bars"></i>
            </button>

            <div class="container">

                <!--Collapse content-->
                <div class="collapse navbar-toggleable-xs" id="collapseEx">
                    <!--Navbar Brand-->
                    <a class="navbar-brand" href="<?php echo $GLOBALS['base_url']; ?>">Online Library</a>
                    <!--Links-->
                    <ul class="nav navbar-nav float-lg-right">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo $GLOBALS['base_url']; ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $GLOBALS['base_url']; ?>book">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $GLOBALS['base_url']; ?>home/contact">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $GLOBALS['base_url']; ?>login">Login</a>
                        </li>
                    </ul>
                </div>
                <!--/.Collapse content-->

            </div>

        </nav>
        <!--/.Navbar-->
