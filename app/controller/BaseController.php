<?php
require __DIR__ . '/../services/BidService.php';

class BaseController
{
    public function header()
    {
        //button to login
        if (isset($_POST["LoginBtn"])) {
            header("Location: /login");
        }
        //button to signup
        else if (isset($_POST["SignUpBtn"])) {
            header("Location: /newuser");
        }
        //creats an new item
        else if (isset($_POST["NewItemBtn"])) {
            header("Location: /newitem");
        }
        //button to logout
        else if (isset($_POST["LogOutBtn"])) {
            $_SESSION['loggedin'] = false;
            header("Location: /main");
        }
        //button to see the profile
        else if (isset($_POST["profileBtn"])) {
            header("Location: /profile");
        }
        //button to get more info about the item
        if (isset($_POST["btnMoreInfo"])) {
            $_SESSION['selectedItem'] = htmlspecialchars($_POST["btnMoreInfo"]);
            header("Location: /iteminformation");
        }

        require("../view/Header.php");
    }

    //this method will show the footer
    public function footer()
    {
        require("../view/Footer.php");
    }

    //this method will show the item list
    public function ItemList()
    {
        //the current user who is logged in
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
        }
        $imageRepository = new ImageRepository();
        $repository = new ItemRepository();

        //depends which items will display. This is done by looking at the controller.
        if ($_SESSION['controller'] == "Profile") {
            $items = $repository->getUserItems($user->user_Id);
        } else {
            $items = $repository->getAll();
        }
        require("../view/ItemList.php");
    }
}
