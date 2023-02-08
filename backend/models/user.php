<?php
class User
{
  // DB stuff
  private $conn;
  private $table = 'users';

  // Post Properties
  public $id;
  public $identifier;
  public $full_name;
  public $email;
  public $password;
  public $role;

  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Get user
  public function read()
  {
    // Create query
    $query ='SELECT * FROM `users`';

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
    $query = 'SELECT * FROM `users` WHERE `id`= ? LIMIT 0,1';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->id);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set properties
    $this->identifier = $row['identifier'];
    $this->full_name = $row['full_name'];
    $this->email = $row['email'];
    $this->id = $row['id'];
    $this->password = $row['password'];
    $this->role = $row['role'];

}

  // Create user
  public function create()
  {
    // Create query
    $query = 'INSERT INTO users SET identifier = :identifier, full_name = :full_name, email = :email, password = :password';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->identifier = htmlspecialchars(strip_tags($this->identifier));
    $this->full_name = htmlspecialchars(strip_tags($this->full_name));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->password = htmlspecialchars(strip_tags($this->password));

    // Bind data
    $stmt->bindParam(':identifier', $this->identifier);
    $stmt->bindParam(':full_name', $this->full_name);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':password', $this->password);

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
    $query = 'UPDATE `users` SET `full_name`= :full_name ,`email`= :email ,`password`=:password  WHERE id=:id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->full_name = htmlspecialchars(strip_tags($this->full_name));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->password = htmlspecialchars(strip_tags($this->password));
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':full_name', $this->full_name);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':password', $this->password);
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
  public function delete() {
    // Create query
    $query = 'DELETE FROM `users` WHERE id = :id';

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
