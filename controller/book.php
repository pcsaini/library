<?php
/**
 * Created by PhpStorm.
 * User: pcsaini
 * Date: 21/12/16
 * Time: 7:09 PM
 */

class book{

    public function __construct()
    {

    }
    public function index(){

        $data['page_title'] = "Library : Book";
        $data['view_page'] = "users/books";
        $data['header'] = $GLOBALS['header'];
        $data['footer'] = $GLOBALS['footer'];

        return $data;
    }
}