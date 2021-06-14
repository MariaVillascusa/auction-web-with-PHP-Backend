<?php

$server = 'mysql';
$username = 'root';
$password = 'admin1234';
$database = 'auction_php';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}

?>