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
        $item = $itemRepository->getItem($itemId);
        $itemBiddings = $bidRepository->getItemBiddings($itemId);

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



        require("../view/ItemInformation.php");
    }
}
