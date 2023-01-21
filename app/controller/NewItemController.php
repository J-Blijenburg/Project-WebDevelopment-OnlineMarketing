<?php
require_once("../repositories/UserRepository.php");
require_once("../repositories/ItemRepository.php");
require_once("../repositories/CategoryRepository.php");
require_once("../repositories/ImageRepository.php");

class NewItemController
{
    public function newItem()
    {
        //This session is to display an error if the user has logged in uncorrectly
        $_SESSION['wrongInput'] = false;

        //get the needed repository to load the page
        $repository = new ItemRepository();
        $categoryRepository = new CategoryRepository();
        $imageRepository = new ImageRepository();

        $minimumImages = 2;

        //get every category there is from the database
        $allCategorys = $categoryRepository->getAllCategory();

        //When the button Create item is clicked. It will check if the user has filled in certain values
        if (isset($_POST["ItemCreate"])) {
            if (!(empty($_POST["ItemName"]) || empty($_POST["ItemDescription"]) || empty($_POST["ItemPrice"])  || empty($_POST["ItemFeatures"]))) {
                if (count($_FILES['ItemUpload']['tmp_name']) >= $minimumImages ) {
                    //the current user who is logged in
                    $user = unserialize($_SESSION['user']);

                    //retreive the given input by the use of POST
                    $itemName = htmlspecialchars($_POST["ItemName"]);
                    $itemDescription = htmlspecialchars($_POST["ItemDescription"]);
                    $itemPrice = htmlspecialchars($_POST["ItemPrice"]);
                    $itemPrice = str_replace(",",".",$itemPrice);
                    $selectedCategory = htmlspecialchars($_POST["inputCategory"]);
                    $itemFeatures = htmlspecialchars($_POST["ItemFeatures"]);
                    //send all the information to the repository
                    $createdNewItem = $repository->getAndSetNewItem($itemName, $itemDescription, $itemPrice, $selectedCategory, $user->user_Id, $itemFeatures);

                    //look for the file path and the get all the information of that file. Count the amount of files


                    $fileCount = count($_FILES['ItemUpload']['tmp_name']);

                    //loop through every single file and upload the image to the database 
                    for ($i = 0; $i < $fileCount; $i++) {
                        $filename = $_FILES['ItemUpload']['tmp_name'][$i];
                        $image =  file_get_contents($filename);
                        $imageRepository->setNewImage($image, $createdNewItem[0]->Item_Id);
                    }
                    header("Location: /profile");
                } else {
                    //if the user didnt fill in all the required fields then a error message will appear
                    $_SESSION['wrongInput'] = true;
                }
            } else {
                //if the user didnt fill in all the required fields then a error message will appear
                $_SESSION['wrongInput'] = true;
            }
        } else if (isset($_POST["ItemCancel"])) {
            header("Location: /profile");
        }

        $baseController =  new BaseController();
        $baseController->header();
        require("../view/NewItem.php");
        $baseController->footer();
    }
}
