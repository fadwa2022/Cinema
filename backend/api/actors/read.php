<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Headers: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Actors.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $halls = new Actors($db);

  // Blog post query
  $result = $halls->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any hall
  if($num > 0) {
    // hall array
    $halls_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $hall_item = array(
        'id' => $id,
        'name' => $name,
        'image' => $image,
      );

      // Push to "data"
      array_push($halls_arr, $hall_item);
    }

    // Turn to JSON & output
    echo json_encode($halls_arr);

  } else {
    // No hall
    echo json_encode(
      array('message' => 'No hall Found')
    );
  }