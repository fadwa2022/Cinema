<?php
class Places
{
  // DB stuff
  private $conn;

  // Post Properties
  public $id;
  public $hall;
  public $reserver;


  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

public function read()
{
    // Create query
    $query = 'SELECT * FROM `places` WHERE `hall`= ?';

    // Prepare statement
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->hall);


    // Execute query
    $stmt->execute();

    return $stmt;
}


}
