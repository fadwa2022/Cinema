<?php
class Reservation
{
  // DB stuff
  private $conn;

  // Post Properties
  public $id;
  public $costumer;
  public $seat;
  public $date;
  public $movie;
  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Get user
  public function read()
  {

    // Create query
    $query ='SELECT r.id,r.costumer,r.seat,r.date,r.movie as id_movie ,m.title,m.image FROM reservations r,movie m WHERE costumer=:costumer AND r.movie=m.id;';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':costumer', $this->costumer);
   
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
    $this->seat = $row['seat'];
    $this->id = $row['id'];
    $this->costumer = $row['costumer'];

}

  // Create user
  public function create()
  {
    // Create query
    $query = 'INSERT INTO reservations SET  seat = :seat, costumer = :costumer, movie=:movie';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->seat = htmlspecialchars(strip_tags($this->seat));
    $this->costumer = htmlspecialchars(strip_tags($this->costumer));
    $this->movie = htmlspecialchars(strip_tags($this->movie));

    // Bind data
    $stmt->bindParam(':seat', $this->seat);
    $stmt->bindParam(':costumer', $this->costumer);
    $stmt->bindParam(':movie', $this->movie);


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
