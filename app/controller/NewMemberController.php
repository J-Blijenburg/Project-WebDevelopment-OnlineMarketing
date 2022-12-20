<?php
require_once("../repositories/UserRepository.php");

class MainMemberController
{
   
    public function main()
    {
        $repository = new UserRepository();
        $User = $repository->getAll();


        require("../view/NewMember.php");
        
    }
}
