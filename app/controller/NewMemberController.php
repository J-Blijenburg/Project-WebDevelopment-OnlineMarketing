<?php
require_once("../repositories/UserRepository.php");

class NewMemberController
{
   
    public function newMember()
    {
        $repository = new UserRepository();
        $User = $repository->getAll();

        if(isset($_POST["BackBtn"])){
            header("Location: /login");
        }
        else if(isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["password"])){
       
            $firstName = htmlspecialchars($_POST["firstname"]);
            $lastName = htmlspecialchars($_POST["lastname"]);
            $email = htmlspecialchars($_POST["email"]);
            $password = htmlspecialchars($_POST["password"]);
            

            $repository->setNewMember($firstName, $lastName, $email, $password);

            header("Location: /login");
        }

        require("../view/NewMember.php");
        
    }
}
