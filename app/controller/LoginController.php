<?php
require_once("../repositories/UserRepository.php");


class LoginController{
   

    public function login(){
        $repository = new UserRepository();
        $users = $repository->getAll();
        
        

        require("../view/Login.php");
      
        if (isset($_POST['action'])) {
            if (isset($_POST["username"]) && isset($_POST["password"])) {
                $username = htmlspecialchars($_POST["username"]);
                $password = htmlspecialchars($_POST["password"]);
    
                foreach ($users as $row) {
           
                    
                    if ($row->FirstName == $username && $row->Password == $password) {
                        echo "jahoor";
                    }
                }
            }
            
            
        }
    }


}