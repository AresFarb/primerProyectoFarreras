<?php
class Pa extends Producto
{
    /**public function __construct($mobil){
        parent::__construct();
        $this->mobil = $mobil;
    }*/
    public function getCategoria()
    {

        return $this->categoria= "Pa";
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

}
class Bo extends Producto
{
    public function getCategoria()
    {

        return $this->categoria= "Brioixeria";
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

}

class Dia extends Producto
{
     protected $ingredientes;

      public function __construct($idProduct,$name, $categoria, $precio, $imagen, $descripcion,$ingredientes)
    {
        parent::__construct($idProduct,$name, $categoria, $precio, $imagen, $descripcion);
        $this->ingredients = $ingredientes;
    }
    public function getCategoria()
    {

        return $this->categoria= "diada";
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    public function getIngredientes()
    {
        return $this->ingredientes;
    }
    public function setPrecio($ingredientes)
    {
        $this->ingredientes = $ingredientes;
    }

}


?>