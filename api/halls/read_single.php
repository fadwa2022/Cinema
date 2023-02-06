<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/halls.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate bluser object
  $hall = new Halls($db);

  // Get ID
  $hall->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $hall->read_single();

  // Create array
  $hall_arr = array(
    'id' => $hall->id,
    'label' => $hall->label,
    'movie' => $hall->movie,
  );

  // Make JSON
  print_r(json_encode($hall_arr));