<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/places.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $places = new Places($db);

$places->hall = isset($_GET['hall']) ? $_GET['hall'] : die();
// Blog post query
  $result = $places->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any user
  if($num > 0) {
    // user array
    $places_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $places_item = array(
        'id' => $id,
        'hall' => $hall,
        'reserver' => $reserver,
        'movie'=>$movie
      );

      // Push to "data"
      array_push($places_arr, $places_item);
    }

    // Turn to JSON & output
    echo json_encode($places_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Found')
    );
  }