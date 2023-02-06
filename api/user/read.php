<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/user.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $user = new User($db);

  // Blog post query
  $result = $user->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any user
  if($num > 0) {
    // user array
    $users_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $user_item = array(
        'id' => $id,
        'identifier' => $identifier,
        'full_name' => $full_name,
        'email' => $email,
        'password' => $password,
        'role' => $role
      );

      // Push to "data"
      array_push($users_arr, $user_item);
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($users_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }