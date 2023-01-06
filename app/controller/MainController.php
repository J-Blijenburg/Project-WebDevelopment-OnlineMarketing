<?php
require_once("../repositories/UserRepository.php");
require_once("../repositories/ItemRepository.php");
require_once("../repositories/CategoryRepository.php");
session_start();

class MainController
{

    public function main()
    {
        $repository = new ItemRepository();
        $categoryRepository = new CategoryRepository();
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
        }
        //pudsadass
        else if(isset($_POST["bla"])){
            $selectedCategory = htmlspecialchars($_POST["inputCategory"]);
            echo $selectedCategory;
        }
        

        require("../view/Main.php");
    }
}
