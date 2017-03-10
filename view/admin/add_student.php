<ol class="breadcrumb">
    <li><a href="<?php echo $GLOBALS['base_url']; ?>">Home</a></li>
    <li><a href="<?php echo $GLOBALS['base_url']; ?>admin/dashboard">Dashboard</a></li>
    <li><a href="#">Student</a></li>
    <li class="active">Add Student</li>
</ol>

<div class="row">
<div class="col-lg-12 col-md-16 col-sm-12">
    <div class="panel panel-custom">
        <div class="panel-heading">Add New Student</div>
        <div class="panel-body" style="padding: 10px;">
            <form class="form-horizontal" action="<?php echo $GLOBALS['dynamic_url'];?>admin/add_student" method="post" id="add_student">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="first_name">First Name : </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="last_name">Last Name :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="username">Username :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="email">Email :</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="gender">Gender :</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="gender" name="gender">
                            <option value="">Select Gender</option>
                            <option value="Male" >Male</option>
                            <option value="Female" >Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="batch">Batch :</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="batch" name="batch">
                            <option value="">Select Batch</option>
                            <option value="2013" >2013</option>
                            <option value="2014" >2014</option>
                            <option value="2015" >2015</option>
                            <option value="2016" >2016</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="stream">Stream :</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="stream" name="stream">
                            <option value="">Select Stream</option>
                            <option value="Computer Sceince Engneering" >Computer Sceince Engneering</option>
                            <option value="Information Technology" >Information Technology</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="password">Password :</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="password_again">Confirm Password :</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="password_again" placeholder="Confirm Password" name="password_again">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-default" name="add_student">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>