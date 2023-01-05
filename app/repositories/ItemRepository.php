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

    //get every item from the selected user/current user
    public function getUserItems($userId){
        $stmt = $this->connection->prepare("SELECT * FROM Items WHERE User_Id = :userId");
        $stmt->bindParam(':userId', $userId);

        $stmt->execute();
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Item');
        $items = $stmt->fetchAll();
        return $items;
    }

    //get a single item which is selected by the item id
    public function getItemById($itemId){
        $stmt = $this->connection->prepare("SELECT * FROM Items WHERE Item_Id = :itemId");
        $stmt->bindParam(':itemId', $itemId);

        $stmt->execute();
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Item');
        $item = $stmt->fetchAll();
        return $item;
    }
    //create a new item
    public function setNewItem($itemName, $itemDescription, $itemPrice, $selectedCategory, $itemUpload)
    {       
        $query = $this->connection->prepare("INSERT INTO Items (Name, Description, Price, Posted_At, Status, Images, User_Id, Category_Id) VALUES 
          (:Name, :Description, :Price, now(), null, :Images, 1, :Category_Id)");
        $query->bindParam(':Name', $itemName);
        $query->bindParam(':Description', $itemDescription);
        $query->bindParam(':Price', $itemPrice);
        $query->bindParam(':Category_Id', $selectedCategory);
        $query->bindparam(':Images', $itemUpload);

        $query->execute();
    }

     //edit item by item id
     public function EditItemById($itemId, $itemName, $itemDescription, $itemPrice)
     {       
        $query = $this->connection->prepare("UPDATE Items 
        SET Name = :name, Description = :description, Price = :price
        WHERE `Item_Id` = :itemId");

        $query->bindParam(':itemId', $itemId);
        $query->bindParam(':name', $itemName);
        $query->bindParam(':price', $itemPrice);
        $query->bindParam(':description', $itemDescription);

        $query->execute();
     }

    //Delete the selected item by itemid
    public function DeleteItem($itemId)
    {      
        //First delete all the bids which are connected to the item
        $query = $this->connection->prepare("DELETE FROM Bids WHERE Item_Id = :itemId");
        $query->bindParam(':itemId', $itemId);
        $query->execute();
        
        //Second delete the selected item given by its itemId
        $query = $this->connection->prepare("DELETE FROM Items WHERE Item_Id = :itemId");
        $query->bindParam(':itemId', $itemId);
        $query->execute();
    }

    
}