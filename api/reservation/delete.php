<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/reservation.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$user = new Reservation($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));
//   Set ID to  delete
$user->id = isset($_GET['id']) ? $_GET['id'] : die();;


// delete post
if ($user->delete()) {
    echo json_encode(
        array('message' => 'user Deleted')
    );
} else {
    echo json_encode(
        array('message' => 'user Not Deleted')
    );
}
