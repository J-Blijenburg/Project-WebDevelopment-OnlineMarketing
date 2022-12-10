<?php
require("../model/Item.php");
require_once("../repositories/Repository.php");
class ItemRepository extends Repository{
    protected $connection ;
    
    public function getAll(){
        $stmt = $this->connection->prepare("SELECT * FROM Items");
        $stmt->execute();
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Item');
        $items = $stmt->fetchAll();
        return $items;
    }
}