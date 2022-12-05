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
    

    <div class="imagen-banner-inicio">
        <div class="text-banner movil-vis">
            <h1>Pa artesà amb massa mare i aromàtica</h1>
        </div>
    </div>

  <div class="nostres-productes">
    <h1 class="titulos-index">Els nostres productes</h1>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
      <div class="carousel-indicators">
        <button hidden type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button hidden type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button hidden type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner index-secion1">
        <div class="carousel-item active">
            <img src="assets/images/pa.jpg" class="d-block w-100" alt="...">
            <h2 class="text-general">Els pans</h2>
            <p class="text-general">Elaborat amb farina de blat mòlt a la pedra, farina malta d'ordi, farina de sègol…</p><p>
            <a href="nostresproductes.php#pa"<button type="button" class="btn boton-principal margen-boton-mid">ANAR</button></a>       
        </div>
        <div class="carousel-item">
            <img src="assets/images/brioixeria.jpg" class="d-block w-100" alt="...">
            <h2 class="text-general">Brioixeria</h2>
            <p class="text-general">La brioixeria de Macxipa, és la més representativa i tradicional en la història...</p><p>
            <a href="nostresproductes.php#bo"<button type="button" class="btn boton-principal margen-boton-mid">ANAR</button></a>
        </div>
        <div class="carousel-item">
          <img src="assets/images/diades.jpg" class="d-block w-100" alt="...">
          <h2 class="text-general">Diades</h2>
          <p class="text-general">Les diades són el motiu de festivitat a Macxipa.Volem festejar amb tu els...</p><p>
          <a href="nostresproductes.php#dia"<button type="button" class="btn boton-principal margen-boton-mid">ANAR</button></a>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <img src="assets/icons/flechai.png" class="d-block w-100" alt="...">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <img src="assets/icons/flechad.png" class="d-block w-100" alt="...">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <div class="qui-som">
    <div class="body-qui-som-inici">
        <h1 class="titulos-index text-general titulo-index-margen text-light">Som mestres forners</h1>
        <h2 class="text-general text-light">Qui som?</h2>
         <img src="assets/images/forner.png" class="foto-index" alt="...">
        <p class="text-general text-light">El nostre objectiu és mantenir-nos fidels a l'esperit artesanal del pa que oferim dia a dia a les nostres fleques.
        Reivindiquem, doncs, el pa ben fet, de qualitat ia l'abast de totes les taules...</p>
        <a href="qui.php"<button type="button" class="btn boton-principal margen-boton-mid boton-principal-invertido">ANAR</button></a>
    </div>

  </div>
  <div class="trova">
    <h1 class="titulos-index">Trova'ns</h1>
    <img src="assets/images/mapa.png" class="foto-index" alt="...">
  </div>
</body>


<?php
require_once "footer.php";
?>

<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>
