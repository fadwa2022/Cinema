<?php 
  // Headers
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

  // Instantiate bluser object
  $user = new User($db);

  // Get ID
  // $user->id = isset($_GET['id']) ? $_GET['id'] : die();
  $data = json_decode(file_get_contents("php://input"));


  $user->email = $data->email;
  $user->password = $data->password;

  // Get post
  $user->read_single();
  if($user){
    // Create array
  $user_arr = array(
    'id'=>$user->id,
    'identifier' => $user->identifier,
    'full_name' => $user->full_name,
    'email' => $user->email,
  ); // Make JSON
  print_r(json_encode($user_arr));

}else{
  echo json_encode(
    array('message' => 'No hall Found')
  );

}


 