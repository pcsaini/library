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
    public function db_insert($array, $tbname) {
        $array_keys = array_keys($array);
        $array_keys = implode(", ", $array_keys);
        $array_values = implode("','", $array);
        $array_values = "'".$array_values."'";
        $query = "INSERT INTO $tbname ($array_keys) VALUES ($array_values)";
        if (mysqli_query($this->connection, $query)) {
            return true;
        } else {
            return false;
        }
    }

    public function db_select($select, $tbname, $filter=""){
        $query = "SELECT $select FROM $tbname $filter";
        $result = $this->connection->query($query);
        return $result;
    }

    public function db_update($array, $tbname, $where) {
        $keys = array_keys($array);
        $set = array();
        foreach($keys as $key) {
            $set[] = "$key = '$array[$key]' ";
        }
        $set = implode(", ", $set);
        $query = "UPDATE $tbname SET $set $where";
        if (mysqli_query($this->connection, $query)) {
            return true;
        } else {
            return false;
        }
    }

    public function db_delete($tbname, $where) {
        $query = "DELETE FROM $tbname $where";
        if (mysqli_query($this->connection, $query)) {
            return true;
        } else {
            return false;
        }
    }

    public function check($tbname,$where){
        $query = "SELECT * FROM $tbname $where";
        $result = mysqli_query($this->connection,$query);
        $result = $this->mysqli_result($result);
        return $result;

    }
    public function mysqli_result($res,$row=0,$col=0){
        $numrows = mysqli_num_rows($res);
        if ($numrows && $row <= ($numrows-1) && $row >=0){
            mysqli_data_seek($res,$row);
            $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
            if (isset($resrow[$col])){
                return $resrow[$col];
            }
        }
        return false;
    }
}
