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
        if (isset($_POST['pa'])) {
            $paSel = $pa[$_POST['pa']];  
            if (isset($_SESSION['compra'][$_POST['pa']])) {
                //var_dump($_SESSION['compra']);
                $_SESSION['compra'][$_POST['pa']]->setCantidad();
            }else{
                $_SESSION['compra'][$_POST['pa']] = new Pedido($paSel);
                //var_dump($_SESSION['compra']);
            }
        }
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
        foreach ($pa as $i => $pa) {

        ?>
        <div class="product-pa-pag float-start">
            <img class="fotocolumna" src="<?= $pa->getImagen() ?>" alt="">
            <h3 class="text-center fs-4 fa-center p-3 d-flex justify-content-center">
            <?= $pa->getName() ?>
            </h3>
            <p class="text-center product-text-pag">
            <?= $pa->getDescripcion() ?>
            </p>
            <div class="btn float-start boton-principal falso-boton-principal margen-boton"><?=$pa->getPrecio()."€";?></div>
            <form action="comprapa.php" method="post">
                <input name="pa" value="<?= $i ?>" hidden>
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