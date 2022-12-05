<?php


namespace database;
use PDO;
use PDOException;

class Database {
    private $connection;


    public function __construct(){
        $this->createConnection();
    }

    public function createConnection(){
        try {
            $this->connection = new PDO("mysql:host=localhost;dbname=aruga", "root", "");
        } catch(PDOException $e){
            echo $e->getMessage();
        }
       
    }
    
    public function getConnection(){
        return $this->connection;
    }
  
}






?>