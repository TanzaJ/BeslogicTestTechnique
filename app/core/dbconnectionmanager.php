<?php

namespace database;

class DBConnectionManager{

    private $username;
    private $password;
    private $server; 
    private $dbname;

    private $dbConnection;

    function __construct(){

        $this->username = "root"; 
        $this->password = "";
        $this->server = "localhost";
        $this->dbname = "besairbnb_db";

        try{
        
            $this->dbConnection = new \PDO("mysql:host=$this->server;dbname=$this->dbname", $this->username, $this->password);

        }catch(\PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
        }


    }

    function getConnection(){

        return $this->dbConnection;

    }


}

?>