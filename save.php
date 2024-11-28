<?php
header('Content-Type: application/json');

// אפשר גישה מכל דומיין - אם צריך
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// קבלת הנתונים מהבקשה
$json = file_get_contents('php://input');
$data = json_decode($json);

// שמירת הנתונים לקובץ
if (file_put_contents('data.json', $json)) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Failed to save data']);
}
