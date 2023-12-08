<?php

class Database {
    private $hostName = "localhost";
    private $rootName = "root";
    private $password = "";
    private $dbName = "chatai";
    private $conn = null;
    private $query = null;
    private $result = null;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->hostName, $this->rootName, $this->password, $this->dbName);
        if (mysqli_connect_errno()) {
            die("Connection Failed!");
        }
    }

    public function insertChat($chatName, $addedBy)
    {
        $this->query = "INSERT INTO chat (chatName, addedBy) values ('$chatName', '$addedBy')";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function fetchChat($ActiveUser)
    {
        $this->query = "SELECT * FROM chat WHERE addedBy='$ActiveUser' ORDER BY chatId DESC";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function updateChat($question, $chatId)
    {
        $this->query = "UPDATE chat SET chatName='$question' WHERE chatId='$chatId'";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function insertChatRoom($chatId, $question, $answer)
    {
        $question = mysqli_real_escape_string($this->conn, $question);
        $answer = mysqli_real_escape_string($this->conn, $answer);
        $this->query = "INSERT INTO chatroom (chatId, question, answer) VALUES ('$chatId', '$question', '$answer')";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function fetchChatRoom($chatId)
    {
        $this->query = "SELECT * FROM chatroom WHERE chatId='$chatId'";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }
    
    public function insertUsers($img_name, $fullName, $email, $password)
    {
        $this->query = "INSERT INTO users (profile, name, email, password) values ('$img_name', '$fullName', '$email', '$password')";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function fetchUser($email, $password)
    {
        $this->query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }
}

?>