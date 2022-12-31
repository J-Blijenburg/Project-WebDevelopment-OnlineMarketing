<?php
require_once("../repositories/UserRepository.php");
require_once("../repositories/ItemRepository.php");
require_once("../repositories/BidRepository.php");
session_start();

class ItemInformationController
{

    public function itemInformation()
    {
        $itemRepository = new ItemRepository();
        $userRepository = new UserRepository();
        $bidRepository = new BidRepository();
        $itemId = 1;
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
        }


        require("../view/ItemInformation.php");
    }
}
