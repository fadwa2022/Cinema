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
    $query = 'SELECT p.id ,p.hall,p.reserver ,h.movie FROM places p ,halls h WHERE p.hall=? AND p.hall=h.id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->hall);


    // Execute query
    $stmt->execute();

    return $stmt;
}


    // Create user
    public function update()
    {
        // Create query
        $query = 'UPDATE `places` SET `reserver`=:reserver WHERE id=:id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->reserver = htmlspecialchars(strip_tags($this->reserver));

        // Bind data
        $stmt->bindParam(':reserver', $this->reserver);
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}
