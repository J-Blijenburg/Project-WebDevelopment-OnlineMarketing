<?php
require_once("../repositories/UserRepository.php");
require_once("../repositories/ItemRepository.php");
session_start();

class MainController
{
   
    public function main()
    {
        $repository = new ItemRepository();
        $items = $repository->getAll();

        $user = unserialize($_SESSION['user']);


        if (isset($_POST["LoginButton"]) ) {
            header("Location: /login");
        }
        else if (isset($user)){
            echo "dsad";
        }
       
        require("../view/Main.php");

        
    }
}




