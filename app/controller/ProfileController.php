<?php
require_once("../repositories/UserRepository.php");
require_once("../repositories/ItemRepository.php");
require_once("../repositories/ImageRepository.php");
session_start();

class ProfileController{
    public function profile(){
        $repository = new ItemRepository();
        $imageRepository = new ImageRepository();

        $_SESSION['controller'] = "Profile";
            
        //button to get more info about the item
        if (isset($_POST["btnMoreInfo"])) {
            $_SESSION['selectedItem'] = htmlspecialchars($_POST["btnMoreInfo"]);
            header("Location: /iteminformation");
        }
        
        //The html page consist of multiple view. This is done to prevent duplicated code.
        $baseController =  new BaseController();
        $baseController->header();
        require("../view/Main.php");
        $baseController->ItemList();
        $baseController->footer();
        
    }
}