<?php

class CuentaBancaria {
    protected $numeroCuenta;
    protected $titular;
    protected $saldo;

    public function setNumeroCuenta($numeroCuenta){
        $this->numeroCuenta = $numeroCuenta;
    }
    public function setTitular($titular){
        $this->titular = $titular;
    }
    public function setSaldo($saldo){
        $this->saldo = $saldo;
    }
    public function getNumeroCuenta(){
        return $this->numeroCuenta;
    }
    public function getTitular(){
        return $this->titular;
    }
    public function getSaldo(){
        return $this->saldo;
    }
    public function mostrarInfoBase(){
        return "Numero de Cuenta: " . $this->numeroCuenta . " | Titular: " . $this->titular . " | Saldo: " . $this->saldo;
    }
}
?>