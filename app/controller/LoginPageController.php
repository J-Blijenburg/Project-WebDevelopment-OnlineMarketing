<?php
require_once("../repositories/UserRepository.php");


class LoginPageController{
   

    public function loginPage(){
        $repository = new UserRepository();
        $users = $repository->getAll();
        
        require("../view/LoginPage.php");
    }
}