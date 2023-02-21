<?php

class Producto{
    
    protected $product_id;
    protected $tipo_producto;
    protected $descripcion;
    protected $precio;
    protected $imagen;
    protected $categoria_id;
   


    public function __construct($product_id,$tipo_producto,$descripcion , $precio, $imagen, $categoria_id)
    {
        $this->product_id = $product_id;
        $this->tipo_producto = $tipo_producto;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->imagen = $imagen;
        $this->categoria_id = $categoria_id;
        
    }

    public function getIdProduct()
    {
        return $this->product_id;
    }
    public function setIdProduct($product_id)
    {
        $this->product_id = $product_id;
    }
    public function gettipo_producto()
    {
        return $this->tipo_producto;
    }
    public function settipo_producto($tipo_producto)
    {
        $this->tipo_producto = $tipo_producto;
    }

    public function getCategoria()
    {
        return $this->categoria_id;
    }
    public function setCategoria($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }
 
    public function getPrecio()
    {
        return $this->precio;
    }
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getImagen()
    {
        return $this->imagen;
    }
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
}
?>