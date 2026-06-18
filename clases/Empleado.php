<?php
    class Empleado{
        private $nombre;
        private $puesto;
        private $horasTrabajadas;
        private $pagoPorHora;

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setPuesto($puesto){
            $this->puesto = $puesto;
        }
        public function setHorasTrabajadas($horasTrabajadas){
            $this->horasTrabajadas = $horasTrabajadas;
        }
        public function setPagoPorHora($pagoPorHora){
            $this->pagoPorHora = $pagoPorHora;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getPuesto(){
            return $this->puesto;
        }
        public function getHorasTrabajadas(){
            return $this->horasTrabajadas;
        }
        public function getPagoPorHora(){
            return $this->pagoPorHora;
        }
        public function calcularSalario(){
            return $this->horasTrabajadas * $this->pagoPorHora;
        }
        public function calcularIGSS(){
            return $this->calcularSalario() * 0.0483;
        }
        public function calcularSueldoLiquido(){
            return $this->calcularSalario() - $this->calcularIGSS();
        }
    }
?>