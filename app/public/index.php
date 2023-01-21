<?php
require __DIR__ . '/../routing/SwitchRouter.php';

$url = $_SERVER['REQUEST_URI'];

$router = new SwitchRouter();
$router->route($url);