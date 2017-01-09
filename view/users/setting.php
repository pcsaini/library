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
                    <?php
                    if (!empty($img_result)) {
                        if($img_result == 1) {
                            echo "<div class='alert-success errorDiv'>Successfully Update Image</div>";
                        }
                    }
                    ?>
                    <script>
                        $(document).on('change', '#image_upload_file', function () {
                            var progressBar = $('.progressBar'), bar = $('.progressBar .bar'), percent = $('.progressBar .percent');

                            $('#image_upload_form').ajaxForm({
                                beforeSend: function() {
                                    progressBar.fadeIn();
                                    var percentVal = '0%';
                                    bar.width(percentVal);
                                    percent.html(percentVal);
                                },
                                uploadProgress: function(event, position, total, percentComplete) {
                                    var percentVal = percentComplete + '%';
                                    bar.width(percentVal);
                                    percent.html(percentVal);
                                },
                                success: function(html, statusText, xhr, $form) {
                                    obj = $.parseJSON(html);
                                    if(obj.status){
                                        var percentVal = '100%';
                                        bar.width(percentVal);
                                        percent.html(percentVal);
                                        $("#imgArea>img").prop('src',obj.image);
                                    }
                                    else{
                                        alert(obj.error);
                                    }
                                },
                                complete: function(xhr) {
                                    progressBar.fadeOut();
                                }
                            }).submit();

                        });
                    </script>
                    <form enctype="multipart/form-data" action="<?php echo $GLOBALS['dynamic_url']; ?>login/setting" method="post" name="image_upload_form" id="image_upload_form">
                        <div id="imgArea"><img src="<?php echo $GLOBALS['base_url']."view/assets/img/profile_pic/".$user_data['profile_pic'];?>">
                            <div class="progressBar">
                                <div class="bar"></div>
                                <div class="percent">0%</div>
                            </div>
                            <div id="imgChange"><span>Change Photo</span>
                                <input type="file" accept="image/*" name="image_upload_file" id="image_upload_file">
                            </div>
                        </div>
                    </form>


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