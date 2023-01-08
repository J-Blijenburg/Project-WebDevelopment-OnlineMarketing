<?php
require_once("../repositories/UserRepository.php");
require_once("../repositories/ItemRepository.php");
require_once("../repositories/CategoryRepository.php");
require_once("../repositories/ImageRepository.php");
session_start();
class MainController
{


    public function main()
    {
        //set the needed session value to false. This only apply's the first time
        if (!isset($_SESSION['loggedin'])) {
            $_SESSION['loggedin'] = false;
        }




        $repository = new ItemRepository();
        $categoryRepository = new CategoryRepository();
        $imageRepository = new ImageRepository();
        $allCategorys = $categoryRepository->getAllCategory();
        $items = $repository->getAll();



        //creats an new item
        if (isset($_POST["NewItemBtn"])) {
            header("Location: /newitem");
        }
        //button to login
        else if (isset($_POST["LoginBtn"])) {
            header("Location: /login");
        }
        //button to signup
        else if (isset($_POST["SignUpBtn"])) {
            header("Location: /newuser");
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
        //button to get more info about the item
        else if (isset($_POST["btnMoreInfo"])) {
            $_SESSION['selectedItem'] = htmlspecialchars($_POST["btnMoreInfo"]);
            header("Location: /iteminformation");
        } else if (isset($_POST["RefreshBtn"])) {
            header("Location: /main");
        }


        require("../view/Main.php");
    }
}
