<div class="main-heading">
    <h2>Edit Profile</h2>
</div>

<div class="container">
    <div class="row profile">
        <!-- left column -->
        <div class="col-md-3 col-sm-6 col-xs-12 profile-info">
            <div class="panel panel-custom">
                <div class="panel-heading text-center">Profile</div>
                <div class="panel-body">
                    <form id="uploadimage" action="" method="post"
                          enctype="multipart/form-data">
                        <div class="profile-pic">
                            <img id="previewing" src="<?php echo $GLOBALS['base_url']."view/assets/img/profile_pic/".$user_data['profile_pic']; ?>"
                                 class="avatar img-circle" alt="Profile-pic" style="height: 150px;width: auto;"
                            / >
                        </div>
                        <hr id="line">
                        <div id="selectImage" class="text-center">
                            <label >Select Your Image</label><br/>
                            <input type="file" name="file" id="file" required/>
                            <button type="submit" value="Upload" class="submit btn btn-info">Upload Image</button>
                        </div>
                    </form>
                    <div id="message"></div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-6 col-xs-12 history-info">
            <div class="panel panel-custom">
                <div class="panel-heading">Personal Information</div>
                <div class="panel-body">
                    <?php
                    if (!empty($result)) {
                        if($result == 1) {
                            echo "<div class='alert-success errorDiv'>Successfully Saved Changes</div>";
                        }
                    }
                    ?>
                    <form class="form-horizontal" action="<?php echo $GLOBALS['dynamic_url']; ?>login/setting" role="form" method="post" id="edit_profile">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">First Name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" value="<?php echo $user_data['first_name']; ?>" type="text" name="first_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Last Name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" value="<?php echo $user_data['last_name']; ?>" type="text" name="last_name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Username:</label>
                            <div class="col-md-8">
                                <input class="form-control" value="<?php echo $user_data['username']; ?>" type="text" name="username" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                                <input class="form-control" value="<?php echo $user_data['email']; ?>" type="text" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Batch:</label>
                            <div class="col-md-8">
                                <input value="<?php echo $user_data['batch']; ?>" type="tel" class="form-control" name="contact_number" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Stream:</label>
                            <div class="col-md-8">
                                <input value="<?php echo $user_data['stream']; ?>" type="tel" class="form-control" name="contact_number" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Contact Number:</label>
                            <div class="col-md-8">
                                <input value="<?php echo $user_data['contact_number']; ?>" type="tel" class="form-control" name="contact_number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Address:</label>
                            <div class="col-md-8">
                                <textarea rows="4" class="form-control" name="address"><?php echo $user_data['address']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-success" name="update_profile">Save changes</button>
                                <span></span>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>