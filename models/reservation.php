<?php
class Reservation
{
  // DB stuff
  private $conn;

  // Post Properties
  public $id;
  public $costumer;
  public $seat;
  public $hall;
  public $date;

  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Get user
  public function read()
  {
    // Create query
    $query ='SELECT * FROM `reservations`';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  // Get Single user
  public function read_single()
  {
    // Create query
    $query = 'SELECT * FROM `reservations` WHERE `id`= ? LIMIT 0,1';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->id);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set properties
    $this->date = $row['date'];
    $this->hall = $row['hall'];
    $this->seat = $row['seat'];
    $this->id = $row['id'];
    $this->costumer = $row['costumer'];

}

  // Create user
  public function create()
  {
    // Create query
    $query = 'INSERT INTO reservations SET hall = :hall, seat = :seat, costumer = :costumer';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->hall = htmlspecialchars(strip_tags($this->hall));
    $this->seat = htmlspecialchars(strip_tags($this->seat));
    $this->costumer = htmlspecialchars(strip_tags($this->costumer));

    // Bind data
    $stmt->bindParam(':hall', $this->hall);
    $stmt->bindParam(':seat', $this->seat);
    $stmt->bindParam(':costumer', $this->costumer);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

 
  // Delete user
  public function delete() {
    // Create query
    $query = 'DELETE FROM `reservations` WHERE id = :id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
}
}
