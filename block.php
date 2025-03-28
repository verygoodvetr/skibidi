<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');  // For development only

$pcName = $_GET['pc'] ?? '';

if (!empty($pcName)) {
    // Sanitize the input
    $pcName = preg_replace('/[^a-zA-Z0-9-_]/', '', $pcName);
    
    // Write to blocked.txt
    file_put_contents('blocked.txt', $pcName . PHP_EOL, FILE_APPEND);
    echo json_encode(['status' => 'success']);
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'PC name is required']);
}
?>
