<link rel="stylesheet" href="css/nav.css">

</head>

<body>

<nav class="navbar navbar-dark bg-dark" id='navbar'>
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">
            <h1>SUBASTAS WEB</h1>
        </a>

        <div id="pages">
            <a class="nav-link" id="link" href="/home">Home</a>
            <a class="nav-link" id="link" href="/sell">Vender</a>
            <a class="nav-link" id="link" href="#">Sobre nosotros</a>
            <a class="nav-link" id="link" href="/register">Regístrate</a>
            <a class="nav-link" id="link" href="/login">Log in</a>
        </div>
        <div id="login-div">
            <?php if(!empty($user)): ?>
                <p id="nav-login"> Hola, <?= $user['username']; ?></p>
                <a href="/logout" id="link">
                    Logout
                </a>
            <?php endif; ?>
        </div>
        <form class="d-flex">
            <input class="form-control me-2" id="search" type="search" placeholder="Buscar" aria-label="Search">
            <button class="bttn" id="search-btn" type="submit">Buscar</button>
        </form>
    </div>
</nav>
