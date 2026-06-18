<?php
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoSeleccionado = $_POST['tipo_cuenta'];
    
    if ($tipoSeleccionado == "ahorro") {
        require_once 'clases/5_CuentaAhorro.php';
        $ahorro = new CuentaAhorro();

        $ahorro->setNumeroCuenta($_POST['numeroCuenta']);
        $ahorro->setTitular($_POST['titular']);
        $ahorro->setSaldo($_POST['saldo']);

        $ahorro->setTasaInteres($_POST['tasaInteres']);
        
        $resultado = "
            <<div class='card-resultado'>
                <h3>¡Cuenta Registrada!</h3>
                <p>" . $ahorro->mostrarInfoCompleta() . "</p>
            </div>
        ";
    } elseif ($tipoSeleccionado == "corriente"){
        require_once 'clases/5_CuentaCorriente.php';
        $corriente = new CuentaCorriente();

        $corriente->setNumeroCuenta($_POST['numeroCuenta']);
        $corriente->setTitular($_POST['titular']);
        $corriente->setSaldo($_POST['saldo']);

        $corriente->setLimiteDebitoMensual($_POST['LimiteDebitoMensual']);
        $corriente->setLimiteDebitoDiario($_POST['LimiteDebitoDiario']);

        $resultado = "
        <div class='card-resultado'>
                <h3>¡Cuenta Registrada!</h3>
                <p>" . $corriente->mostrarInfoCompleta() . "</p>
            </div>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Bancario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }
        .container {
            max-width: 550px;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .seccion-especifica {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 15px;
            border: 1px dashed #bbb;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .card-resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #e7f3fe;
            border-left: 6px solid #2196F3;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<header>
    <h3>Ejercicio 5: Sistema Bancario</h3>
</header>
<div class="container">
    <h2>Sistema Bancario (Herencia POO)</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label>Seleccione el tipo de Cuenta:</label>
            <select name="tipo_cuenta" id="tipo_cuenta" onchange="alternarCampos()" required>
                <option value="ahorro">Cuenta de Ahorro</option>
                <option value="corriente">Cuenta Corriente</option>
            </select>
        </div>

        <div class="form-group">
            <label>Número de Cuenta:</label>
            <input type="text" name="numeroCuenta" required>
        </div>
        <div class="form-group">
            <label>Titular de la Cuenta:</label>
            <input type="text" name="titular" required>
        </div>
        <div class="form-group">
            <label>Saldo Inicial:</label>
            <input type="number" step="0.01" name="saldo" required>
        </div>

        <div id="cuentaAhorro" class="seccion-especifica">
            <h4>Datos específicos de la Cuenta de Ahorro</h4>
            <div class="form-group">
                <label>Tasa de Interés (%):</label>
                <input type="number" step="0.01" name="tasaInteres" placeholder="Ej. 5.5">
            </div>
        </div>

        <div id="cuentaCorriente" class="seccion-especifica" style="display: none;">
            <h4>Datos específicos de la Cuenta Corriente</h4>
            <div class="form-group">
                <label>Límite de Débito Mensual:</label>
                <input type="number" step="0.01" name="limiteDebitoMensual" placeholder="Ej. 5000">
            </div>
            <div class="form-group">
                <label>Límite de Débito Diario:</label>
                <input type="number" step="0.01" name="limiteDebitoDiario" placeholder="Ej. 1000">
            </div>
        </div>

        <button type="submit">Registrar y Mostrar Cuenta</button>
    </form>
    <?php if (!empty($resultado)) echo $resultado; ?>
</div>

<script>
function alternarCampos() {
    var tipo = document.getElementById("tipo_cuenta").value;
    var cuentaAhorro = document.getElementById("cuentaAhorro");
    var cuentaCorriente = document.getElementById("cuentaCorriente");

    if (tipo === "ahorro") {
        cuentaAhorro.style.display = "block";
        cuentaCorriente.style.display = "none";
    } else {
        cuentaAhorro.style.display = "none";
        cuentaCorriente.style.display = "block";
    }
}
</script>

</body>
</html>