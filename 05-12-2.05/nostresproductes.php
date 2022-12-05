<!DOCTYPE html PUBLIC>
<html>
<head>
    <title>Platilla de bootstrapp</title>

    <meta charset="UTF-8">
    <meta name="description" content="Descripció web">
    <meta name="keywords" content="Paraules clau">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbars/">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">

    <meta http-equiv="refresh" content="2000">

</head>

<body>
    
    <?php
        session_start();
        if (isset($_SESSION['compra'])) {

        } else {
            $_SESSION['compra'] = array();
        }
        require_once "header.php";
    ?>
    
    <div class="productes-pag-body">
        <h1 class="titulos-index">Els nostres productes</h1>
        <div class="secion-product">
            <img src="assets/images/pa.jpg" class="product-img" alt="...">
            <div class="product-text product-d">
                <h2 id="pa">Els pans</h2>
                <p>Elaborat amb farina de blat mòlt a la pedra, farina malta d'ordi, farina de sègol…</p>
                <a href="comprapa.php"<button type="button" class="btn boton-principal">ANAR</button></a>
            </div>
        </div>
        <div class="secion-product">
            <img src="assets/images/brioixeria.jpg" class="product-img product-d" alt="...">
            <div class="product-text">
                <h2 id="bo">La brioixeria</h2>
                <p>La nostra brioixeria, és la més representativa i tradicional en la història dels seus orígens.</p>
                <a href="comprabo.php"<button type="button" class="btn boton-principal">ANAR</button></a>    
            </div>
        </div>
        <div class="secion-product">
            <img src="assets/images/diades.jpg" class="product-img float-start" alt="...">
            <div class="product-text product-d">
                <h2 id="dia">Les diades</h2>
                <p>Les diades són el motiu de festivitat.Per aixo celebrem els dies mes especials.</p>
                <a href="compradia.php"<button type="button" class="btn boton-principal"  href="compra.php">ANAR</button></a>
            </div>
        </div>
    </div>
</body>


<?php
require_once "footer.php";
?>

<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>
