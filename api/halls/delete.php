<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/halls.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog  object
$hall = new Halls($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));
//   Set ID to  delete
$hall->id = isset($_GET['id']) ? $_GET['id'] : die();;


// delete post
if ($hall->delete()) {
    echo json_encode(
        array('message' => 'hall Deleted')
    );
} else {
    echo json_encode(
        array('message' => 'hall Not Deleted')
    );
}
