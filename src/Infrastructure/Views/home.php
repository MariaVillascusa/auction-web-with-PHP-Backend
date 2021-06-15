<?php require 'session.php'; ?>

<?php require_once 'header.php'; ?>
    <link rel="stylesheet" href="css/index.css">
    <title>SUBASTAS WEB</title>

<?php require_once 'nav.php'; ?>
    <div>
        <span id="loading">CARGANDO...</span>
    </div>
<?php if (!empty($user)): ?>
    <h6> Hola, <?= $user['username']; ?></h6>
    <br>Has iniciado sesión correctamente
    <a href="/logout">
        Logout
    </a>
<?php endif; ?>
    <div class="container-xxl" id="container">

    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script type="module" src="/js/chrono.js"></script>
    <script type="module" src="/js/index.js"></script>
    <script type="module" src="/js/articles.js"></script>

<?php require_once 'footer.php'; ?>