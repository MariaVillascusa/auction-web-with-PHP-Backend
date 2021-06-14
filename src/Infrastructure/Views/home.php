<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, username, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
    var_dump($user);
}
?>
<?php require_once 'header.php'; ?>
    <link rel="stylesheet" href="css/index.css">
    <title>SUBASTAS WEB</title>

<?php if(!empty($user)): ?>
    <br> Hola, <?= $user['username']; ?>
    <br>Has iniciado sesión correctamente
    <a href="/logout">
        Logout
    </a>
<?php endif; ?>

<?php require_once 'nav.php'; ?>
    <div>
        <span id="loading">CARGANDO...</span>
    </div>

    <div class="container-xxl" id="container">

    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script type="module" src="/js/chrono.js"></script>
    <script type="module" src="/js/index.js"></script>
    <script type="module" src="/js/articles.js"></script>

<?php require_once 'footer.php'; ?>