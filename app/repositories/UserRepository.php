<?php
require_once("../model/User.php");
require_once("../repositories/Repository.php");
class UserRepository extends Repository{
    protected $connection ;
    
    public function getAll(){
        $stmt = $this->connection->prepare("SELECT * FROM Users");
        $stmt->execute();
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $items = $stmt->fetchAll();
        return $items;
    }
}