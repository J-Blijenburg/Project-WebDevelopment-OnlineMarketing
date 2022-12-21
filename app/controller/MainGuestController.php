<?php
require_once("../repositories/ItemRepository.php");

class MainGuestController
{
   
    public function main()
    {
        $repository = new ItemRepository();
        $items = $repository->getAll();


        require("../view/MainGuest.php");
        
        
        
    }
}

?>


