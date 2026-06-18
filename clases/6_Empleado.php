<?php

class Empleado {
    protected $codigoEmpleado;
    protected $nombre;
    protected $puesto;
    protected $sueldoBase;

    public function setCodigoEmpleado($codigoEmpleado) {
        $this->codigoEmpleado = $codigoEmpleado;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPuesto($puesto) {
        $this->puesto = $puesto;
    }

    public function setSueldoBase($sueldoBase) {
        $this->sueldoBase = $sueldoBase;
    }

    public function getCodigoEmpleado() {
        return $this->codigoEmpleado;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPuesto() {
        return $this->puesto;
    }

    public function getSueldoBase() {
        return $this->sueldoBase;
    }

    public function calcularIGSS() {
        return $this->sueldoBase * 0.0483;
    }

    public function mostrarInfoBase() {
        return "Código: " . $this->codigoEmpleado . " | Nombre: " . $this->nombre . " | Puesto: " . $this->puesto . " | Sueldo Base: Q" . number_format($this->sueldoBase, 2);
    }
}
?>