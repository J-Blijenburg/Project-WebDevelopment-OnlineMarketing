<?php
$url = $_SERVER["REQUEST_URI"];

//uses the require function to implement the MainPageController

switch ($url) {
    case "/":
    case "/MainGuest":
        require_once("../controller/MainGuestController.php");
        $controller = new MainGuestController();
        $controller->main();
        break;
    case "/MainMember":
        require_once("../controller/MainMemberController.php");
        $controller = new MainMemberController();
        $controller->main();
        break;
    case "/login":
        require_once("../controller/LoginController.php");
        $controller = new LoginController();
        $controller->login();
        break;
    default;
        http_response_code(404);
}


