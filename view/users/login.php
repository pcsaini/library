<div class="main-content">
    <div class="login-logo">
        <img src="<?php echo $GLOBALS['base_url']; ?>view/assets/img/logo.png">
    </div>

    <div class="login-form">

        <!-- form start -->
        <form method="post" role="form" id="login-form" autocomplete="off" action="">

            <div class="form-header">
                <h3 class="form-title">Login</h3>

                <div class="pull-right">
                    <h3 class="form-title"><span class="fa fa-pencil"></span></h3>
                </div>

            </div>

            <div class="form-body">

                <div id="errorDiv"></div>

                <div class="form-group">
                    <div class="input-group">
                        <input name="username" type="text" id="username" class="form-control" placeholder="Username" maxlength="40" autofocus="true">
                    </div>
                    <span class="help-block" id="error"></span>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    <span class="help-block" id="error"></span>
                </div>

            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-cyan waves-effect" id="btn-login">
                    <span class="fa fa-sign-in"></span> &nbsp; Login
                </button><br>
                <a href="#">Forget Password ?</a>
            </div>

        </form>
</div>