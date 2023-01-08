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
        $itemRepository = new ItemRepository();
        $userRepository = new UserRepository();
        $bidRepository = new BidRepository();
        $imageRepository = new ImageRepository();
        $itemId = $_SESSION['selectedItem'];
        $item = $itemRepository->getItemById($itemId);
        $itemBiddings = $bidRepository->getBiddingById($itemId);
        $itemImages = $imageRepository->getAllImageByItemId($itemId);


        //button to login
        if (isset($_POST["LoginBtn"])) {
            header("Location: /login");
        }
        //button to signup
        else if (isset($_POST["SignUpBtn"])) {
            header("Location: /newuser");
        }
        //button to logout
        else if (isset($_POST["LogOutBtn"])) {
            $_SESSION['loggedin'] = false;
            header("Location: /iteminformation");
        }
        //button to see the profile
        else if (isset($_POST["profileBtn"])) {
            header("Location: /profile");
        }
        //button to place a bid on the item
        else if (isset($_POST["txtBidPrice"])) {
            $bidPrice = htmlspecialchars($_POST["txtBidPrice"]);
            if(is_numeric($bidPrice)){
                $bidRepository->setNewBid($bidPrice, $itemId, $user->user_Id);
                $_SESSION['validInput'] = false;
            }
            else {
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
        //creats an new item
        else if (isset($_POST["NewItemBtn"])) {
            header("Location: /newitem");
        }




        require("../view/ItemInformation.php");
    }
}
