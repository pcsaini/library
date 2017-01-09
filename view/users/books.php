<div class="main-content">
    <div class="container">
    <?php
    while($row = mysqli_fetch_assoc($book)){
        $book_id = $row['book_id'];
        echo "Book Name = ".$row['book_name']."<br>Book's ISBN No = ".$row['isbn_no']."<br>Author = ".$row['author']."<br>Edition = ".$row['edition']."<br> Available Copy = ".$row['no_of_copies']."<br>";
        ?>
        <a href="<?php echo $GLOBALS['dynamic_url'].'book/book_detail?book_id='.$book_id; ?>">Click Here</a><br>
        <br>

        <?php

    }

    ?>
    </div>
</div>
