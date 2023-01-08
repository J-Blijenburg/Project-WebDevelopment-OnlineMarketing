<?php
require_once("../model/User.php");
require_once("../repositories/Repository.php");
class UserRepository extends Repository
{
    public function getAll()
    {
        $stmt = $this->connection->prepare("SELECT * FROM Users");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $users = $stmt->fetchAll();
        return $users;
    }
    public function getUser($userId){
        $stmt = $this->connection->prepare("SELECT * FROM Users WHERE User_Id = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $users = $stmt->fetchAll();
        return $users;
    }
    public function getUserByEmail($email){
        $stmt = $this->connection->prepare("SELECT * FROM Users WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $users = $stmt->fetchAll();
        return $users;
    }


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
