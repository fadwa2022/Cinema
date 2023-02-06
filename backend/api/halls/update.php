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

// Instantiate blog post object
$hall = new Halls($db);



// Get raw posted data
$data = json_decode(file_get_contents("php://input"));
// Set ID to  update

$hall->id = isset($_GET['id']) ? $_GET['id'] : die();

$hall->label = $data->label;
$hall->movie = $data->movie;

// Update post
if ($hall->update()) {
    echo json_encode(
        array('message' => 'hall Updated' )
    );
} else {
    echo json_encode(
        array('message' => 'hall Not Updated')
    );
}
