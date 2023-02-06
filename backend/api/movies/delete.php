<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/movies.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog  object
$movie = new Movies($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));
//   Set ID to  delete
$movie->id = isset($_GET['id']) ? $_GET['id'] : die();;


// delete post
if ($movie->delete()) {
    echo json_encode(
        array('message' => 'movie Deleted')
    );
} else {
    echo json_encode(
        array('message' => 'movie Not Deleted')
    );
}
