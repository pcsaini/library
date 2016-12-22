<div class="main-heading">
    <h2>Your Profile</h2>
</div>

<div class="container">
    <div class="row profile">
        <!-- left column -->
        <div class="col-md-3 col-sm-6 col-xs-12 profile-info">
            <div class="panel panel-custom">
                <div class="panel-heading text-center">Profile</div>
                <div class="panel-body">
                    <div class="profile-pic">
                        <img src="<?php echo $GLOBALS['base_url']."view/assets/img/profile_pic/".$user_data['profile_pic']; ?>" class="avatar img-circle" alt="profile_pic" / >
                    </div>
                    <hr id="line">
                    <h4 class="username text-center"><?php echo $user_data['username']; ?></h4>
                    <div class="information">
                        <h3 class="full-name"><?php echo $user_data['first_name']?> <?php echo $user_data['last_name']?></h3>
                        <p class="mail-id"><?php echo $user_data['email']; ?></p>
                        <p class="mail-id">Batch: <?php echo $user_data['batch']; ?></p>
                        <p class="mail-id">Stream: <?php echo $user_data['stream']; ?></p>

                        <a href="<?php echo $GLOBALS['base_url'] ?>login/setting">
                            <button class="btn">Edit Profile</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-6 col-xs-12 history-info">
            <div class="panel panel-custom">
                <div class="panel-heading">Registered Books</div>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Book Name</th>
                                <th>Issue Date</th>
                                <th>Return Date</th>
                                <th>Fine</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>pcsaini</td>
                            <td>12</td>
                            <td>14</td>
                            <td>-</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-custom">
                <div class="panel-heading">Issued Book</div>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Book Name</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                            <th>Fine</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>pcsaini</td>
                                <td>12</td>
                                <td>12</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-custom">
                <div class="panel-heading">Book History</div>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Book Name</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                            <th>Fine</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>pcsaini</td>
                                <td>12</td>
                                <td>134</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>