<?php
$requestPayload = json_decode(file_get_contents('php://input'));

if (!empty($requestPayload) && isset($requestPayload->content)) {
    $scannedContent = $requestPayload->content;
    
    // You can process the scanned content here as needed.
    
    // For example, you can send a response back to the JavaScript code.
    $response = ['message' => 'QR code scanned successfully', 'content' => $scannedContent];
    echo json_encode($response);
} else {
    $response = ['message' => 'No data received from the scanner'];
    echo json_encode($response);
}