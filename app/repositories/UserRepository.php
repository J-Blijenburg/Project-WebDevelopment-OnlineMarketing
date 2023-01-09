<?php
require_once("../model/User.php");
require_once("../repositories/Repository.php");
class UserRepository extends Repository
{
    //get all the users from the database
    public function getAll()
    {
        $stmt = $this->connection->prepare("SELECT * FROM Users");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $users = $stmt->fetchAll();
        return $users;
    }
    //get a single user by using a userId
    public function getUserById($userId){
        $stmt = $this->connection->prepare("SELECT * FROM Users WHERE User_Id = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $users = $stmt->fetchAll();
        return $users;
    }

    //get a single user by email
    public function getUserByEmail($email){
        $stmt = $this->connection->prepare("SELECT * FROM Users WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $users = $stmt->fetchAll();
        return $users;
    }

    //create a new user
    public function setNewUser($firstName, $lastName, $email, $password)
    {       
        $query = $this->connection->prepare("INSERT INTO Users
        (FirstName, LastName, Email, Password) VALUES (:FirstName, :LastName, :Email, :Password)");
        $query->bindParam(':FirstName', $firstName);
        $query->bindParam(':LastName', $lastName);
        $query->bindParam(':Email', $email);
        $query->bindParam(':Password', $password);

        $query->execute();
    }
}
