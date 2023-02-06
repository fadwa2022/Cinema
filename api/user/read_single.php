<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/user.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate bluser object
  $user = new User($db);

  // Get ID
  $user->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $user->read_single();

  // Create array
  $user_arr = array(
    'id' => $user->id,
    'identifier' => $user->identifier,
    'full_name ' => $user->full_name ,
    'email' => $user->email,
    'password' => $user->password,
    'role' => $user->role
  );

  // Make JSON
  print_r(json_encode($user_arr));