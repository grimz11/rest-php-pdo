<?php
  class Database {
    private $host = 'localhost';
    private $db_name = 'rest_blog';
    private $username= 'admin';
    private $password = 'Hello101!';
    private $conn;

    public function connect() {
      $this->conn = null;

      try {
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);

        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      }catch(PDOException $err) {
        echo $err->getMessage();
      }
      return $this->conn;
    }
  }