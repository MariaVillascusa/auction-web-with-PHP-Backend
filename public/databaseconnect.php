<?php
session_start();

$server = 'mysql';
$username = 'root';
$password = 'admin1234';
$database = 'auction_php';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
   
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}
if (!empty($_POST['username']) && !empty($_POST['password'])) {

    $records = $conn->prepare('SELECT id, username, password FROM users WHERE username = :username');
    $records->bindParam(':username', $_POST['username']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if ($_POST['password'] == $results['password']) {
        $_SESSION['user_id'] = $results['id'];
        $message = 'SESION INICIADA';
        echo($message);
    } else {
        $message = 'Disculpa, las credenciales no coinciden';
        echo($message);

    }
    header('Location: /home');

}
