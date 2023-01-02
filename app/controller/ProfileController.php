<?php
require_once("../repositories/UserRepository.php");
require_once("../repositories/ItemRepository.php");
session_start();

class ProfileController{
    public function profile(){
        

        $repository = new ItemRepository();


        //the current user who is logged in
        $user = unserialize($_SESSION['user']);
        

        $items = $repository->getUserItems($user->user_Id);

        //creats an new item
        if(isset($_POST["NewItemBtn"])){
            header("Location: /newitem");
        }
        //button to logout
        else if(isset($_POST["LogOutBtn"])){
            $_SESSION['loggedin'] = false;
            header("Location: /main");
        }
        else if(isset($_POST["btnMoreInfo"])){
           
            $_SESSION['selectedItem'] = htmlspecialchars($_POST["btnMoreInfo"]);

            header("Location: /iteminformation");
        }

        require("../view/Profile.php");
    }
}