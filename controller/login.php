<?php
/**
 * Created by PhpStorm.
 * User: pcsaini
 * Date: 8/12/16
 * Time: 1:48 AM
 */
class login{

    public function __construct()
    {
        $this->model = new auth_model();


    }
    public function index(){
        if (!empty($_POST)){
            $data['post'] = $_POST;
            $user_type = $_GET['user_type'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $username = strip_tags($username);
            $password = strip_tags($password);

            $password = md5($password);

            $result = $this->model->login($username,$password,$user_type);
            if (!$result == false){
                $_SESSION['id'] = $result;
                header("Location: ".$GLOBALS['dynamic_url']."home");
                die();
            }
            else{
                $data['errors'] = array(array("Username and Password don't match"));
            }
        }
        if ($this->model->loggedIn() == true){
            header("location: ".$GLOBALS['dynamic_url']."home");
            exit();
        }
        $data['page_title'] = "Library : Login";
        $data['view_page'] = "users/login";
        $data['header'] = $GLOBALS['header'];
        $data['footer'] = $GLOBALS['footer'];

        return $data;
    }

    public function forget_password(){

    }

    public function change_password(){

    }

    public function profile(){

    }

    public function setting(){

    }

    public function logout(){
        session_destroy();
        header("location: ".$GLOBALS['dynamic_url']."login");
    }
}