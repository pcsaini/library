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
    public function loggedIn(){
        return (isset($_SESSION['session_id'])) ? true : false;
    }
}