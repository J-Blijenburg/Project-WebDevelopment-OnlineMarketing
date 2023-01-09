<?php
require_once("../model/Category.php");
require_once("../repositories/Repository.php");
class CategoryRepository extends Repository
{
    //get every single category from the database and sort it alfabetic
    public function getAllCategory(){
        $stmt = $this->connection->prepare("SELECT * FROM Category ORDER BY Name");
        $stmt->execute();
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category');
        $items = $stmt->fetchAll();
        return $items;
    }
}
