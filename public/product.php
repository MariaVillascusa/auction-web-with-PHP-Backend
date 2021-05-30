<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $file = fopen('./../src/Infrastructure/Files/products.csv', "r");
    if (false === $file) {
        throw new Exception('File not found');
    }

    if (count($_GET) === 0) {
        header('Content-Type: application/json');
        while (($data = fgetcsv($file, 1000, ',')) !== false) {
            echo json_encode(
                [
                    'articleId' => $data[0],
                    'name' => $data[1],
                    'price' => $data[2],
                    'description' => $data[3],
                    'image' => $data[4]
                ]
            );
        }
        http_response_code(200);
    }

    if (isset($_GET['articleId'])) {
        while (($data = fgetcsv($file, 1000, ',')) !== false) {
            if ($data[0] === $_GET['articleId']) {
                header('Content-Type: application/json');
                echo json_encode(
                    [
                        'articleId' => $data[0],
                        'name' => $data[1],
                        'price' => $data[2],
                        'description' => $data[3],
                        'image' => $data[4]
                    ]
                );
            }
        }

        http_response_code(404);
    } else {
        http_response_code(400);
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = fopen('./../src/Infrastructure/Files/products.csv', "a");
    if (false === $file) {
        throw new Exception('File not found');
    }
    $data = json_decode(@file_get_contents('php://input'), true);

    if (isset($data['name']) && isset($data['price'])  && isset($data['description']) && isset($data['image'])) {
        fputcsv($file, [uniqid(), $data['name'], $data['price'], $data['description'], $data['image']]);
        http_response_code(201);
    } else {
        http_response_code(400);
    }
}  else {
    http_response_code(400);
}

fclose($file);

