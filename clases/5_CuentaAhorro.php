<?php
require_once '5_CuentaBancaria.php';

class CuentaAhorro extends CuentaBancaria {
    private $tasaInteres;

    public function setTasaInteres($tasaInteres){
        $this->tasaInteres = $tasaInteres;
    }
    public function mostrarInfoCompleta(){
        return $this->mostrarInfoBase() . " | Tasa de Interes: " . $this->tasaInteres;
    }
}
?>