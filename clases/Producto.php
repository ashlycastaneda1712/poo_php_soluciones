<?php
   class Producto{
    private $codigo;
    private $nombre;
    private $precio;
    private $existencia;

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setPrecio($precio){
        $this->precio = $precio;
    }
    public function setExistencia($existencia){
        $this->existencia = $existencia;
    }
    public function getCodigo(){
        return $this->codigo;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getExistencia(){
        return $this->existencia;
    }
    public function calcularValorInventario(){
        return $this->precio * $this->existencia;
    }
   }
?>