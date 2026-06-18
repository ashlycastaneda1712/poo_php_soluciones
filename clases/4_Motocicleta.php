<?php
require_once '4_Vehiculo.php';

class Motocicleta extends Vehiculo {
    private $cilindrada;
    private $tipoMoto;

    public function setCilindrada($cilindrada) {
        $this->cilindrada = $cilindrada;
    }

    public function setTipoMoto($tipoMoto) {
        $this->tipoMoto = $tipoMoto;
    }

    public function mostrarInfoCompleta() {
        return $this->mostrarInfoBase() . " | Cilindrada: " . $this->cilindrada . "cc | Tipo de Moto: " . $this->tipoMoto;
    }
}
?>