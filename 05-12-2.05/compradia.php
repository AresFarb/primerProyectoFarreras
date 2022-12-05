<!DOCTYPE html PUBLIC>
<html>
<?php
include "producto.php";
include "pa.php";
include "loadproduct.php";
include "carrito.php";
?>

<head>
    <title>Compra</title>

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
        if (isset($_POST['dia'])) {
            $pedidoSel = $dia[$_POST['dia']];  
            if (isset($_SESSION['compra'][$_POST['dia']])) {
                //var_dump($_SESSION['compra']);
                $_SESSION['compra'][$_POST['dia']]->setCantidad($_SESSION['compra'][$_POST['dia']]->getCantidad() + 1);
            }else{
                $_SESSION['compra'][$_POST['dia']] = new Pedido($pedidoSel);
                //var_dump($_SESSION['compra']);
            }
        }/**elseif (isset($_POST['bo'])) {
            $pedidoSel = $bo[$_POST['bo']];  
            if (isset($_SESSION['compra'][$_POST['bo']])) {
                //var_dump($_SESSION['compra']);
                $_SESSION['compra'][$_POST['bo']]->setCantidad($_SESSION['compra'][$_POST['bo']]->getCantidad() + 1);
            }else{
                $_SESSION['compra'][$_POST['bo']] = new Pedido($pedidoSel);
                //var_dump($_SESSION['compra']);
            }
        }elseif (isset($_POST['dia'])) {
            $pedidoSel = $dia[$_POST['dia']];  
            if (isset($_SESSION['compra'][$_POST['dia']])) {
                //var_dump($_SESSION['compra']);
                $_SESSION['compra'][$_POST['dia']]->setCantidad($_SESSION['compra'][$_POST['dia']]->getCantidad() + 1);
            }else{
                $_SESSION['compra'][$_POST['dia']] = new Pedido($pedidoSel);
                //var_dump($_SESSION['compra']);
            }
        }*/

    } else {
        $_SESSION['compra'] = array();
    }
    ?>
        <?php
        require_once "header.php";
        ?>

    <section class="container mt-5 pb-5 mb-5">
        <h1 class="titulos-index">Els nostres pans</h2>
         <div class="secion-product-pa">
        <?php
        $hr = 2;
        foreach ($dia as $i => $dia) {

        ?>
        <div class="product-pa-pag float-start">
            <img class="fotocolumna" src="<?= $dia->getImagen() ?>" alt="">
            <h3 class="text-center fs-4 fa-center p-3 d-flex justify-content-center">
            <?= $dia->getName() ?>
            </h3>
            <p class="text-center product-text-pag">
            <?= $dia->getDescripcion() ?>
            </p>
            <div class="btn float-start boton-principal falso-boton-principal margen-boton"><?=$dia->getPrecio()."€";?></div>
            <form action="comprapa.php" method="post">
                <input name="dia" value="<?= $i ?>" hidden>
                <input class="btn float-start boton-principal-inv" type="submit" value="AFEGIR">
            </form>
            </div>
            <?php
            if($i==$hr){
                echo"<br><hr>";
                $hr = $hr + 3;
            }

        }
            ?>

        </div>
    </section>

</body>
 <?php
        require_once "footer.php";
        ?>

<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>