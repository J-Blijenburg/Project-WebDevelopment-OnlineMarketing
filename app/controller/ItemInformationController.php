<?php
require_once("../repositories/UserRepository.php");
require_once("../repositories/ItemRepository.php");
require_once("../repositories/BidRepository.php");
require_once("../repositories/ImageRepository.php");
session_start();

class ItemInformationController
{

    public function itemInformation()
    {
        //When opening the information page always make sure it doesnt start in 'edit mode'
        $_SESSION['editItem'] = false;
        $_SESSION['validInput'] = false;
        
        //the current user who is logged in
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
        }
        //Get every needed repository
        $itemRepository = new ItemRepository();
        $bidRepository = new BidRepository();
        $imageRepository = new ImageRepository();
        
        //When going from the itemlist page this session will receive the selected item ID.
        $itemId = $_SESSION['selectedItem'];

        $item = $itemRepository->getItemById($itemId);
        $itemBiddings = $bidRepository->getBiddingById($itemId);
        $itemImages = $imageRepository->getAllImageByItemId($itemId);

        
        //button to place a bid on the item
        if (isset($_POST["txtBidPrice"])) {
            $bidPrice = htmlspecialchars($_POST["txtBidPrice"]);
            if (is_numeric($bidPrice)) {
                $bidRepository->setNewBid($bidPrice, $itemId, $user->user_Id);
                $_SESSION['validInput'] = false;
            } else {
                $_SESSION['validInput'] = true;
            }
            header("Location: /iteminformation");
        }
        //when clicked the user will remove the item
        else if (isset($_POST["btnDeleteItem"])) {
            $itemRepository->DeleteItem($itemId);
            header("Location: /profile");
        }
        //when clicked go to the edit version
        else if (isset($_POST["btnEditItem"])) {
            $_SESSION['editItem'] = true;
        }
        //Button to change the values of the item
        else if (isset($_POST["btnSaveItem"])) {
            $itemName = htmlspecialchars($_POST["itemName"]);
            $itemPrice = htmlspecialchars($_POST["itemPrice"]);
            $itemDescription = htmlspecialchars($_POST["itemDescription"]);

            $itemRepository->EditItemById($itemId, $itemName, $itemDescription, $itemPrice);
            header("Location: /iteminformation");
        }
        //When clicked the user will 'sell' the item to the other user
        else if (isset($_POST["btnSellItem"])) {
            $soldItemId = htmlspecialchars($_POST["btnSellItem"]);
            $itemRepository->DeleteItem($soldItemId);

            header("Location: /profile");
        }
       

        $baseController =  new BaseController();
        $baseController->header();
        require("../view/ItemInformation.php");
        $baseController->footer();
    }
}
