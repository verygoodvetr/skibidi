<?php
$data = json_decode(file_get_contents('php://input'), true);
$pcName = $data['pc'] ?? '';

if (!empty($pcName)) {
    $files = glob("data/{$pcName}_*.txt");
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
    http_response_code(200);
} else {
    http_response_code(400);
}
?>
