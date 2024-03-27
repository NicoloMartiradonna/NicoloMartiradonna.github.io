<?php
session_start();

$users = [
    ['id' => 1, 'name' => 'David'],
    ['id' => 2, 'name' => 'Leonard'],
    ['id' => 3, 'name' => 'Christopher'],
    ['id' => 4, 'name' => 'Rachel'],
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
