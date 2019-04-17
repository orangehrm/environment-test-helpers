<?php

class Connection
{
    private $connection = null;
    public function setConnection($host,$user,$password){
        $this->connection = mysqli_connect($host,$user,$password);
        if($this->connection->connect_error){
            return false;
        }
        return true;
    }

    public function getConnection(){
        return $this->connection;
    }

    public function createDatabase($dbname){
        $sql = "CREATE DATABASE IF NOT EXISTS ".$dbname;
        if ($this->connection->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function selectDatabase($dbname){
        if(mysqli_select_db($this->connection,$dbname)){
            return true;
        }
        else{
            return false;
        }
    }

    public function executeQuery($query){
        if ($this->connection->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function closeConnection(){
        if(mysqli_close($this->connection)){
            return true;
        }
        else{
            return false;
        }
    }

    public function checkTable($tabbleName){
        $sql = "SELECT * FROM ".$tabbleName;
        $result = $this->connection->query($sql);
        if ($result->num_rows >0) {
            return true;
        } else {
            return false;
        }
    }
}