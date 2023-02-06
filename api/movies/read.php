<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/movies.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $movies = new Movies($db);

  // Blog post query
  $result = $movies->read();
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
        'title' => $title,
        'image' => $image,
        'description' => $description,
      );

      // Push to "data"
      array_push($movies_arr, $user_item);
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($movies_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No movie Found')
    );
  }