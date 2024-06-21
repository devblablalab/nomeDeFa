<?php
namespace classes;

use PDO;

class ConnectionManager {
    private static $instance = null;
    private $connection;

    private function __construct() 
    {
        $dbName = $_ENV['dbname'] ?? '';
        $dsn = "mysql:host=localhost;dbname={$dbName}";
        $username = $_ENV['dbusername'];
        $password = $_ENV['dbpassword'];

        try {
            $this->connection = new PDO($dsn, $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function getInstance() 
    {
        if (self::$instance === null) {
            if (!self::$instance) {
                self::$instance = new ConnectionManager();
            }
        }
        return self::$instance;
    }

    public function getConnection() 
    {
        return $this->connection;
    }
}