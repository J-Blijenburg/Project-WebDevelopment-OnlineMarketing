<?php
require_once("../model/Item.php");
require_once("../repositories/Repository.php");


class ItemRepository extends Repository{
       
    protected $connection ;

    //get every single item there is
    public function getAll(){
        $stmt = $this->connection->prepare("SELECT IT.Item_Id, IT.Name, IT.Description, IT.Price, IT.Posted_At, IT.User_Id, IT.Category_Id, IT.Features, CA.Name AS CategoryName FROM Items AS IT JOIN Category AS CA  ON IT.Category_Id = CA.Category_Id ");
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
        $stmt = $this->connection->prepare("SELECT *, US.FirstName, US.LastName, US.Email FROM Items AS IT JOIN Users AS US  ON US.User_Id = IT.User_Id  WHERE Item_Id = :itemId ");
        $stmt->bindParam(':itemId', $itemId);

        $stmt->execute();
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Item');
        $item = $stmt->fetchAll();
        return $item;
    }
    //get every item selected by category
    public function getItemByCategoryId($categoryId){
        $stmt = $this->connection->prepare("SELECT * FROM Items WHERE Category_Id = :categoryId");
        $stmt->bindParam(':categoryId', $categoryId);

        $stmt->execute();
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Item');
        $item = $stmt->fetchAll();
        return $item;
    }



    //create a new item
    public function getAndSetNewItem($itemName, $itemDescription, $itemPrice, $selectedCategory, $userId, $itemFeatures)
    {       
        $query = $this->connection->prepare("INSERT INTO Items (Name, Description, Price, Posted_At, User_Id, Category_Id, Features) VALUES 
          (:Name, :Description, :Price, now(), :User_Id, :Category_Id, :Features); ");
        $query->bindParam(':Name', $itemName);
        $query->bindParam(':Description', $itemDescription);
        $query->bindParam(':Price', $itemPrice);
        $query->bindparam(':User_Id', $userId);
        $query->bindParam(':Category_Id', $selectedCategory); 
        $query->bindParam(':Features', $itemFeatures);
        

        $stmt = $this->connection->prepare("SELECT * FROM Items WHERE Item_Id = LAST_INSERT_ID();");
        $query->execute();
        $stmt->execute();
        
       
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Item');
        $item = $stmt->fetchAll();
        return $item;
        
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