<?php
require_once("../repositories/UserRepository.php");


class LoginController{
   

    public function login(){
        $repository = new UserRepository();
        $users = $repository->getAll();
        
        
        
      
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $username = htmlspecialchars($_POST["username"]);
            $password = htmlspecialchars($_POST["password"]);

            foreach ($users as $row) {
       
                
                if ($row->FirstName == $username && $row->Password == $password) {
                    header("Location: /main");
                }
            }
        }

        else if(isset($_POST["ContinueAsGuestBtn"])){
            header("Location: /main");
        }

        else if(isset($_POST["NewMemberBtn"])){
            header("Location: /main");
        }

        require("../view/Login.php");
    }


}