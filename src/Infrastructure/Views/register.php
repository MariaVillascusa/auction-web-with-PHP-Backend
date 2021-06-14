<?php require_once 'header.php'; ?>

<link rel="stylesheet" href="./css/register.css">
<title>SUBASTAS WEB</title>

<?php require_once 'nav.php'; ?>

<div class="container-xxl" id="container">
    <h1>Crea una cuenta</h1>
    <div class="row g-3 align-items-center" id="register">
        <form id="form" action="/register" method="POST">

            <div class="mb-3">
                <label for="name" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="button" class="btn bttn register-btn" id="btn">Registrarse</button>
        </form>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="module" src="/js/register.js"></script>

<?php require_once 'footer.php'; ?>