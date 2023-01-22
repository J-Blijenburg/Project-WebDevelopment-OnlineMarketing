<?php
require_once("../repositories/UserRepository.php");

class NewUserController
{
   
    public function newUser()
    {
        //This session is to display an error if the user has logged in uncorrectly
        $_SESSION['wrongInput'] = false;

        //get the needed repository to load the page
        $repository = new UserRepository();

        //When button is clicked the user will go back to the previous page
        if(isset($_POST["BackBtn"])){
            header("Location: /login");
        }
        //when button is clicked the system will check if all the value is filled in
        else if(isset($_POST["NewUserBtn"])){
            if(!(empty($_POST["firstname"]) && empty($_POST["lastname"]) && empty($_POST["email"]) && empty($_POST["password"]))){
                $firstName = htmlspecialchars($_POST["firstname"]);
                $lastName = htmlspecialchars($_POST["lastname"]);
                $email = htmlspecialchars($_POST["email"]);
                $password = htmlspecialchars($_POST["password"]);
                
                //before storing the password into the database. This will make sure the password will be hashed
                $password = password_hash($password, PASSWORD_DEFAULT);
    
                //Create a new user with the given values
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
