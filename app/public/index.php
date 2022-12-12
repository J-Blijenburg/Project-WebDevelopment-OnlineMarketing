<?php
$url = $_SERVER["REQUEST_URI"];

//uses the require function to implement the MainPageController
require_once("../controller/LoginController.php");
require_once("../controller/MainController.php");

switch ($url) {
    case "/":
    case "/MainPage?":
        $controller = new MainController();
        $controller->main();
        break;
    case "/login?":
        $controller = new LoginController();
        $controller->login();
        break;
    default;
        http_response_code(404);
}


