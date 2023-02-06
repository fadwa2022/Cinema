<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/halls.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $halls = new Halls($db);

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
        'label' => $label,
        'movie' => $movie,
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