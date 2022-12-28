<?php
require_once("../repositories/ItemRepository.php");

class MainController
{
   
    public function main()
    {
        $repository = new ItemRepository();
        $items = $repository->getAll();

        if (isset($_POST["LoginButton"]) ) {
            header("Location: /login");
        }


        require("../view/Main.php");
        
        
        
    }
}




