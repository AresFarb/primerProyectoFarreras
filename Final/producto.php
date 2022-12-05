<?php

abstract class Producto{
    
    protected $idProduct;
    protected $name;
    protected $categoria;
    protected $precio;
    protected $imagen;
    protected $descripcion;


    public function __construct($idProduct,$name, $categoria, $precio, $imagen, $descripcion)
    {
        $this->idProduct = $idProduct;
        $this->name = $name;
        $this->categoria = $categoria;
        $this->precio = $precio;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
    }

    public function getIdProduct()
    {
        return $this->idProduct;
    }
    public function setIdProduct($idProduct)
    {
        $this->idProduct = $idProduct;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
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