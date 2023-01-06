<?php
require_once("../repositories/UserRepository.php");
require_once("../repositories/ItemRepository.php");
require_once("../repositories/CategoryRepository.php");
session_start();

class NewItemController
{
    public function newItem()
    {
        $repository = new ItemRepository();
        $categoryRepository = new CategoryRepository();
        $allCategorys = $categoryRepository->getAllCategory();

        if(isset($_POST["ItemCreate"])){
            //retreive the given input by the use of POST
            $itemName = htmlspecialchars($_POST["ItemName"]);
            $itemDescription = htmlspecialchars($_POST["ItemDescription"]);
            $itemPrice = htmlspecialchars($_POST["ItemPrice"]);
            $selectedCategory = htmlspecialchars($_POST["inputCategory"]);
            $itemFeatures = htmlspecialchars($_POST["ItemFeatures"]);
            
            //look for the file path and the get all the information of that file
            $filename = $_FILES['ItemUpload']['tmp_name'];
            $image =  file_get_contents($filename);

            //send all the information to the repository
            $repository->setNewItem($itemName, $itemDescription, $itemPrice, $selectedCategory, $image, $itemFeatures);
        }

        else if (isset($_POST["ItemCancel"])) {
            header("Location: /profile");
        }
         //button to see the profile
         else if(isset($_POST["profileBtn"])){
            header("Location: /profile");
        }
        //button to logout
        else if(isset($_POST["LogOutBtn"])){
            $_SESSION['loggedin'] = false;
            header("Location: /main");
        }

        require("../view/NewItem.php");
    }
}
