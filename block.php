<?php
$data = json_decode(file_get_contents('php://input'), true);
$pcName = $data['pc'] ?? '';

if (!empty($pcName)) {
    file_put_contents('blocked.txt', $pcName . PHP_EOL, FILE_APPEND);
    http_response_code(200);
} else {
    http_response_code(400);
}
?>
