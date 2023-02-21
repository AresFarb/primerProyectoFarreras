<?php


class Pedido{
    protected $producto;
    protected $cantidad = 1;

    
    public function __construct($producto){
        $this->producto = $producto;
    }

    
    public function getProducto()
    {
        return $this->producto;
    }

    
    public function setProducto($producto): self
    {
        $this->producto = $producto;

        return $this;
    }

   
    public function getCantidad()
    {
        return $this->cantidad;
    }

    
    public function setCantidad($cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }
}

?>