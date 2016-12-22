<?php
/**
 * Created by PhpStorm.
 * User: pcsaini
 * Date: 8/12/16
 * Time: 1:49 AM
 */

class auth_model extends DBconfig{

    public function __construct()
    {
        $connection = new DBconfig();
        $this->connection = $connection->connectToDatabase();
        $this->helper = new helper();
    }
    public function login($username, $password, $user_type){
        $username = mysqli_real_escape_string($this->connection,$username);
        $password = mysqli_real_escape_string($this->connection,$password);

        $user_id = $this->helper->db_select("user_id","users","WHERE username = '$username'");
        $session_id = $this->helper->mysqli_result($user_id);
        $result = $this->helper->check("users","WHERE username = '$username' AND password = '$password' AND user_type = '$user_type' ");
        if ($result){
            $_SESSION['session_id'] = $session_id;
        }
        return $result;
    }

    public function forgetPassword($email){
        $email = mysqli_real_escape_string($this->connection,$email);
        $password = substr(md5(microtime()),rand(0,26),15);
        $resultRaw = $this->helper->db_select("first_name", "users", "WHERE email='$email'");
        $user_array = $resultRaw->fetch_assoc();
        $name = $user_array['first_name'];
        $baseurl = $GLOBALS['base_url'];

        $subject = "Forgot Password Request";
        $body = "Hi $name, <br/> Please click the following link for password reset - <br/> ".$baseurl."login/reset_password?password=$password&email=$email <br/> Thanks,";
        $alertmsg = "Password reset successfully requested, Please check your mail for more details";
        mail($email,$subject, $body,"premchandsaini779@gmail.com");
        print_r($body);
        die();
    }

    public function reset_password($email,$password){
        $email = mysqli_real_escape_string($this->connection, $email);
        $password = mysqli_real_escape_string($this->connection, $password);
        $password = md5($password);
        $data = array("password"=>$password);
        $result = $this->helper->db_update($data, "users", "WHERE email='$email'");
        return $result;
    }

    public function changePassword($password) {
        $user_id = $_SESSION['session_id'];
        $password = mysqli_real_escape_string($this->connection, $password);
        $password = md5($password);
        $data = array("password"=>$password);
        $result = $this->helper->db_update($data, "users", "WHERE user_id='$user_id'");
        return $result;
    }

    public function checkIfExists($tbname,$where) {
        $result = $this->helper->check($tbname, $where);
        return $result;
    }

    public function userDetail(){
        $session_id = $_SESSION['session_id'];
        $resultRaw = $this->helper->db_select("*", "users", "WHERE user_id='$session_id'");
        $result = $resultRaw->fetch_assoc();
        return $result;
    }

    public function loggedIn(){
        return (isset($_SESSION['session_id'])) ? true : false;
    }
}