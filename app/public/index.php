<?php
$url = $_SERVER["REQUEST_URI"];

//uses the require function to implement the MainPageController
require_once("../controller/LoginPageController.php");
require_once("../controller/MainPageController.php");

switch ($url) {
    case "/":
    case "/MainPage":
        $controller = new MainPageController();
        $controller->mainPage();
        break;
    case "/login":
        $controller = new LoginPageController();
        $controller->loginPage();
        break;
    default;
        http_response_code(404);
}
