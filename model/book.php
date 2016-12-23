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
}