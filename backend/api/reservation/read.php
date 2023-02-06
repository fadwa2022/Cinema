<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/reservation.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $reservation = new Reservation($db);

  // Blog post query
  $result = $reservation->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any user
  if($num > 0) {
    // user array
    $reservations_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $user_item = array(
        'id' => $id,
        'hall' => $hall,
        'seat' => $seat,
        'costumer' => $costumer,
      );

      // Push to "data"
      array_push($reservations_arr, $user_item);
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($reservations_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No reservatios Found')
    );
  }