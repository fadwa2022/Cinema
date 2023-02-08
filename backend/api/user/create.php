<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/user.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $user = new User($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $user->identifier = md5(rand());
  $user->full_name = $data->full_name;
  $user->email = $data->email;
  $user->password = md5($data->password);

  // Create post
  if($user->create()) {
    echo json_encode(
      array('message' => 'user Created : '.$user->identifier)
    );
  } else {
    echo json_encode(
      array('message' => 'user Not Created')
    );
  }