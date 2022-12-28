<?php
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
    case "/newMember":
        require_once("../controller/NewMemberController.php");
        $controller = new NewMemberController();
        $controller->newMember();
        break;
    case "/profile":
        require_once("../controller/ProfileController.php");
        $controller = new ProfileController();
        $controller->profile();
        break;
    default;
        http_response_code(404);
}


