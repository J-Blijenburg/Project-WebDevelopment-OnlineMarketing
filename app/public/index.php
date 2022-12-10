<?php
$url = $_SERVER["REQUEST_URI"];

//uses the require function to implement the MainPageController
require("../controller/MainPageController.php");

switch ($url) {
    case "/mainpage":
        $controller = new MainPageController();
        $controller -> mainPage();
        break;
    default;
        http_response_code(404);
}
