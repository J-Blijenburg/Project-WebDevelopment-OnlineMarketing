<?php
require_once("../repositories/ItemRepository.php");

class MainMemberController
{
   
    public function main()
    {
        $repository = new ItemRepository();
        $items = $repository->getAll();


        require_once("../view/MainMember.php");
        
    }
}
