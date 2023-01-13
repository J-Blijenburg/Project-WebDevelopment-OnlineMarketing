<?php
require_once("../model/Bid.php");
require_once("../repositories/Repository.php");
class BidRepository extends Repository
{
      //get every single biddings of the given item
      public function getAll()
      {
          $stmt = $this->connection->prepare("SELECT * FROM Bids");
          $stmt->execute();
          $item = $stmt->fetchAll();
          return $item;
      }
    //get every single biddings of the given item
    public function getBidByItemId($itemId)
    {
        $stmt = $this->connection->prepare("SELECT BI.Bid_Id, BI.Price, BI.Date,BI.Item_Id,BI.User_Id, US.FirstName 
        FROM Bids AS BI JOIN Users AS US ON BI.User_Id = US.User_Id WHERE Item_Id = :itemId ORDER BY BI.Price DESC");
        $stmt->bindParam(':itemId', $itemId);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Item');
        $item = $stmt->fetchAll();
        return $item;
    }
    //Place a new bid on a specifik item
    public function setNewBid($price, $itemId, $userId)
    {
        $query = $this->connection->prepare("INSERT INTO Bids (Bid_Id, Price, Date, Item_Id, User_Id) 
         VALUES (NULL, :price, now(), :itemId, :userId)");

        $query->bindParam(':price', $price);
        $query->bindParam(':itemId', $itemId);
        $query->bindParam(':userId', $userId);

        $query->execute();
    }
}
