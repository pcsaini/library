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
        $data['page_title'] = "Login";
        $data['view_page'] = "users/login";
        $data['header'] = $GLOBALS['header'];
        $data['footer'] = $GLOBALS['footer'];

        return $data;
    }
}