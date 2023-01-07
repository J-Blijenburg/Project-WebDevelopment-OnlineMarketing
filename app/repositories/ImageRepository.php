<?php
require_once("../model/Image.php");
require_once("../repositories/Repository.php");


class ImageRepository extends Repository{
       
    protected $connection ;

 
    public function setNewImage($image, $itemId){

        $query = $this->connection->prepare("INSERT INTO Images(Image, Item_Id) VALUES (:Images, :ItemId)");
        $query->bindparam(':Images', $image);
        $query->bindparam(':ItemId', $itemId);
        $query->execute();
    }

    public function getAllImageByItemId($itemId){
        $query = $this->connection->prepare("SELECT * FROM Images WHERE Item_Id = :Item_Id");
        $query->bindparam(':Item_Id', $itemId);
        $query->execute();
        
        $query->setFetchMode(PDO::FETCH_CLASS, 'image');
        $images = $query->fetchAll();
        return $images;
    }
}
