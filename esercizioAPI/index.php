<?php
session_start();

$users = [
    ['id' => 1, 'name' => 'John Doe'],
    ['id' => 2, 'name' => 'Jane Doe'],
    ['id' => 3, 'name' => 'Alice'],
    ['id' => 4, 'name' => 'Bob'],
];

$response=[
    'status' => 200,
    'message' => 'OK',
    'payload' => $users

];

header('Content-Type: application/json');
http_response_code(200);
echo json_encode($users);
exit;
?>