<?php
require("../controller/LoginPageController.php");
require_once("../repositories/ItemRepository.php");
class MainPageController{
    public function mainPage(){
        $repository = new ItemRepository();
        $items = $repository->getAll();

        if(isset($_POST["loginButton"])){
            
        }
        else{
            require("../view/MainPage.php");
        }
        
        
       
        

        
    }
}