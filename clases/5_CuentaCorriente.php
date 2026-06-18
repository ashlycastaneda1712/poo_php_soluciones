 <?php
 require_once '5_CuentaBancaria.php';

 class CuentaCorriente extends CuentaBancaria {
    private $limiteDebitoMensual;
    private $limiteDebitoDiario;

    public function setLimiteDebitoMensual($limiteDebitoMensual){
        $this->LimiteDebitoMensual = $limiteDebitoMensual;
    }
    Public function setLimiteDebitoDiario($limiteDebitoDiario){
        $this->LimiteDebitoDiario = $limiteDebitoDiario;
    }
    public function mostrarInfoCompleta() {
        return $this->mostrarInfoBase() . " | Limite Debito Mensual: " . $this->LimiteDebitoMensual . " | Limite Debito Diario: " . $this->setLimiteDebitoDiario;
    }
 }
 ?>