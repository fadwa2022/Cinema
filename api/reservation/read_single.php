<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/reservation.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate bluser object
  $user = new Reservation($db);

  // Get ID
  $user->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $user->read_single();

  // Create array
  $user_arr = array(
    'id' => $user->id,
    'hall' => $user->hall,
    'seat' => $user->seat ,
    'costumer' => $user->costumer,
  );

  // Make JSON
  print_r(json_encode($user_arr));