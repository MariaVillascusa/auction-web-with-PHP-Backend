<?php
if (session_status() !== PHP_SESSION_NONE) {
    session_start();
}
require 'databaseconnect.php';

if (isset($_SESSION['user_id'])) {

    $records = $conn->prepare('SELECT id, username, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;
    if (count($results) > 0) {
        $user = $results;
    }
}
?>