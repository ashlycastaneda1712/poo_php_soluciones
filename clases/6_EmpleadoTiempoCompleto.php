<?php
require_once '6_Empleado.php';

class EmpleadoTiempoCompleto extends Empleado {
    private $bono;

    public function setBono($bono) {
        $this->bono = $bono;
    }

    public function calcularTotalGanado() {
        return $this->sueldoBase + $this->bono;
    }

    public function calcularSueldoLiquido() {
        return $this->calcularTotalGanado() - $this->calcularIGSS();
    }

    public function mostrarInfoCompleta() {
        return $this->mostrarInfoBase() . 
               " | Bono: Q" . number_format($this->bono, 2) . 
               " | Total Ganado: Q" . number_format($this->calcularTotalGanado(), 2) . 
               " | IGSS: Q" . number_format($this->calcularIGSS(), 2) . 
               " | Sueldo Líquido: Q" . number_format($this->calcularSueldoLiquido(), 2);
    }
}
?>