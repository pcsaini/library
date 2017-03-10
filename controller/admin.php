<?php
/**
 * Created by PhpStorm.
 * User: pcsaini
 * Date: 23/12/16
 * Time: 11:50 AM
 */

class admin{

    public function __construct()
    {
        $this->model = new auth_model();
        $this->book_model = new book_model();
    }
    public function index(){
        if (!empty($_POST)){
            $data['post'] = $_POST;
            $user_type = 2;

            $username = $_POST['username'];
            $password = $_POST['password'];

            $username = strip_tags($username);
            $password = strip_tags($password);

            $password = md5($password);

            $result = $this->model->login($username,$password,$user_type);
            if (!$result == false){
                $_SESSION['id'] = $result;
                header("Location: ".$GLOBALS['dynamic_url']."admin/dashboard");
                die();
            }
            else{
                $data['errors'] = array(array("Username and Password don't match"));
            }
        }

        $data['page_title'] = "Admin : Login";
        $data['view_page'] = "admin/login";
        $data['header'] = $GLOBALS['black_page'];
        $data['footer'] = $GLOBALS['black_page'];

        return $data;
    }
    public function dashboard(){

        $data['page_title'] = "Admin : Dashboard";
        $data['view_page'] = "admin/dashboard";
        $data['header'] = "admin/header.php";
        $data['footer'] = "admin/footer.php";

        return $data;
    }
    public function book_category(){

        if (isset($_POST['add_book_cat'])){
            $category = trim(strip_tags($_POST['category']));

            if ($this->book_model->bookCategoryExists($category)){
                $data['errors'] = array(array("Book Category Already Exists"));
            } else {
                $data['result'] = $this->book_model->addBookCategory($category);
            }
        }

        if (isset($_REQUEST['delete'])){
            $category_id = trim(strip_tags($_REQUEST['delete']));

            $data['delete_result'] = $this->book_model->deleteBookCategory($category_id);
            echo "Deleted Successfully";
            die();
        }

        $book_category = $this->book_model->bookCategoryDetail();

        $data['book_category'] = $book_category;
        $data['page_title'] = "Admin : Book Category";
        $data['view_page'] = "admin/book_category";
        $data['header'] = "admin/header.php";
        $data['footer'] = "admin/footer.php";

        return $data;
    }

    public function add_book(){

        if (isset($_POST['add_new_book'])){
            $data['post'] = $_POST;
            $book_category_id = trim(strip_tags($_POST['book_category_id']));
            $book_name= trim(strip_tags($_POST['book_name']));
            $isbn = trim(strip_tags($_POST['isbn']));
            $author = trim(strip_tags($_POST['author']));
            $edition = trim(strip_tags($_POST['edition']));

            $book_detail = array('book_name'=>$book_name,'isbn_no'=>$isbn,'author'=>$author,'edition'=>$edition,'book_category_id'=>$book_category_id);

            if ($this->book_model->bookExists($isbn)){
                $data['errors'] = array(array("Book Already Exists"));
            } else{
                $data['result'] = $this->book_model->addBook($book_detail);
                $data['post'] = null;
            }
        }

        $book_category = $this->book_model->bookCategoryDetail();
        $data['book_category'] = $book_category;

        if (isset($_POST['add_book_code'])){
            $data['post'] = $_POST;
            $book_category_id = trim(strip_tags($_POST['book_category_id']));
            $isbn = trim(strip_tags($_POST['isbn']));
            $book_code= trim(strip_tags($_POST['book_code']));
            $book = $this->book_model->bookDetails($isbn);
            $book_id = $book['book_id'];
            $book_code_detail = array('book_id'=>$book_id,'book_category_id'=>$book_category_id,'book_code'=>$book_code);
            if ($this->book_model->bookCodeExists($book_code)){
                $data['code_error'] = array(array("Book Code Already Exists"));
            } else{
                $result = $this->book_model->addBookCode($book_code_detail);
                if ($result == false) {
                    $data['book_result'] = "No";
                } else{
                    $data['book_result'] = "Yes";
                }
                $data['post'] = null;
            }
        }

        $book_category_again = $this->book_model->bookCategoryDetail();
        $data['book_category_again'] = $book_category_again;

        $data['page_title'] = "Admin : Add New Book";
        $data['view_page'] = "admin/add_book";
        $data['header'] = "admin/header.php";
        $data['footer'] = "admin/footer.php";

        return $data;
    }

    public function view_book(){

        $data['page_title'] = "Admin : View Book";
        $data['view_page'] = "admin/view_book";
        $data['header'] = "admin/header.php";
        $data['footer'] = "admin/footer.php";

        return $data;
    }

    public function add_student(){


        if ( isset($_POST['add_student'])){
            $data['post'] = $_POST;
            $first_name = trim(strip_tags($_POST['first_name']));
            $last_name = trim(strip_tags($_POST['last_name']));
            $username = trim(strip_tags($_POST['username']));
            $email = trim(strip_tags($_POST['email']));
            $gender = trim(strip_tags($_POST['gender']));
            $batch = trim(strip_tags($_POST['batch']));
            $stream = trim(strip_tags($_POST['stream']));
            $password = trim(strip_tags($_POST['password']));

            $user_detail = array('username'=>$username,'password'=>$password,'email'=>$email,'first_name'=>$first_name,'last_name'=>$last_name,'gender'=>$gender,'batch'=>$batch,'stream'=>$stream);
            print_r($user_detail);
            die();
            if ($this->model->addUser($user_detail)){
                print_r('aa gya');
                die();

            }
        }
        $data['page_title'] = "Admin : Add Student";
        $data['view_page'] = "admin/add_student";
        $data['header'] = "admin/header.php";
        $data['footer'] = "admin/footer.php";

        return $data;
    }
    public function check(){
        if ( isset($_REQUEST['username']) && !empty($_REQUEST['username']) ) {
            $username = trim($_REQUEST['username']);
            $username = strip_tags($username);
            echo "true";
            die();
        }

        if ( isset($_REQUEST['email']) && !empty($_REQUEST['email']) ) {
            $email = trim($_REQUEST['email']);
            $email = strip_tags($email);
            echo "true";
            die();
        }
    }

    public function view_student(){

        $data['page_title'] = "Admin : View Student";
        $data['view_page'] = "admin/view_student";
        $data['header'] = "admin/header.php";
        $data['footer'] = "admin/footer.php";

        return $data;
    }

    public function requested_book(){

        $data['page_title'] = "Admin : Requested Books";
        $data['view_page'] = "admin/requested_book";
        $data['header'] = "admin/header.php";
        $data['footer'] = "admin/footer.php";

        return $data;
    }

    public function issued_book(){

        $data['page_title'] = "Admin : Issued Book";
        $data['view_page'] = "admin/issued_book";
        $data['header'] = "admin/header.php";
        $data['footer'] = "admin/footer.php";

        return $data;
    }

    public function logout(){
        session_destroy();
        header("location: ".$GLOBALS['dynamic_url']."admin");
    }
}