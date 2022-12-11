<?php

require_once("../repositories/ItemRepository.php");
class LoginPageController{
    public function loginPage(){
        $repository = new ItemRepository();
        $items = $repository->getAll();
        
        

        require("../view/LoginPage.php");
    }
}