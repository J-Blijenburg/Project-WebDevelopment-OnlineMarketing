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

        //button to get more info about the item
        if (isset($_POST["btnMoreInfo"])) {
            $_SESSION['selectedItem'] = htmlspecialchars($_POST["btnMoreInfo"]);
            header("Location: /iteminformation");
        } 
        //button to refresh the search engine
        else if (isset($_POST["RefreshBtn"])) {
            header("Location: /main");
        }

        $baseController =  new BaseController();
        $baseController->header();
        require("../view/Main.php");
        $baseController->footer();
    }
    
    
}

