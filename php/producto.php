<?php 

class Producto
{
    protected  $codigo;
    protected  $nombre;
    protected  $descripcion;

    public function __construct($codigo,$nombre,$descripcion) 
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }


    public function getCodigo(){
        return $this->codigo;
    }

    public function getNombre(){
        return $this->nombre;
    }

   public function getDescripcion(){
        return $this->descripcion;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
     }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getObject(){
        return $this->nombre." ".$this->descripcion." ".$this->codigo;
    }
}
?>