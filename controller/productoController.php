<?php

class productoController{
    public static function index(){
        session_start();
        require_once 'views/includes/header.php';
        require_once 'views/principal.php';
        require_once 'views/includes/footer.php';
    }

    public function quiSom(){
        session_start();
        require_once 'views/includes/header.php';
        require_once 'views/quiSom.php';
        require_once 'views/includes/footer.php';
    }
    public function legal(){
        session_start();
        require_once 'views/includes/header.php';
        require_once 'views/politicas.php';
        require_once 'views/includes/footer.php';
    }

    public function productes(){
        session_start();
        require_once 'modelo/productDao.php';

        require_once 'views/includes/header.php';
            if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'administradorSi'){
                require_once 'views/afegirProd.php';
                if(isset($_POST['enviar'])){
                    $productoNuevo = ProductDAO::addProduct($_POST['tipo_producto'],$_POST['descripcion'], $_POST['precio'],$_POST['imagen'],$_POST['categoria_id']);
                }
            }
        require_once 'views/nostresproductes.php';
        require_once 'views/includes/footer.php';
    }

    public function compraPa(){
        session_start();
        require_once 'modelo/productDao.php';
        require_once 'utils/lista.php';

        if(isset($_POST['pa'])){
            if (isset($_SESSION['login'])){
                if(isset($_SESSION['pedido'])){
                    $pedProd = ProductDAO::pedProd($_SESSION['pedido'], $_POST['pa']);
                    unset($_POST['pa']);
                }else{
                    $ped = ProductDAO::newPed();
                    $pedProd = ProductDAO::pedProd($ped,  $_POST['pa']);
                    $_SESSION['pedido'] = $pedProd;
                    unset($_POST['pa']);
                }
            }else{
                header("Location:".base_url."producto/register");
            }
        }

        require_once 'views/includes/header.php';
        require_once 'views/compraPa.php';
        require_once 'views/includes/footer.php';
    }
    
     public function compraBo(){
         session_start();
        require_once 'modelo/productDao.php';
        require_once 'utils/lista.php';

         if (isset($_SESSION['login'])){
            if(isset($_POST['pa'])){
                if(isset($_SESSION['pedido'])){
                    $pedProd = ProductDAO::pedProd($_SESSION['pedido'], $_POST['pa']);
                    unset($_POST['pa']);
                }else{
                    $ped = ProductDAO::newPed();
                    $pedProd = ProductDAO::pedProd($ped,  $_POST['pa']);
                    $_SESSION['pedido'] = $pedProd;
                    unset($_POST['pa']);
                }
            }
        }else{
            header("Location:".base_url."producto/register");
        }

        require_once 'views/includes/header.php';
        require_once 'views/compraBo.php';
        require_once 'views/includes/footer.php';
    }

    public function compraDia(){
        session_start();
        require_once 'modelo/productDao.php';
        require_once 'utils/lista.php';
        
         if (isset($_SESSION['login'])){
            if(isset($_POST['pa'])){
                if(isset($_SESSION['pedido'])){
                    $pedProd = ProductDAO::pedProd($_SESSION['pedido'], $_POST['pa']);
                    unset($_POST['pa']);
                }else{
                    $ped = ProductDAO::newPed();
                    $pedProd = ProductDAO::pedProd($ped,  $_POST['pa']);
                    $_SESSION['pedido'] = $pedProd;
                    unset($_POST['pa']);
                }
            }
        }else{
            header("Location:".base_url."producto/register");
        }

        require_once 'views/includes/header.php';
        require_once 'views/compraDia.php';
        require_once 'views/includes/footer.php';
    }
    public function login(){
        session_start();
        require_once 'modelo/productDao.php';

        if(isset($_POST['username']) && isset($_POST['password'])) {
	        $loog = ProductDAO::comprobarLogin($_POST['username'], $_POST['password']);
            $rol = ProductDAO::rol($_POST['username']);
        if($loog === true){    
            $_SESSION['login'] = $_POST['username'];
            if($rol === true){
                $_SESSION['rol'] = 'administrador';
            }else{
                $_SESSION['rol'] = 'usuario';
            }
        }
        header("Location:index");
        exit();
        }
        
        require_once 'views/includes/header.php';
        require_once 'views/login.php';
        require_once 'views/includes/footer.php';

    }
     public function register(){
         session_start();
        require_once 'modelo/productDao.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Verificar que las contraseñas coincidan
            if ($_POST['password'] !== $_POST['confirm_password']) {
                echo "Las contraseñas no coinciden";
                exit;
            }
            $nombre_usuario = $_POST['username'];
            $nombre = $_POST['name'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $contraseña = password_hash($_POST['password'], PASSWORD_DEFAULT);
	
	        $reeg = ProductDAO::registrar_usuario($email, $nombre_usuario, $contraseña, $nombre, $apellidos, $telefono);
        }

        require_once 'views/includes/header.php';
        require_once 'views/register.php';
        require_once 'views/includes/footer.php';

    }
    public function cerrarSesion(){
        session_start();
        unset($_SESSION['login']);
        unset($_SESSION['pedido']);
        unset($_SESSION['rol']);
        header("Location:index");
        exit();
    }

    public function carrito(){
        session_start();
        require_once 'modelo/productDao.php';

        if(isset($_POST['Add'])){
            $pedProd = ProductDAO::pedProd($_SESSION['pedido'], $_POST['pos']);
            unset($_POST['pos']);
        }else if (isset($_POST['Del'])){
            $prodEliminar = ProductDAO::eliminarPedido($_POST['pos']);
        }
        $mostCar = ProductDAO::mostrarCarrito();

        require_once 'views/includes/header.php';
            if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'administradorSi'){

            }
        require_once 'views/carrito.php';
        require_once 'views/includes/footer.php';
    }

    public function perfil(){
        session_start();
        require_once 'views/includes/header.php';
        require_once 'views/perfil.php';
        require_once 'views/includes/footer.php';
    }

    public function administrador(){
        session_start();
        $_SESSION['rol'] = 'administradorSi';
        header("Location:".base_url."producto/productes");
        exit();
    }
    public function finalizarPedido(){
        session_start();
        require_once 'modelo/productDao.php';
        
        unset($_SESSION['pedido']);
        if(isset($_POST['Add'])){
            $pedProd = ProductDAO::pedProd($_SESSION['pedido'], $_POST['pos']);
            unset($_POST['pos']);
        }else if (isset($_POST['Del'])){
            $prodEliminar = ProductDAO::eliminarPedido($_POST['pos']);
        }
        $mostCar = ProductDAO::mostrarCarrito();
        echo "Compra feta";
        require_once 'views/includes/header.php';
        require_once 'views/carrito.php';
        require_once 'views/includes/footer.php';
    }

    /*
    public function compraBo(){
        require_once 'views/includes/header.php';
        require_once 'views/comprabo.php';
        require_once 'views/includes/footer.php';
    }*/

}