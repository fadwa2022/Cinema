<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/reservation.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $user = new Reservation($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $user->hall = $data->hall;
  $user->seat = $data->seat;
  $user->costumer = $data->costumer;


  // Create post
  if($user->create()) {
    echo json_encode(
      array('message' => 'reservation Created')
    );
  } else {
    echo json_encode(
      array('message' => 'reservation Not Created')
    );
  }