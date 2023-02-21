<?php
include_once 'entrante.php';
include_once 'utils/dataBase.php';

class ProductDAO{
    public static function getAllProducts(){
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM producto");
 
        $stmt->execute();
        $result=$stmt->get_result();

        $productos = [];
        while($panaderia = $result->fetch_object("Pa")){

            $productos[] = $panaderia;

        }

        return $productos;
        $con->close();

    }

    public static function getAllByType($categoria){
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM producto WHERE categoria_id=?");
            //Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $categoria);

            //Execute statement 
            $stmt->execute();
            $result=$stmt->get_result();

            $LlistaEn = [];
            while($panaderia = $result->fetch_object("Pa")){

                $LlistaEn[] = $panaderia;

            }

            return $LlistaEn;

            $con->close();

        }

    public static function getById($id_producto,$id_categoria){
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM producto WHERE product_id=? and categoria_ID=?");
        //Bind variables to the prepared statement as parameters
        $stmt->bind_param("ii",$id_producto,$id_categoria);

        //Execute statement
        $stmt->execute();
        $result=$stmt->get_result();
        $panaderia = '';
        
        $panaderia = $result->fetch_object("Producto");

        return $panaderia;
        
        $con->close();
    }
    public static function comprobarLogin($username, $password) {
    // Establecer conexión a la base de datos
    $con = DataBase::connect();

    // Consultar la base de datos
    $query = "SELECT contrasenya FROM cuenta WHERE usuario='$username'";
    $resultado = $con->query($query);

    // Verificar si la consulta fue exitosa y si se encontró un registro con los datos proporcionados
    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $contrasenya_cifrada = $fila['contrasenya'];
        
        // Cerrar la conexión a la base de datos
        $con->close();

        // Verificar si la contraseña ingresada coincide con la contraseña cifrada en la base de datos
        if (password_verify($password, $contrasenya_cifrada)) {
            return true;
        } else {
            return false;
        }
    } else {
        // Cerrar la conexión a la base de datos
        $con->close();
        return false;
    }
    }

    public static function rol($usuario){
        $con = DataBase::connect();
        $query = "SELECT rol FROM cuenta WHERE usuario='$usuario'";
        $resultado = $con->query($query);
        if($resultado->num_rows > 0){
            $row = $resultado->fetch_assoc();
            if($row['rol'] === 'administrador'){
                return true;
            }else{
                return false;
            }
        }
        $con->close();
    }

    public static function registrar_usuario($email, $nombre_usuario, $contraseña, $nombre, $apellidos, $telefono) {
    $con = DataBase::connect();
    // Realizar la consulta de inserción en la base de datos
    $stmt = $con->prepare("INSERT INTO cuenta (correo, usuario, contrasenya, nombre, apellidos, telefono) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $email, $nombre_usuario, $contraseña, $nombre, $apellidos, $telefono);
    $stmt->execute();

    // Verificar si la inserción fue exitosa
    if ($stmt->affected_rows > 0) {
        // Si la inserción fue exitosa, devolver verdadero
        return true;
    } else {
        // Si la inserción falló, devolver falso
        return false;
    }
    }

    public static function newPed() {
        $con = DataBase::connect();
        $ses = $_SESSION['login'];
        $correo = "SELECT correo FROM `cuenta` WHERE usuario = '$ses';";
        $cor = $con->query($correo);
        $row = $cor->fetch_row();
        $correo_valor = $row[0];

        $fecha_actual = date('Y-m-d'); // Obtener la fecha actual en el formato YYYY-MM-DD
        $query = "INSERT INTO pedido (fecha_ped, correo) VALUES ('$fecha_actual', '$correo_valor')";
        if ($con->query($query) === TRUE) {
            $pedido_id = $con->insert_id; // Obtener el ID del pedido recién insertado
            $con->close();
            return $pedido_id; // Devolver el ID del pedido
        } else {
            echo "Error al insertar la fecha: " . $con->error;
            $con->close();
            return false; // Devolver false en caso de error
        }
    }

    public static function pedProd($ped, $idPa){
        $con = DataBase::connect();
        $cantidad = 1;
        $precio = "SELECT precio FROM `producto` WHERE product_id = $idPa;";
        $prec = $con->query($precio);
        $row = $prec->fetch_row();
        $precio_valor = $row[0];
        $precio_param = doubleval($precio_valor);
    
        // Verificar si ya existe un registro con los mismos valores de pedido_id y product_id
        $stmt = $con->prepare("SELECT cantidad FROM pedido_producto WHERE pedido_id = ? AND product_id = ?");
        $stmt->bind_param("ii", $ped, $idPa);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Ya existe un registro con los mismos valores, actualizar la cantidad
            $row = $result->fetch_assoc();
            $cantidad = $row['cantidad'] + 1;
            $precio_param = $precio_param*$cantidad;
            $stmt = $con->prepare("UPDATE pedido_producto SET cantidad = ?, precio = ? WHERE pedido_id = ? AND product_id = ?");
            $stmt->bind_param("idii", $cantidad, $precio_param, $ped, $idPa);
            $stmt->execute();
        } else {
            // No existe un registro con los mismos valores, agregar uno nuevo
            $stmt = $con->prepare("INSERT INTO pedido_producto (pedido_id, product_id, cantidad, precio) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiid",$ped, $idPa, $cantidad, $precio_param);
            $stmt->execute();

        }
    
        return $ped;
    }

    public static function addProduct($tipo_producto, $descripcion, $precio, $imagen, $categoria_id){
            $con = DataBase::connect();
            $stmt= $con->prepare("INSERT INTO producto (tipo_producto,descripcion,precio,imagen,categoria_id) VALUES(?,?,?,?,?)");
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssdsi",$_POST['tipo_producto'],$_POST['descripcion'], $_POST['precio'],$_POST['imagen'],$_POST['categoria_id']);
            //Execute statement
            $stmt->execute();
            $con->close();

    }

    public static function eliminarPedido($product_id){
    $con = DataBase::connect();
    $sql = "UPDATE pedido_producto SET cantidad = cantidad - 1 WHERE product_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();

    // Si la cantidad llega a 0, eliminar el producto
    $sql = "DELETE FROM pedido_producto WHERE product_id = ? AND cantidad = 0";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
}

    public static function mostrarCarrito(){
    $con = DataBase::connect();

    $stmt = $con->prepare("SELECT product_id, cantidad, precio FROM pedido_producto WHERE pedido_id=?");
    $stmt->bind_param("i", $_SESSION['pedido']);

    // Execute statement 
    $stmt->execute();
    $result = $stmt->get_result();

    $carrito = array();

    // Agregar cada fila a un array asociativo
    while ($row = $result->fetch_assoc()) {
        // Obtener información del producto
        $stmt2 = $con->prepare("SELECT product_id, tipo_producto, descripcion, precio, imagen FROM producto WHERE product_id=?");
        $stmt2->bind_param("i", $row['product_id']);
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        // Si se encuentra el producto, agregarlo al carrito
        if ($row2 = $result2->fetch_assoc()) {
            $item = array(
                'product_id' => $row2['product_id'],
                'tipo_producto' => $row2['tipo_producto'],
                'descripcion' => $row2['descripcion'],
                'precio' => $row2['precio'],
                'imagen' => $row2['imagen'],
                'cantidad' => $row['cantidad'],
                'precio_total' => $row['cantidad'] * $row2['precio']
            );
            $carrito[] = $item;
        }
    }

    $con->close();

    // Devolver el array de resultados
    return $carrito;
    }
    
   

}

?>