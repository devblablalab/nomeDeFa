<?php

$servername = "localhost";
$username = "username";
$password = "password";

class ConnectionManager {
  private static $instance = null;
  private $connection;

  private function __construct() 
  {
      $dsn = 'mysql:host=localhost;dbname=nomedefa';
      $username = 'root';
      $password = '';

      try {
          $this->connection = new PDO($dsn, $username, $password);
          $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
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