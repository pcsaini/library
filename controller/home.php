<?php
/**
 * Created by PhpStorm.
 * User: pcsaini
 * Date: 19/12/16
 * Time: 7:58 PM
 */

class home{

    public function __construct()
    {
        $this->model = new auth_model();
    }
    public function index(){
        $data['page_title'] = "Home : Library";
        $data['view_page'] = "users/home";
        $data['header'] = $GLOBALS['header'];
        $data['footer'] = $GLOBALS['footer'];

        return $data;
    }
    public function contact(){
        $data['page_title'] = "Contact : Library";
        $data['view_page'] = "users/contact";
        $data['header'] = $GLOBALS['header'];
        $data['footer'] = $GLOBALS['footer'];

        return $data;
    }
}