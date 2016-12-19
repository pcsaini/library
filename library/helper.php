<?php
/**
 * Created by PhpStorm.
 * User: pcsaini
 * Date: 7/12/16
 * Time: 9:47 PM
 */

class helper extends DBconfig{

    public function __construct()
    {
        $connection = new DBconfig();
        $this->connection = $connection->connectToDatabase();
    }
    public function db_select($select, $tbname, $filter=""){
        $query = "SELECT $select FROM $tbname $filter";
        $result = $this->connection->query($query);
        return $result;
    }
}