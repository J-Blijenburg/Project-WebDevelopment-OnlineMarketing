<?php
class SwitchRouter
{
    public function route($url)
    {
        session_start();
        //The basecontroller will display the base of most pages
        require_once("../controller/BaseController.php");
        switch ($url) {
            case "/":
            case "/main":
                require_once("../controller/MainController.php");
                $controller = new MainController();
                $controller->main();
                break;
            case "/login":
                require_once("../controller/LoginController.php");
                $controller = new LoginController();
                $controller->login();
                break;
            case "/newuser":
                require_once("../controller/NewUserController.php");
                $controller = new NewUserController();
                $controller->newUser();
                break;
            case "/profile":
                $this->checkLogin();
                require_once("../controller/ProfileController.php");
                $controller = new ProfileController();
                $controller->profile();
                break;
            case "/newitem":
                $this->checkLogin();
                require_once("../controller/NewItemController.php");
                $controller = new NewItemController();
                $controller->newItem();
                break;

            case "/iteminformation":
                require_once("../controller/ItemInformationController.php");
                $controller = new ItemInformationController();
                $controller->itemInformation();
                break;
            case "/api/bid":
                require_once("../api/Controllers/BidController.php");
                $controller = new BidController();
                $controller->getBidByItemId($_SESSION['selectedItem']);
                break;
            default;
                http_response_code(404);
        }

    }

    //if the user wants to go to a page without being logged in, it will change the url to the login page
    public function checkLogin(){
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
            header("Location: /login");
        }
    }
}
