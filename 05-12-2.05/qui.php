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
    
    <div class="body-qui-som">
        <h1 class="titulos-index">Qui som?</h1>
        <p class="">El nostre objectiu és mantenir-nos fidels a l'esperit artesanal del pa que oferim dia a dia a les nostres fleques.
Reivindiquem, doncs, el pa ben fet, de qualitat ia l'abast de totes les taules.</p>
        <p class="">El nostre pa és amassat cada nit per oferir-lo sempre fresc durant el dia, amb una barreja pròpia de farines, la cura d'un mestre format a l'ofici, amb l'herència d'una tradició de més de 100 anys i quatre generacions de forners.</p>
         <img src="assets/images/forner.png" class="foto-qui-som" alt="...">
        <p class="">Treballem cada dia per mantenir una elaboració diària artesanal i servir el pa fresc als nostres clients.</p>
        <p class=""> El nostre objectiu és mantenir-nos fidels a l'esperit artesanal del pa que oferim dia a dia a les nostres fleques. Reivindiquem, doncs, el pa ben fet, de qualitat i a l'abast de totes les taules.</p>
    </div>
</body>


<?php
require_once "footer.php";
?>

<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>
