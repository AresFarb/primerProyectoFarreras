<header>
<nav class="navbar navbar-expand-lg color-fondo-header">
    <div class="container-xxl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="movil-vis logo-general-header">
            <a href="index.php"><img src="assets/images/logo.png" alt="logo" class="mb-4 me-2 imag-head"></a>
            <a class="navbar-brand text-colorh" href="index.php">PAntonio</a>
        </div>
        <div class="desck-vis justify-content-center align-items-center">
            <a class="navbar-brand text-colorh" href="index.php">PAntonio</a>
        </div>
        <div id="botones_tienda_smartphone">
            <a href="panelPedido.php"><img src="assets/icons/carrito.png" alt=""></a>
        </div>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-color" aria-current="page" href="qui.php">Qui som?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-color" href="nostresproductes.php">Productes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-color">Contacte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-color">Login</a>
                </li>
            </ul>

            <div id="botones_tienda_escritorio" class="form-inline my-2 my-lg-0">
                <a href="panelPedido.php"><img src="assets/icons/carrito.png" alt="">
                    <?= count($_SESSION['compra']) ?>
                </a>
            </div>
        </div>
    </div>
</nav>
</header>