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

        //button to login
        if (isset($_POST["LoginBtn"]) ) {
            header("Location: /login");
        }
        //button to signup
        else if(isset($_POST["SignUpBtn"])){
            header("Location: /newuser");
        }
        //button to logout
        else if(isset($_POST["LogOutBtn"])){
            $_SESSION['loggedin'] = false;
            header("Location: /main");
        }
        //button to see the profile
        else if(isset($_POST["profileBtn"])){
            header("Location: /profile");
        }
        else if(isset($_POST["btnMoreInfo"])){
           
            $_SESSION['selectedItem'] = htmlspecialchars($_POST["btnMoreInfo"]);

            header("Location: /iteminformation");
        }
        
        require("../view/Main.php");

        
    }
}




