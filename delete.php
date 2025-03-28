<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');  // For development only

$pcName = $_GET['pc'] ?? '';

if (!empty($pcName)) {
    // Sanitize the input
    $pcName = preg_replace('/[^a-zA-Z0-9-_]/', '', $pcName);
    
    // Delete files
    $files = glob("data/{$pcName}_*.txt");
    $deletedCount = 0;
    
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
            $deletedCount++;
        }
    }
    
    echo json_encode(['status' => 'success', 'deleted' => $deletedCount]);
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'PC name is required']);
}
?>
