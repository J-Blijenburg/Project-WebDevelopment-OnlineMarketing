<?php
require_once("../repositories/UserRepository.php");
require_once("../repositories/ItemRepository.php");
session_start();

class NewItemController
{
    public function newItem()
    {
        $repository = new ItemRepository();

        if (isset($_POST["ItemName"]) && isset($_POST["ItemDescription"]) && isset($_POST["ItemPrice"]) && isset($_FILES["ItemUpload"])) {
            $itemName = htmlspecialchars($_POST["ItemName"]);
            $itemDescription = htmlspecialchars($_POST["ItemDescription"]);
            $itemPrice = htmlspecialchars($_POST["ItemPrice"]);

            //look for the file path and the get all the information of that file
            $filename = $_FILES['ItemUpload']['tmp_name'];
            $itemUpload = addslashes(file_get_contents($filename));
   
            //send all the information to the repository
            $repository->setNewItem($itemName, $itemDescription, $itemPrice, $itemUpload);
  

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
