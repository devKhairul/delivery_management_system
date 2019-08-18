<?php

class Database
{
  private $username = 'root';
  private $password = '';

  public $conn;

  public function getConnection()
  {

    try
    {
      $this->conn = new PDO("mysql:host=localhost;dbname=sf_ticket", "$this->username", "$this->password");
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e)
    {
      echo "Connection failed: " . $e->getMessage();
    }

    return $this->conn;


  }
}





?>
