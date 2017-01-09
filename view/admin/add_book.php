<ol class="breadcrumb">
    <li><a href="<?php echo $GLOBALS['base_url']; ?>">Home</a></li>
    <li><a href="<?php echo $GLOBALS['base_url']; ?>admin/dashboard">Dashboard</a></li>
    <li><a href="#">Book</a></li>
    <li class="active">Add Book</li>
</ol>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="panel panel-custom">
            <div class="panel-heading">Add New Book</div>
            <div class="panel-body" style="padding: 10px;">
                <?php
                if(!empty($errors)) {
                    foreach($errors as $message) {
                        echo "<div class='alert-danger errorDiv'>".$message[0]."</div><br/>";
                    }
                }
                if (!empty($result)) {
                    if($result == 1) {
                        echo "<div class='alert-success errorDiv'> Successfully Added a New Book</div><br>";
                    }
                }
                ?>
                <form class="form-horizontal" action="<?php echo $GLOBALS['dynamic_url'];?>admin/add_book" method="post" role="form" id="add_book">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="book_category_id">Book Category :</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="book_category_id" name="book_category_id" required>
                                <option value="">Select Category</option>
                                <?php while ($row = mysqli_fetch_assoc($book_category)) {?>
                                    <option value="<?php echo $row['book_category_id'] ?>" <?php if(isset($_POST['book_category_id']) && ($_POST['book_category_id'] == $row['book_category_id'])) { echo 'selected'; } ?>><?php echo $row['book_category_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="book_name">Book Name :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="book_name" placeholder="Book Name" name="book_name" value="<?php if(isset($_POST['book_name'])) { echo $post['book_name']; } ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="isbn">ISBN No. :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="isbn" placeholder="ISBN No" name="isbn" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="author">Author :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="author" placeholder="Author" name="author" value="<?php if(isset($_POST['author'])) { echo $post['author']; } ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="edition">Edition :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="edition" placeholder="Edition" name="edition" value="<?php if(isset($_POST['edition'])) { echo $post['edition']; } ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-primary" name="add_new_book"><i class="fa fa-arrow-circle-right"></i> &nbsp; Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="panel panel-custom">
            <div class="panel-heading">Add Bock Code</div>
            <div class="panel-body">
                <?php
                if(!empty($code_error)) {
                    foreach($code_error as $code_message) {
                        echo "<div class='alert-danger errorDiv'>".$code_message[0]."</div><br/>";
                    }
                }
                if (!empty($book_result)) {
                    if($book_result == "Yes") {
                        echo "<div class='alert-success errorDiv'> Successfully Added a New Book Code</div><br>";
                    }
                    else if ($book_result == "No") {
                        echo "<div class='alert-danger errorDiv'> Sorry, You choose wrong Book Category. </div><br>";
                    }
                }
                ?>
                <form class="form-horizontal" action="<?php echo $GLOBALS['dynamic_url'];?>admin/add_book" method="post" role="form" id="add_book_code">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="book_category_id">Book Category :</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="book_category_id" name="book_category_id" required>
                                <option value="">Select Category</option>
                                <?php while ($row1 = mysqli_fetch_assoc($book_category_again)) {?>
                                    <option value="<?php echo $row1['book_category_id'] ?>" <?php if(isset($_POST['book_category_id']) && ($_POST['book_category_id']== $row['book_category_id'])) { echo 'selected'; } ?>><?php echo $row1['book_category_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="isbn">ISBN No. :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="isbn" placeholder="ISBN No" name="isbn" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="book_code">Book Code :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="book_code" placeholder="Book Code" name="book_code" value="<?php if(isset($_POST['book_code'])) { echo $post['book_code']; } ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-primary" name="add_book_code"><i class="fa fa-plus-circle"></i> &nbsp; Add Book Code</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>