<?php
require_once("../model/Item.php");
require_once("../repositories/Repository.php");


class ItemRepository extends Repository{
       
    protected $connection ;

    //get every single item there is
    public function getAll(){
        $stmt = $this->connection->prepare("SELECT * FROM Items");
        $stmt->execute();
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Item');
        $items = $stmt->fetchAll();
        return $items;
    }

    //get every item from the selected member/current member
    public function getMemberItems($memberId){
        $stmt = $this->connection->prepare("SELECT * FROM Items WHERE User_Id = :memberId");
        $stmt->bindParam(':memberId', $memberId);

        $stmt->execute();
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Item');
        $items = $stmt->fetchAll();
        return $items;
    }

    //get a single item which is selected by the item id
    public function getItem($itemId){
        $stmt = $this->connection->prepare("SELECT * FROM Items WHERE Item_Id = :itemId");
        $stmt->bindParam(':itemId', $itemId);

        $stmt->execute();
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Item');
        $item = $stmt->fetchAll();
        return $item;
    }

    //create a new item
    public function setNewItem($itemName, $itemDescription, $itemPrice, $itemUpload)
    {       
        $query = $this->connection->prepare("INSERT INTO Items (Name, Description, Price, Posted_At, Status, Images, User_Id) VALUES 
          (:Name, :Description, :Price, now(), null, :Images, 1)");
        $query->bindParam(':Name', $itemName);
        $query->bindParam(':Description', $itemDescription);
        $query->bindParam(':Price', $itemPrice);
        $query->bindparam(':Images', $itemUpload);

        $query->execute();
    }

    
}