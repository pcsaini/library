<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/image/logo.ico">
    <link rel="shortcut icon" type="image/x-icon" href=assets/image/logo.ico">
    <title><?php echo $page_title; ?></title>

    <link rel="stylesheet" href="<?php echo $GLOBALS['base_url']; ?>view/assets/css/admin.css">
    <link rel="stylesheet" href="<?php echo $GLOBALS['base_url']; ?>view/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $GLOBALS['base_url']; ?>view/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $GLOBALS['base_url']; ?>view/assets/font-awesome/css/font-awesome.min.css">

    <script src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/bootbox.min.js"></script>
    <script src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/metisMenu.min.js"></script>
    <script src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/admin.js"></script>
    <script src="<?php echo $GLOBALS['base_url']; ?>view/assets/js/app.js"></script>


</head>
<body>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Online Library</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-comments-o"></i><span class="badge">4</span></a>
                <ul class="dropdown-menu">
                    <li class="dropdown-menu-header">
                        <strong>Messages</strong>
                        <div class="progress thin">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                <span class="sr-only">40% Complete (success)</span>
                            </div>
                        </div>
                    </li>
                    <li class="avatar">
                        <a href="#">
                            <div>New message</div>
                            <small>1 minute ago</small>
                            <span class="label label-info">NEW</span>
                        </a>
                    </li>
                    <li class="dropdown-menu-footer text-center">
                        <a href="#">View all messages</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="<?php echo $GLOBALS['base_url']; ?>view/assets/css/user.png"><span class="badge">9</span></a>
                <ul class="dropdown-menu">
                    <li class="dropdown-menu-header text-center">
                        <strong>Account</strong>
                    </li>
                    <li class="m_2"><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                    <li class="m_2"><a href="#"><i class="fa fa-wrench"></i> Settings</a></li>
                    <li class="m_2"><a href="#"><i class="fa fa-wrench"></i> Change Password</a></li>
                    <li class="m_2"><a href="<?php echo $GLOBALS['base_url']; ?>admin/logout"><i class="fa fa-lock"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <form class="navbar-form navbar-right">
            <input type="text" class="form-control" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
        </form>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <div class="user-info text-center">
                    <img src="<?php echo $GLOBALS['base_url']; ?>view/assets/img/profile_pic/no_img.png">
                    <h3>pcsaini</h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?php echo $GLOBALS['base_url']; ?>admin/dashboard"><i class="fa fa-dashboard fa-fw nav_icon"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-laptop nav_icon"></i> Book<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo $GLOBALS['base_url']; ?>admin/book_category">Book Category</a></li>
                            <li><a href="<?php echo $GLOBALS['base_url']; ?>admin/add_book">Add New Book</a></li>
                            <li><a href="<?php echo $GLOBALS['base_url']; ?>admin/view_book">View Book</a></li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-indent nav_icon"></i> Students<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo $GLOBALS['base_url']; ?>admin/add_student">Add Student</a></li>
                            <li><a href="<?php echo $GLOBALS['base_url']; ?>admin/view_student">View Student</a></li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="<?php echo $GLOBALS['base_url']; ?>admin/requested_book"><i class="fa fa-flask nav_icon"></i> Requested Books</a>
                    </li>
                    <li>
                        <a href="<?php echo $GLOBALS['base_url']; ?>admin/issued_book"><i class="fa fa-flask nav_icon"></i> Issued Books</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-flask nav_icon"></i> Rules</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
    <div id="page-wrapper">
        <div class="graphs">