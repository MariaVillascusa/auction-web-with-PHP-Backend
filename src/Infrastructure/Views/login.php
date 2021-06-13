<?php require_once 'header.php'; ?>

    <div class="container-xxl" id="container">
        <h1>Inicia sesión</h1>
        <div class="row g-3 align-items-center" id="login">
            <form id="form" action="http://localhost:9900/users" method="POST">

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>

                <button type="button" class="btn bttn" id="btn">Entrar</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="module" src="js/login.js"></script>

<?php require_once 'footer.php'; ?>