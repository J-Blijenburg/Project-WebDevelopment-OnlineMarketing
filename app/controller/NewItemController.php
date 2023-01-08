<?php
require_once("../repositories/UserRepository.php");
require_once("../repositories/ItemRepository.php");
require_once("../repositories/CategoryRepository.php");
require_once("../repositories/ImageRepository.php");
session_start();

class NewItemController
{
    public function newItem()
    {
        $_SESSION['wrongInput'] = false;
        $repository = new ItemRepository();
        $categoryRepository = new CategoryRepository();
        $imageRepository = new ImageRepository();
        $allCategorys = $categoryRepository->getAllCategory();


        if (isset($_POST["ItemCreate"])) {
            if (!(empty($_POST["ItemName"]) && empty($_POST["ItemDescription"]) && empty($_POST["ItemPrice"])  && empty($_POST["ItemFeatures"]))) {
              
                //the current user who is logged in
                $user = unserialize($_SESSION['user']);

                //retreive the given input by the use of POST
                $itemName = htmlspecialchars($_POST["ItemName"]);
                $itemDescription = htmlspecialchars($_POST["ItemDescription"]);
                $itemPrice = htmlspecialchars($_POST["ItemPrice"]);
                $selectedCategory = htmlspecialchars($_POST["inputCategory"]);
                $itemFeatures = htmlspecialchars($_POST["ItemFeatures"]);
                // //send all the information to the repository
                $test = $repository->getAndSetNewItem($itemName, $itemDescription, $itemPrice, $selectedCategory, $user->user_Id, $itemFeatures);

                foreach ($test as $row) {
                    $newItemId =  $row->Item_Id;
                }

                //look for the file path and the get all the information of that file
                $file_count = count($_FILES['ItemUpload']['tmp_name']);

                for ($i = 0; $i < $file_count; $i++) {
                    $filename = $_FILES['ItemUpload']['tmp_name'][$i];
                    $image =  file_get_contents($filename);



                    $imageRepository->setNewImage($image, $newItemId);
                }
                header("Location: /profile");
            } else {
                $_SESSION['wrongInput'] = true;
            }
        } else if (isset($_POST["ItemCancel"])) {
            header("Location: /profile");
        }
        //button to see the profile
        else if (isset($_POST["profileBtn"])) {
            header("Location: /profile");
        }
        //button to logout
        else if (isset($_POST["LogOutBtn"])) {
            $_SESSION['loggedin'] = false;
            header("Location: /main");
        }

        require("../view/NewItem.php");
    }
}
