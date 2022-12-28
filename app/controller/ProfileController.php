<?php
require_once("../repositories/UserRepository.php");
require_once("../repositories/ItemRepository.php");
session_start();

class ProfileController{
    public function profile(){
        require("../view/Profile.php");
    }
}