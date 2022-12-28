<?php
require_once("../repositories/UserRepository.php");
session_start();

class LoginController{
   

    public function login(){
        $repository = new UserRepository();
        $users = $repository->getAll();
        
        
        
      
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $email = htmlspecialchars($_POST["email"]);
            $password = htmlspecialchars($_POST["password"]);

            foreach ($users as $row) {               
                if ($row->Email == $email && $row->Password == $password) {
                  
                    $user = new User();
                    $user->user_Id = $row->User_Id;
                    $user->firstName = $row->FirstName;
                    $user->lastName = $row->LastName;
                    $user->email = $row->Email;
                    $user->password = $row->Password;
                    

                    $_SESSION["user"] = serialize($user);
                    $_SESSION['loggedin'] = true;
                    header("Location: /main");
                }
            }
        }

        else if(isset($_POST["ContinueAsGuestBtn"])){
            $_SESSION['loggedin'] = false;
            header("Location: /main");
        }

        else if(isset($_POST["NewMemberBtn"])){
            header("Location: /newMember");
        }

        require("../view/Login.php");
    }


}