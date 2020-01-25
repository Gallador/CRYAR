<?php

require_once "config.inc.php";

class Database {
    private $username;
    private $password;
    private $host;
    private $database;
    private $connection;

    public function __construct()
    {
        $this->username = "root";
        $this->password = "";
        $this->host = "127.0.0.1";
        $this->database = "test";
    }

    public function connect()
    {
        try {
            $conn = new PDO(
                "mysql:host=$this->host;dbname=$this->database", 
                $this->username,
                $this->password
            );
           
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection=$conn;
            return $conn;
        }
        catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function execute(string $sql) {
        $this->connection->execute($sql);
    }
}