<?php
require_once '4_Vehiculo.php';

class Automovil extends Vehiculo {
    private $tipoVehiculo;
    private $numeroPuertas;
    private $tipoCombustible;

    public function setTipoVehiculo($tipoVehiculo) {
        $this->tipoVehiculo = $tipoVehiculo;
    }

    public function setNumeroPuertas($numeroPuertas) {
        $this->numeroPuertas = $numeroPuertas;
    }

    public function setTipoCombustible($tipoCombustible) {
        $this->tipoCombustible = $tipoCombustible;
    }

    public function mostrarInfoCompleta() {
        return $this->mostrarInfoBase() . " | Tipo: " . $this->tipoVehiculo . " | Puertas: " . $this->numeroPuertas . " | Combustible: " . $this->tipoCombustible;
    }
}
?>