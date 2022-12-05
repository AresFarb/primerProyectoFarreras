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
        //print_r($_SESSION);
        ?>

        <?php
        /*         * if (isset($_POST['Del'])) {
          if ($_SESSION['compra'][0][$_POST['pos']]->getCantidad() == 1) {
          unset($_SESSION["compra"][0][$_POST['pos']]);
          $_SESSION["compra"] = array_values($_SESSION["compra"]);
          } else {
          unset($_SESSION["compra"][0][$_POST['pos']]);
          $_SESSION['compra'][0][$_POST['pos']]->setCantidad($_SESSION['compra'][0][$_POST['pos']]->getCantidad() - 1);
          }
          } else if (isset($_POST['Add'])) {
          $_SESSION['compra'][0][$_POST['pos']]->setCantidad($_SESSION['compra'][0][$_POST['pos']]->getCantidad() + 1);
          } */
        if (isset($_POST['Del'])) {
            $pedidoSel = $_SESSION['compra'][$_POST['pos']];
            if ($pedidoSel->getCantidad() == 1) {
                unset($_SESSION["compra"][$_POST['pos']]);
                $_SESSION["compra"] = array_values($_SESSION["compra"]);
            } else {
                $pedidoSel->setCantidad($pedidoSel->getCantidad() - 1);
            }
        } else if (isset($_POST['Add'])) {
            $pedidoSel = $_SESSION["compra"][$_POST['pos']];
            $pedidoSel->setCantidad($pedidoSel->getCantidad() + 1);
        }
        ?>
        <?php
        require_once "header.php";
        //var_dump($_SESSION['compra']);
        ?>

        <div class="container ">
            <div class="row">
                <div class="col-9 margenes-carrito">
                    <div class="carrito-head">
                        <h1 class="text-light">Productes a la cistella</h1>
                    </div>
                    <?php foreach ($_SESSION["compra"] as $i => $pedido) { ?>
                        <div class="compra-secion">
                            <tr>

                                <td><img class="imag-carrito float-start" src="<?= $pedido->getProducto()->getImagen() ?>"></td>
                                <td>
                                    <h2><?= $pedido->getProducto()->getName() ?></h2>
                                </td>
                                <td>
                                    <div class="sum-res-compra">
                                        <form action="panelPedido.php" method="post" class="float-end">
                                            <input type="hidden" class="" name="pos" value=<?= $i ?>>
                                            <td><button type="submit" name="Del" class="btn float-start boton-principal-inv">-</button></td>
                                            <td>
                                                <p><?= $pedido->getCantidad() ?></p>
                                            </td>
                                            <td><button type="submit" name="Add" class="btn float-end boton-principal-inv">+</button></td>
                                        </form>
                                    </div>
                            </tr>
                        </div>
                        <div class="hr-cesta">
                            <hr>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="boton-carro-1">
                        <a href="nostresproductes.php"<button type="button" class="btn float-start boton-principal-inv posicion-boton-carro"><p>Seguir comprant</p></button></a>
                    </div>
                </div>
                
                
                <div class="col-3 margenes-carrito1">
                    <h4>Resum<h4>
                    <div class="hr-cesta">
                        <hr>
                    </div>
                    <div class="resumen">
                     <?php 
                     $ctotal=0;
                     $ptotal=0;
                     $precioproducto=0;
                     foreach ($_SESSION["compra"] as $i => $pedido) {
                         $precioproducto= $pedido->getCantidad() * $pedido->getProducto()->getPrecio();
                         echo"<p>".$pedido->getProducto()->getName()."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$pedido->getCantidad()."  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$precioproducto."€</p>";
                        $ctotal+= $pedido->getCantidad();
                        $ptotal+= $precioproducto;
                     }?>
                     <div class="hr-cesta">
                        <hr>
                     </div>
                     <p>Subtotal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<?=$ctotal."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$ptotal?>€</p>
                     <br>
                     <div class="hr-cesta">
                        <hr>
                     </div>
                     <p><b>Total a pagar: <?=$ptotal?>€</b></p>
                     
                     
                     </div>
                </div>
            </div>
        </div>


    </body>
    <div>
        <?php
        require_once "footer.php";
        ?>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</html>