<?php
class Actors
{
    // DB stuff
    private $conn;

    // Post Properties
    public $id;
    public $name;
    public $image;


    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get user
    public function read()
    {
        // Create query
        $query = 'SELECT * FROM `actors`';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

}
