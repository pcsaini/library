<?php
/**
 * Created by PhpStorm.
 * User: pcsaini
 * Date: 7/12/16
 * Time: 9:03 PM
 */

include "config.php";

class DBconfig{

    var $connection;

    public function __construct()
    {
        $this->hostname = $GLOBALS['hostname'];
        $this->username = $GLOBALS['username'];
        $this->password = $GLOBALS['password'];
        $this->database = $GLOBALS['database'];
    }

    function connectToDatabase()
    {
        $connection = new mysqli($this->hostname, $this->username, $this->password, $this->database);

        if ($connection->connect_errno > 0){
            die("sorry errors in connection");
        }
        else{
            $this->connection = $connection;
        }
        return $connection;
    }

}