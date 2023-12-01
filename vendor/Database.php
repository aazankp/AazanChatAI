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

    public function insertChat()
    {
        $this->query = "INSERT INTO chat (chatName, addedBy) values ('myChat', '1')";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function insertChatRoom($question, $answer)
    {
        $question = mysqli_real_escape_string($this->conn, $question);
        $answer = mysqli_real_escape_string($this->conn, $answer);
        $this->query = "INSERT INTO chatroom (chatId, question, answer) VALUES ('1', '$question', '$answer')";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function fetchChatRoom()
    {
        $this->query = "SELECT * FROM chatroom WHERE chatId='1'";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }
}

?>