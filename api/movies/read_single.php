<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/movies.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate bluser object
  $movie = new Movies($db);

  // Get ID
  $movie->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $movie->read_single();

  // Create array
  $movie_arr = array(
    'id' => $movie->id,
    'title' => $movie->title,
    'image' => $movie->image ,
    'description' => $movie->description,
  );

  // Make JSON
  print_r(json_encode($movie_arr));