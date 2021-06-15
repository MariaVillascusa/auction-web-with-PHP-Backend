<?php
require 'session.php';
require_once 'header.php';
?>
<link rel="stylesheet" href="css/sell.css">

<title>SUBASTAS WEB</title>

<?php require_once 'nav.php'; ?>


<div class="container-xxl" id="container">
    <h1>Pon a la venta un artículo</h1>
    <div class="row g-3 align-items-center" id="sell">
        <form id="form" action="/sell" method="POST">

            <div class="mb-3">
                <label for="name" class="form-label">Nombre del producto:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio:</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción:</label>
                <input type="" class="form-control" id="description" name="description">
            </div>
            <div class="mb-3">
                <label for="datetime" class="form-label">Fecha de cierre:</label>
                <input type="datetime" class="form-control" id="datetime" name="datetime">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Ruta imagen:</label>
                <input type="url" class="form-control" id="image" name="image">
            </div>

            <button type="button" class="btn bttn" id="btn">Vender</button>
        </form>
    </div>


</div>
<!-- Bootstrap Bundle with Popper -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="module" src="/js/sell.js"></script>

<?php require_once 'footer.php'; ?>
