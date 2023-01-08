<?php
class BaseController
{
    public function header(){
        //button to login
        if (isset($_POST["LoginBtn"])) {
            header("Location: /login");
        }
        //button to signup
        else if (isset($_POST["SignUpBtn"])) {
            header("Location: /newuser");
        }
         //creats an new item
        else if (isset($_POST["NewItemBtn"])) {
            header("Location: /newitem");
        }
        //button to logout
        else if (isset($_POST["LogOutBtn"])) {
            $_SESSION['loggedin'] = false;
            header("Location: /main");
        }
        //button to see the profile
        else if (isset($_POST["profileBtn"])) {
            header("Location: /profile");
        }

        require("../view/Header.php");
    }

    public function footer(){
        require("../view/Footer.php");
    }

    
    
}

