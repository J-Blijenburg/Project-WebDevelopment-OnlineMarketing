<?php
require __DIR__ . '/../repositories/BidRepository.php'; 


class BidService {
    //get every bid placed in the database
    public function getAll() {
        $repository = new BidRepository();
        $items = $repository->getAll();
        return $items;
    }

    //get all the bids sorted by the item Id
    public function getBidByItemId($itemId){
        $repository = new BidRepository();
        $items = $repository->getBidByItemId($itemId);
        return $items;
    }

   
}
