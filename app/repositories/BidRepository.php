<?php
require_once("../model/Bid.php");
require_once("../repositories/Repository.php");
class BidRepository extends Repository
{
    //get every single biddings of the given item
    public function getItemBiddings($itemId)
    {
        $stmt = $this->connection->prepare("SELECT BI.Bid_Id, BI.Price, BI.Date,BI.Item_Id,BI.User_Id, US.FirstName 
        FROM Bids AS BI JOIN Users AS US ON BI.User_Id = US.User_Id WHERE Item_Id = :itemId");
        $stmt->bindParam(':itemId', $itemId);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Item');
        $item = $stmt->fetchAll();
        return $item;
    }
}
