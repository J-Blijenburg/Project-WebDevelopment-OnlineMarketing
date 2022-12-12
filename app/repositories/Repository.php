<?php

class Repository
{
    protected $connection;
    public function __construct()
    {
        require("../Config.php");
            
        //connect met de database
        try {
            $this->connection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}