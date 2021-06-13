<?php require_once 'header.php'; ?>

<div id="confirm" class="modal">
        <span onclick="document.getElementById('confirm').style.display='none'" class="close"
              title="Close Modal">&times;</span>
    <form class="modal-content" action="#">
        <div class="container">
            <h1>Hacer puja</h1>
            <p>Estás seguro de que quieres pujar por el artículo?</p>

            <div class="clearfix">
                <button type="button" class="bttn cancelbtn" id="cancelbtn">Cancelar</button>
                <button type="button" class="bttn confirmbtn" id="confirmbtn">Pujar</button>
            </div>
        </div>
    </form>
</div>

<div>
    <span id="loading">CARGANDO...</span>
</div>
<div class="container-xxl" id="container">
    <div class="row" id="row-top">
        <div class="col-8 col-img ">
            <h3 id="name-article"></h3>
            <div id="div-img">
                <img src="" id="img" class="img-fluid" alt="Article img">
                <div class="btn-group" role="group" aria-label="Basic example">
                </div>
            </div>
            <div class="row purchase justify-content-center" id="purchase">
                <button class="bttn" id="btn-purchase"></button>
            </div>
            <div class="row description" id="description"></div>
        </div>

        <div class="col-4 bg" id="div-bids">

            <div class="row" id="d-time">
                <h6>La puja se cierra en:</h6>
                <section>
                    <p>
                        <span id="days"></span>d
                        <span id="hours"></span>h
                        <span id="minutes"></span>m
                        <span id="seconds"></span>s
                    </p>
                </section>
            </div>

            <div class="row" id="d-price">
                <h6>Puja actual:</h6>
                <p id="p-price">
                    <span id="price"></span>€
                </p>
            </div>

            <div class="row" id="d-next">
                <h6>Próxima puja:</h6>
                <p id="p-next">
                    <span id="next"></span>€
                </p>
            </div>

            <div class="row" id="d-fast">
                <h6>Puja rápida</h6>
                <div id='buttons'>
                    <button class="bttn click" id="btn1">Bid1</button>
                    <button class="bttn click" id="btn2">Bid2</button>
                    <button class="bttn click" id="btn3">Bid3</button>
                </div>
            </div>

            <div class="row" id="d-direct">
                <div class="alert alert-danger d-none" role="alert" id="alert"></div>

                <h6>Puja directa</h6>
                <form class="justify-content-center" action="#">
                    <input class="form-control-sm" id="direct-input" type="text" placeholder="€" aria-label="bid">
                    <button class="bttn" id='direct-bid-btn' type="button">Bid</button>
                </form>
            </div>


            <div class="row" id="d-bid-list">
                <h6>Historial de pujas</h6>

                <table class="table table-light" id="table-bids">
                    <thead>
                    <td>User</td>
                    <td>€</td>
                    <td>Hora y Fecha</td>


                    </thead>
                    <tbody id="table-bids-body">
                    <tr class="table-light">
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Bundle with Popper -->
<script type="module" src="js/chrono.js"></script>
<script type="module" src="js/product.js"></script>
<script type="module" src="js/articles.js"></script>

<?php require_once 'footer.php'; ?>