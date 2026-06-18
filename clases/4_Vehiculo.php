<?php

class Vehiculo {
    protected $placa;
    protected $marca;
    protected $modelo;
    protected $precio;

    public function setPlaca($placa) {
        $this->placa = $placa;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getPlaca() {
        return $this->placa;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function mostrarInfoBase() {
        return "Placa: " . $this->placa . " | Marca: " . $this->marca . " | Modelo: " . $this->modelo . " | Precio: Q" . number_format($this->precio, 2);
    }
}
?>