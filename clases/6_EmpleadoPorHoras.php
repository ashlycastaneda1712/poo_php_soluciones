<?php
require_once '6_Empleado.php';

class EmpleadoPorHoras extends Empleado {
    private $horasTrabajadas;
    private $pagoPorHora;

    public function setHorasTrabajadas($horasTrabajadas) {
        $this->horasTrabajadas = $horasTrabajadas;
    }

    public function setPagoPorHora($pagoPorHora) {
        $this->pagoPorHora = $pagoPorHora;
    }

    public function calcularTotalGanado() {
        return $this->sueldoBase + ($this->horasTrabajadas * $this->pagoPorHora);
    }

    public function calcularSueldoLiquido() {
        return $this->calcularTotalGanado() - $this->calcularIGSS();
    }

    public function mostrarInfoCompleta() {
        return $this->mostrarInfoBase() . 
               " | Horas Trabajadas: " . $this->horasTrabajadas . 
               " | Pago por Hora: Q" . number_format($this->pagoPorHora, 2) . 
               " | Total Ganado: Q" . number_format($this->calcularTotalGanado(), 2) . 
               " | IGSS: Q" . number_format($this->calcularIGSS(), 2) . 
               " | Sueldo Líquido: Q" . number_format($this->calcularSueldoLiquido(), 2);
    }
}
?>