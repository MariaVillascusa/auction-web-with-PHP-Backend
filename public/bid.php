<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $file = fopen('./../src/Infrastructure/Files/bids.csv', "r");
    if (false === $file) {
        throw new Exception('File not found');
    }
    if (count($_GET) === 0) {
        header('Content-Type: application/json');
        while (($data = fgetcsv($file, 1000, ',')) !== false) {
            echo json_encode(
                [
                    'bidId' => $data[0],
                    'productId' => $data[1],
                    'currentBid' => $data[2],
                    'datetime' => $data[3],
                ]
            );
        }
        http_response_code(200);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = fopen('./../src/Infrastructure/Files/bids.csv', "a");
    if (false === $file) {
        throw new Exception('File not found');
    }
    $data = json_decode(@file_get_contents('php://input'), true);

    if (isset($data['currentBid'])) {
        fputcsv($file, [uniqid(), $data['productId'], $data['currentBid'], date('d m Y'), date_create()]);
        http_response_code(201);
    } else {
        http_response_code(400);
    }
}  else {
    http_response_code(400);
}

fclose($file);