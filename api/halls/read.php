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

  // Check if any user
  if($num > 0) {
    // user array
    $movies_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $user_item = array(
        'id' => $id,
        'label' => $label,
        'movie' => $movie,
      );

      // Push to "data"
      array_push($movies_arr, $movie_item);
    }

    // Turn to JSON & output
    echo json_encode($movies_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No hall Found')
    );
  }