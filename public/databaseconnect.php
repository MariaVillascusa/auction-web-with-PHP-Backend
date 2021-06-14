<?php
session_start();

$DATABASE_HOST = 'mysql';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'admin1234';
$DATABASE_NAME = 'auction_php';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
} else {
    echo("Conectado a la BBDD");
}

if ( !isset($_POST['username'], $_POST['password']) ) {
    exit('Por favor rellena los campos de usuario y password!');
}

if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = :username')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();

    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();

        if (($_POST['password'] === $password)) {

            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            echo 'Bienvenido ' . $_SESSION['name'] . '!';
        } else {

            echo 'Usuario o password incorrecto!';
        }
    } else {
        echo 'Usuario o password incorrecto!';
    }
    $stmt->close();
}
?>