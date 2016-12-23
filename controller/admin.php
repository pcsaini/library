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


    public function logout(){
        session_destroy();
        header("location: ".$GLOBALS['dynamic_url']."admin");
    }
}