<?php
require_once("../repositories/UserRepository.php");
// require __DIR__ . '../services/LoginService.php';

session_start();

class LoginController{
   

    public function login(){
        $repository = new UserRepository();
        //This session is to display an error if the user has logged in uncorrectly
        $_SESSION['wrongLogin'] = false;
        
    
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $email = htmlspecialchars($_POST["email"]);
            $password = htmlspecialchars($_POST["password"]);
            
            $users = $repository->getUserByEmail($email);

            //by using password verify you can compare the hashed pasword from the database with the password input
            if ($users[0]->Email == $email && password_verify($password, $users[0]->Password)) {
                  
                //Get the user from the database and place it in an object
                $user = new User();
                $user->user_Id = $users[0]->User_Id;
                $user->firstName = $users[0]->FirstName;
                $user->lastName = $users[0]->LastName;
                $user->email = $users[0]->Email;
                $user->password = $users[0]->Password;
                
                //that object is placed in an session so can get the user from every page
                $_SESSION["user"] = serialize($user);
                $_SESSION['loggedin'] = true;
                header("Location: /main");
            }
            else{
                $_SESSION['wrongLogin'] = true;
            }
        }
        //The button lets the user go back to the main page without logged in
        else if(isset($_POST["ContinueAsGuestBtn"])){
            $_SESSION['loggedin'] = false;
            header("Location: /main");
        }

        //the button goes to the page where a new user can be created
        else if(isset($_POST["NewUserBtn"])){
            header("Location: /newuser");
        }

        require("../view/Login.php");
    }


}