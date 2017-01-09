<?php
/**
 * Created by PhpStorm.
 * User: pcsaini
 * Date: 23/12/16
 * Time: 1:11 PM
 */
class book_model{

    public function __construct()
    {
        $connection = new DBconfig();
        $this->connection = $connection->connectToDatabase();
        $this->helper = new helper();
    }

    public function bookDetail(){
        $resultRaw = $this->helper->db_select("*", "books", "");
        return $resultRaw;
    }

    public function bookCategoryDetail(){
        $resultRaw = $this->helper->db_select("*", "book_category", "");
        return $resultRaw;
    }

    public function addBookCategory($category){
        $category = mysqli_real_escape_string($this->connection,$category);

        $data = array('book_category_name'=>$category);

        $result = $this->helper->db_insert($data,"book_category");
        return $result;
    }

    public function bookCategoryExists($category){
        $category = mysqli_real_escape_string($this->connection,$category);

        $result = $this->helper->check("book_category","WHERE book_category_name='$category'");
        return $result;
    }

    public function deleteBookCategory($category_id){
        $category_id = mysqli_real_escape_string($this->connection,$category_id);

        $this->helper->db_delete("books","WHERE book_category_id='$category_id'");
        $this->helper->db_delete("book_code","WHERE book_category_id='$category_id'");
        $result = $this->helper->db_delete("book_category","WHERE book_category_id='$category_id'");
        return $result;
    }

    public function bookExists($isbn){
        $isbn = mysqli_real_escape_string($this->connection,$isbn);
        return $this->helper->check("books","WHERE isbn_no = '$isbn'");
    }

    public function addBook($book_detail){
        $book_detail['book_name'] = mysqli_real_escape_string($this->connection,$book_detail['book_name']);
        $book_detail['isbn_no'] = mysqli_real_escape_string($this->connection,$book_detail['isbn_no']);
        $book_detail['author'] = mysqli_real_escape_string($this->connection,$book_detail['author']);
        $book_detail['edition'] = mysqli_real_escape_string($this->connection,$book_detail['edition']);
        $book_detail['book_category_id'] = mysqli_real_escape_string($this->connection,$book_detail['book_category_id']);

        return $this->helper->db_insert($book_detail,"books");
    }

    public function bookCodeExists($book_code){
        $book_code = mysqli_real_escape_string($this->connection,$book_code);
        return $this->helper->check("book_code","WHERE book_code = '$book_code'");
    }

    public function addBookCode($book_code_detail){
        $book_code_detail['book_code'] = mysqli_real_escape_string($this->connection,$book_code_detail['book_code']);
        $book_code_detail['book_id'] = mysqli_real_escape_string($this->connection,$book_code_detail['book_id']);
        $book_code_detail['book_category_id'] = mysqli_real_escape_string($this->connection,$book_code_detail['book_category_id']);

        $book_id = $book_code_detail['book_id'];
        $book_category_id = $book_code_detail['book_category_id'];

        $no_of_copies = $this->helper->db_select("no_of_copies","books","WHERE book_id = '$book_id'");
        $no_of_copies = $this->helper->mysqli_result($no_of_copies);
        $no_of_copies = $no_of_copies + 1;

        $data = array('no_of_copies'=>$no_of_copies);
        $result = $this->helper->check("books","WHERE book_id = '$book_id' AND book_category_id = '$book_category_id'");

        if($result){
            $this->helper->db_update($data,"books","WHERE book_id = '$book_id' AND book_category_id = '$book_category_id'");
            return $this->helper->db_insert($book_code_detail,"book_code");
        } else{
            return false;
        }

    }

    public function bookDetails($isbn){
        $isbn = mysqli_real_escape_string($this->connection,$isbn);
        $resultRaw = $this->helper->db_select("*", "books", "WHERE isbn_no='$isbn'");
        $result = $resultRaw->fetch_assoc();
        return $result;
    }
}