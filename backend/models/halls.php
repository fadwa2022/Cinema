<?php
class Halls
{
    // DB stuff
    private $conn;

    // Post Properties
    public $id;
    public $label;
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
        $query = 'SELECT * FROM `halls`';

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
        $query = 'SELECT * FROM `halls` WHERE `id`= ? LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->label = $row['label'];
        $this->movie = $row['movie'];
        $this->id = $row['id'];
       
    }

    // Create user
    public function create()
    {
        // Create query
        $query = 'INSERT INTO halls SET label = :label, movie = :movie ';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->label = htmlspecialchars(strip_tags($this->label));
        $this->movie = htmlspecialchars(strip_tags($this->movie));

        // Bind data
        $stmt->bindParam(':movie', $this->movie);
        $stmt->bindParam(':label', $this->label);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // update user
    public function update()
    {
        // Create query
        $query = 'UPDATE `halls` SET `label`= :label ,`movie`= :movie   WHERE id=:id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->movie = htmlspecialchars(strip_tags($this->movie));
        $this->label = htmlspecialchars(strip_tags($this->label));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':label', $this->label);
        $stmt->bindParam(':movie', $this->movie);
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
    // Delete user
    public function delete()
    {
        // Create query
        $query = 'DELETE FROM `halls` WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
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
