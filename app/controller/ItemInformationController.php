<?php
require_once("../repositories/UserRepository.php");
require_once("../repositories/ItemRepository.php");
session_start();

class ItemInformationController
{
   
    public function itemInformation()
    {
        $repository = new ItemRepository();
        $itemId = 1;
        $item = $repository->getItem($itemId);

        


        
        require("../view/ItemInformation.php");

        
    }
}

