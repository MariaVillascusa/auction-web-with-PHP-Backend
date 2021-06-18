
<?php require_once 'header.php'; ?>
<!--    <link rel="stylesheet" href="css/login.css">-->
    <title>SUBASTAS WEB - login</title>
<?php require_once 'nav.php'; ?>

    <div class="container-xxl" id="container">


        <?php if (!empty($message)): ?>
            <p> <?= $message ?></p>
        <?php endif; ?>

        <h1>Iniciar sesión</h1>
        <div class="row g-3 align-items-center" id="login">
            <form id="form-login">

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div id="login-error">Error</div>
                <button type="button" class="btn bttn login-btn" id="login-btn">Entrar</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
    <script type="module" src="js/login.js"></script>
<?php require_once 'footer.php'; ?>