<?php
class Movies
{
    // DB stuff
    private $conn;

    // Post Properties
    public $id;
    public $title;
    public $image;
    public $description;
    public $Mdate;
    public $ID_ha;

    


    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get user
    public function read()
    {
        // Create query
        $query = 'SELECT * FROM `movie`';
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
        $query = 'SELECT * FROM movie WHERE Mdate = :Mdate ';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':Mdate', $this->Mdate);

        // Execute query
        $stmt->execute();
      
        return $stmt;
       
    }

    // Create user
    public function create()
    {
        // Create query
        $query = 'INSERT INTO movie SET description = :description, image = :image, title = :title';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->title = htmlspecialchars(strip_tags($this->title));

        // Bind data
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':title', $this->title);

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
        $query = 'UPDATE `movie` SET `image`= :image ,`description`= :description ,`title`=:title  WHERE id=:id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':title', $this->title);
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
        $query = 'DELETE FROM `movie` WHERE id = :id';

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
