<?php
require_once("../repositories/UserRepository.php");
require_once("../repositories/ItemRepository.php");
require_once("../repositories/CategoryRepository.php");
require_once("../repositories/ImageRepository.php");

class MainController
{
    public function main()
    {
        //set the needed session value to false. This only apply's the first time the application starts
        if (!isset($_SESSION['loggedin'])) {
            $_SESSION['loggedin'] = false;
        }

        //get the needed repository to load the page
        $categoryRepository = new CategoryRepository();
        
        //get every category there is from the database
        $allCategorys = $categoryRepository->getAllCategory();

        //Session controller make sure that the right itemlist will be displayed
        $_SESSION['controller'] = "Main";

        //button to refresh the search engine
        if (isset($_POST["RefreshBtn"])) {
            header("Location: /main");
        }
        //button to get more info about the item
        else if (isset($_POST["btnMoreInfo"])) {
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
