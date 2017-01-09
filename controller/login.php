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
            $user_type = 1;
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
        if(!empty($_POST)){
            $data['post'] = $_POST;
            $email = $_POST['email'];
            $email = strip_tags($email);
            $email = trim($email);
            if ($this->emailExists($email)) {
                $this->model->forgetPassword($email);
                $data['result'] = true;
            }
            else{
                $data['errors'] = array(array("Email Address Not Exists"));
            }
            if ($this->model->loggedIn() == true){
                header("location: ".$GLOBALS['dynamic_url']."home");
                exit();
            }

        }
        $data['page_title'] = "Library : Forget Password";
        $data['view_page'] = "users/forget_password";
        $data['header'] = $GLOBALS['header'];
        $data['footer'] = $GLOBALS['footer'];

        return $data;
    }

    public function reset_password(){
        $email = $_GET['email'];

        if (!empty($_POST)){
            $password = $_POST['new_password'];
            $password = strip_tags($password);
            $password = trim($password);

            $data['result'] = $this->model->reset_password($email,$password);
        }


        $data['page_title'] = "Library : Reset Password";
        $data['view_page'] = "users/reset_password";
        $data['header'] = $GLOBALS['header'];
        $data['footer'] = $GLOBALS['footer'];

        return $data;
    }

    public function change_password(){
        if (!empty($_POST)){
            $user_data = $this->model->userDetail();
            $password = $_POST['current_password'];
            $new_password = $_POST['new_password'];
            $password = strip_tags($password);
            $new_password = strip_tags($new_password);
            $password = trim($password);
            $new_password = trim($new_password);
            if(md5($password) !== $user_data['password']){
                $data['errors']  = array(array("Wrong Current Password"));
            } else {
                $data['result'] = $this->model->changePassword($new_password);
            }
        }

        $data['page_title'] = "Library : Change Password";
        $data['view_page'] = "users/change_password";
        $data['header'] = $GLOBALS['header'];
        $data['footer'] = $GLOBALS['footer'];

        return $data;
    }

    public function profile(){
        $user_data = $this->model->userDetail();
        $data['user_data'] = $user_data;
        $data['page_title'] = "Library : Profile";
        $data['view_page'] = "users/profile";
        $data['header'] = $GLOBALS['header'];
        $data['footer'] = $GLOBALS['footer'];

        return $data;
    }

    public function setting(){
        if(isset($_FILES['image_upload_file'])){
            $output['status'] = false;
            set_time_limit(0);
            $allowedImageType = array("image/png","image/jpg","image/jpeg");
            $path = "view/assets/img/profile_pic/";
            $path1 = $GLOBALS['base_url']."view/assets/img/profile_pic/";

            if ($_FILES['image_upload_file']['error'] > 0){
                $output['error'] = "Error in File";
            } elseif (!in_array($_FILES['image_upload_file']['type'],$allowedImageType)){
                $output['error'] = "You Can Only upload jpeg, png Image";
            } elseif (round($_FILES['image_upload_file']["size"] / 1024) > 4096) {
                $output['error']= "You can upload file size up to 4 MB";
            } else {
                $temp_path = $_FILES['image_upload_file']['tmp_name'];
                $file = pathinfo($_FILES['image_upload_file']['name']);
                $fileType = $file["extension"];
                $fileNameNew = rand(333, 999).time().".$fileType";

                move_uploaded_file($temp_path,$path.$fileNameNew);
                $output['result'] = $this->model->profile_img($fileNameNew);
                $output['image'] = $path1.$fileNameNew;
                $output['status']=TRUE;
            }
            echo json_encode($output);
            die();
        }
        if (!empty($_POST)){
            $first_name = trim(strip_tags($_POST['first_name']));
            $last_name = trim(strip_tags($_POST['last_name']));
            $email = trim(strip_tags($_POST['email']));
            $contact_number = trim(strip_tags($_POST['contact_number']));
            $address = trim(strip_tags($_POST['address']));
            $change_data = array("first_name"=>$first_name,"last_name"=>$last_name,"email"=>$email,"contact_number"=>$contact_number,"address"=>$address);

            $data['result'] = $this->model->editProfile($change_data);


        }
        $user_data = $this->model->userDetail();
        $data['user_data'] = $user_data;
        $data['page_title'] = "Library : Setting";
        $data['view_page'] = "users/setting";
        $data['header'] = $GLOBALS['header'];
        $data['footer'] = $GLOBALS['footer'];
        return $data;
    }
    public function image_upload(){
        echo "hello";
        die();

    }
    public function emailExists($email) {
        $result = $this->model->checkIfExists("users","WHERE email='$email'");
        return $result;
    }

    public function logout(){
        session_destroy();
        header("location: ".$GLOBALS['dynamic_url']."login");
    }
}