<?php
require_once("../repositories/UserRepository.php");
require_once("../repositories/ItemRepository.php");
require_once("../repositories/BidRepository.php");
session_start();

class ItemInformationController
{

    public function itemInformation()
    {
        //When opening the information page always make sure it doesnt start in 'edit mode'
        $_SESSION['editItem'] = false;

        $itemRepository = new ItemRepository();
        $userRepository = new UserRepository();
        $bidRepository = new BidRepository();
        $itemId = $_SESSION['selectedItem'];
        $item = $itemRepository->getItemById($itemId);
        $itemBiddings = $bidRepository->getBiddingById($itemId);

        //the current user who is logged in
        $user = unserialize($_SESSION['user']);

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
        //button to see the profile
        else if (isset($_POST["txtBidPrice"])) {
            $bidPrice = htmlspecialchars($_POST["txtBidPrice"]);
            $bidRepository->setNewBid($bidPrice, $itemId, $user->user_Id);
        } else if (isset($_POST["btnDeleteItem"])) {
            $itemRepository->DeleteItem($itemId);
            header("Location: /profile");
        } else if (isset($_POST["btnEditItem"])) {
            $_SESSION['editItem'] = true;
        }
        //Button to change the values of the item
        else if (isset($_POST["btnSaveItem"])) {
            $itemName = htmlspecialchars($_POST["itemName"]);
            $itemPrice = htmlspecialchars($_POST["itemPrice"]);
            $itemDescription = htmlspecialchars($_POST["itemDescription"]);

            $itemRepository->EditItemById($itemId, $itemName, $itemDescription, $itemPrice);
        }


        require("../view/ItemInformation.php");
    }
}
