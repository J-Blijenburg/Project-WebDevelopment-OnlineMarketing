<?php
require_once("../repositories/ItemRepository.php");

class MainController
{
   
    public function main()
    {
        $repository = new ItemRepository();
        $items = $repository->getAll();


        require("../view/Main.php");
        
    }
}
