<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "twig_login";
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Database connection failed: " . $e->getMessage();
            exit;
        }
    }

    public function prepare($query) {
        try {
            return $this->conn->prepare($query);
        } catch(PDOException $e) {
            echo "Query preparation failed: " . $e->getMessage();
            exit;
        }
    }

    public function execute($stmt, $params = []) {
        try {
            $stmt->execute($params);
            return $stmt;
        } catch(PDOException $e) {
            echo "Query execution failed: " . $e->getMessage();
            exit;
        }
    }
}

?>