<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/places.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $user = new Places($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  
  $user->id = $data->id;
  $user->reserver = $data->reserver;
  // Create post
  if($user->update()) {
    echo json_encode(
      array('message' => 'place Updeted')
    );
  } else {
    echo json_encode(
      array('message' => 'place Not Updeted')
    );
  }