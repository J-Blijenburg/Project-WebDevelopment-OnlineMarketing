<?php
require __DIR__ . '/../../services/ItemService.php';

class ItemController{
    private $itemService; 

    // initialize services
    function __construct() {
        $this->itemService = new ItemService();
    }

    // router maps this to /article and /article/index automatically
    public function index(){
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            $test = $this->itemService->getAllItems();
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($test);
        }
    }
}