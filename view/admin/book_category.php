<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="<?php echo $GLOBALS['base_url']; ?>admin/dashboard">Dashboard</a></li>
    <li><a href="#">Book</a></li>
    <li class="active">Book Category</li>
</ol>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="panel panel-custom">
            <div class="panel-heading">Book Category</div>
            <div class="panel-body">
                <?php
                if(mysqli_num_rows($book_category)>0){
                    $num = 1;
                    ?>
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Book Category Name</th>
                            <th>Delete Category</th>
                        </tr>
                        </thead>
                        <?php while ($row = mysqli_fetch_assoc($book_category)){ ?>
                            <tbody>
                            <tr>
                                <td><?php echo $num++; ?></td>
                                <td><?php echo $row['book_category_name']; ?></td>
                                <td class="text-center"><a class="delete_book_category btn btn-danger" data-id="<?php echo $row['book_category_id']; ?>" href="javascript:void(0)"><i class="fa fa-trash"></i> &nbsp; Delete</a></td>
                            </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                <?php } else {
                        echo "No Results Found";
                    }?>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="panel panel-custom">
            <div class="panel-heading">Add New Book Category</div>
            <div class="panel-body">
                <?php
                if(!empty($errors)) {
                    foreach($errors as $message) {
                        echo "<div class='alert-danger errorDiv'>".$message[0]."</div><br/>";
                    }
                }
                if (!empty($result)) {
                    if($result == 1) {
                        echo "<div class='alert-success errorDiv'> Successfully Added a New Book Category</div><br>   ";
                    }
                }
                ?>
                <form action="<?php echo $GLOBALS['dynamic_url'];?>admin/book_category" method="post" class="text-center">
                    <label> Category name:</label>
                    <input type="text" name="category" required/>
                    <button type="submit" class="btn btn-primary" name="add_book_cat"><i class="fa fa-plus-circle"></i> &nbsp; Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

        $('.delete_book_category').click(function(e){

            e.preventDefault();

            var pid = $(this).attr('data-id');
            var parent = $(this).parent("td").parent("tr");

            bootbox.dialog({
                message: "Are you sure you want to Delete ? Because all book in this Category are deleted.",
                title: "<i class='fa fa-trash'></i> Delete !",
                buttons: {
                    success: {
                        label: "No",
                        className: "btn-success",
                        callback: function() {
                            $('.bootbox').modal('hide');
                        }
                    },
                    danger: {
                        label: "Delete!",
                        className: "btn-danger",
                        callback: function() {
                            $.post('book_category', { 'delete':pid })
                                .done(function(response){
                                    bootbox.alert(response);
                                    parent.fadeOut('slow');
                                })
                                .fail(function(){
                                    bootbox.alert('Something Went Wrog ....');
                                })

                        }
                    }
                }
            });


        });

    });
</script>