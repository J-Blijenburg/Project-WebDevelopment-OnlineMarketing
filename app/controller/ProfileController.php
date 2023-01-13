<?php
require_once("../repositories/UserRepository.php");
require_once("../repositories/ItemRepository.php");
require_once("../repositories/ImageRepository.php");

class ProfileController{
    public function profile(){
        //the profile page only makes sure that the right list of items is selected 
        //I have kept the page so i always can edit the page if needed.
        $_SESSION['controller'] = "Profile";
               
        //The html page consist of multiple view. This is done to prevent duplicated code.
        $baseController =  new BaseController();
        $baseController->header();
        require("../view/Main.php");
        $baseController->ItemList();
        $baseController->footer();
        
    }
}