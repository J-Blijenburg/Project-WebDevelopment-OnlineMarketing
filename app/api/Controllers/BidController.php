<?php

class BidController{
    private $bidService; 

    // initialize services
    function __construct() {
        $this->bidService = new BidService();
    }

    // router maps this to /article and /article/index automatically
    public function getAll(){
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            $test = $this->bidService->getAll();
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($test);
        }
    }

    public function getBidByItemId($itemId){
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            $test = $this->bidService->getBidByItemId($itemId);
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($test);
        }
    }
   
}