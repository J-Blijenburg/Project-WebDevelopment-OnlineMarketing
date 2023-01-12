<?php
//The basecontroller will display the base of most pages
require_once("../controller/BaseController.php");
$url = $_SERVER["REQUEST_URI"];


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
        require_once("../controller/ProfileController.php");
        $controller = new ProfileController();
        $controller->profile();
        break;
    case "/newitem":
        require_once("../controller/NewItemController.php");
        $controller = new NewItemController();
        $controller->newItem();
        break;
    case "/iteminformation":
        require_once("../controller/ItemInformationController.php");
        $controller = new ItemInformationController();
        $controller->itemInformation();
        break;
    case "/api/item":
        require_once("../api/Controllers/ItemController.php");
        $controller = new ItemController();
        $controller->index();
        break;
    default;
        http_response_code(404);
}
