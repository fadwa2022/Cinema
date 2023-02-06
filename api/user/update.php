<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/user.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$user = new User($db);



// Get raw posted data
$data = json_decode(file_get_contents("php://input"));
// Set ID to  update

$user->id = isset($_GET['id']) ? $_GET['id'] : die();

$user->full_name = $data->full_name;
$user->email = $data->email;
$user->password = md5($data->password);

// Update post
if ($user->update()) {
    echo json_encode(
        array('message' => 'user Updated' , 'msg' => $user->id)
    );
} else {
    echo json_encode(
        array('message' => 'user Not Updated')
    );
}
