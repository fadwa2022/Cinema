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
  $reservations = new Reservation($db);

  $reservations->costumer = isset($_GET['costumer']) ? $_GET['costumer'] : die();

  // Blog post query
  $result = $reservations->read();

  // Get row count
  $num = $result->rowCount();

  // Check if any user
  if($num > 0) {
    // user array
    $reservations_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $reservations_item = array(
        'id' => $id,
        'costumer' => $costumer,
        'seat' => $seat,
        'date' => $date,
        'title' => $title,
        'image' => $image

      );

      // Push to "data"
      array_push($reservations_arr, $reservations_item);
    }

    // Turn to JSON & output
    echo json_encode($reservations_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Found')
    );
  }