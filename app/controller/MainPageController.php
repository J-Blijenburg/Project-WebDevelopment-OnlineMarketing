<?php
require_once("../repositories/ItemRepository.php");
class MainPageController{
    public function mainPage(){
        $repository = new ItemRepository();
        $items = $repository->getAll();

        require("../view/MainPage.php");
    }
}