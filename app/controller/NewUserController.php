<?php
require_once("../repositories/UserRepository.php");

class NewUserController
{
   
    public function newUser()
    {
        $_SESSION['wrongInput'] = false;
        $repository = new UserRepository();
        $User = $repository->getAll();

        if(isset($_POST["BackBtn"])){
            header("Location: /login");
        }
        else if(isset($_POST["NewUserBtn"])){
            if(!(empty($_POST["firstname"]) && empty($_POST["lastname"]) && empty($_POST["email"]) && empty($_POST["password"]))){
                $firstName = htmlspecialchars($_POST["firstname"]);
                $lastName = htmlspecialchars($_POST["lastname"]);
                $email = htmlspecialchars($_POST["email"]);
                $password = htmlspecialchars($_POST["password"]);
                
                $password = password_hash($password, PASSWORD_DEFAULT);
    
                $repository->setNewUser($firstName, $lastName, $email, $password);
                header("Location: /login");
                }
                else{
                    $_SESSION['wrongInput'] = true;
                
                }
        }
      
       



        require("../view/NewUser.php");
        
    }
}
