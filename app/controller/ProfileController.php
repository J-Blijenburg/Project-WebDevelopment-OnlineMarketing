<?php
require_once("../repositories/UserRepository.php");
require_once("../repositories/ItemRepository.php");
require_once("../repositories/ImageRepository.php");
session_start();

class ProfileController{
    public function profile(){
        

        $repository = new ItemRepository();
        $imageRepository = new ImageRepository();

        //the current user who is logged in
        $user = unserialize($_SESSION['user']);
        
        $items = $repository->getUserItems($user->user_Id);

        if(isset($_POST["btnMoreInfo"])){
            $_SESSION['selectedItem'] = htmlspecialchars($_POST["btnMoreInfo"]);
            header("Location: /iteminformation");
        }
        
        
        $baseController =  new BaseController();
        $baseController->header();
        require("../view/Profile.php");
        $baseController->footer();
        
    }
}