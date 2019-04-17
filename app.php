<?php

include_once ("Connection.php");

$connection = new Connection();

createDB();
createTable();
insertData();
checkData();

function createDB(){
    global $connection;
    if($connection->setConnection('db','root','1234')){
        if($connection->createDatabase('php_simple')){
            print("true\n");
        }else{
            print("false\n");
        }
    }else{
        print("false\n");
    }
}

function createTable(){
    global $connection;
    $sql = "CREATE TABLE Employee (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL
                )";

    if($connection->selectDatabase('php_simple')){
        if($connection->executeQuery($sql)){
            print("true\n");
        }else{
            print("false\n");
        }
    }
    else{
        print("false\n");
    }
}

function insertData(){
    global $connection;
    $sql = "INSERT INTO Employee (firstname, lastname)
                VALUES ('John', 'Peterson')";

    if($connection->selectDatabase('php_simple')){
        if($connection->executeQuery($sql)){
            print("true\n");
        }
        else{
            print("false\n");
        }
    }
    else{
        print("false\n");
    }
}

function checkData(){
    global $connection;
    if($connection->checkTable('Employee')){
        print("true\n");
    }
    else{
        print("false\n");
    }
}
