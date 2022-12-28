<?php
require_once("../repositories/UserRepository.php");

class NewMemberController
{
   
    public function newMember()
    {
        $repository = new UserRepository();
        $User = $repository->getAll();


        require("../view/NewMember.php");
        
    }
}
