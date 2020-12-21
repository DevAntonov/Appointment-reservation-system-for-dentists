<?php

namespace Src\Utils;

class DBConnector {
    private static $instance = null;
    private $conn = null;

    public function __construct() {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $db   = $_ENV['DB_DATABASE'];
        $user = $_ENV['DB_USERNAME'];
        $pass = $_ENV['DB_PASSWORD'];

        try {
            $this->conn = new \PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
        } catch (\PDOException $e) {
            exit ($e->getMessage());
        }
    }

    public function getInstance() {
        if (!self::$instance) {
            self::$instance = new DBConnector();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}
