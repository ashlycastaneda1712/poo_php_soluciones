<?php
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoEmpleado = $_POST['tipo_empleado'];

    if ($tipoEmpleado == "completo") {
        require_once 'clases/6_EmpleadoTiempoCompleto.php';
        $emp = new EmpleadoTiempoCompleto();

        $emp->setCodigoEmpleado($_POST['codigoEmpleado']);
        $emp->setNombre($_POST['nombre']);
        $emp->setPuesto($_POST['puesto']);
        $emp->setSueldoBase($_POST['sueldoBase']);

        $emp->setBono($_POST['bono']);

        $resultado = "
            <div class='card-resultado'>
                <h3>¡Empleado de Tiempo Completo Registrado!</h3>
                <p>" . $emp->mostrarInfoCompleta() . "</p>
            </div>
        ";

    } elseif ($tipoEmpleado == "horas") {
        require_once 'clases/6_EmpleadoPorHoras.php';
        $emp = new EmpleadoPorHoras();

        $emp->setCodigoEmpleado($_POST['codigoEmpleado']);
        $emp->setNombre($_POST['nombre']);
        $emp->setPuesto($_POST['puesto']);
        $emp->setSueldoBase($_POST['sueldoBase']);

        $emp->setHorasTrabajadas($_POST['horasTrabajadas']);
        $emp->setPagoPorHora($_POST['pagoPorHora']);

        $resultado = "
            <div class='card-resultado'>
                <h3>¡Empleado por Horas Registrado!</h3>
                <p>" . $emp->mostrarInfoCompleta() . "</p>
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
    <title>Control de Personal</title>
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
            word-wrap: break-word;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Control de Personal (Herencia y Cálculos)</h2>
    
    <form method="POST" action="">
        <div class="form-group">
            <label>Seleccione Tipo de Contratación:</label>
            <select name="tipo_empleado" id="tipo_empleado" onchange="alternarCampos()" required>
                <option value="completo">Tiempo Completo</option>
                <option value="horas">Por Horas</option>
            </select>
        </div>

        <div class="form-group">
            <label>Código del Empleado:</label>
            <input type="text" name="codigoEmpleado" required>
        </div>
        <div class="form-group">
            <label>Nombre Completo:</label>
            <input type="text" name="nombre" required>
        </div>
        <div class="form-group">
            <label>Puesto:</label>
            <input type="text" name="puesto" required>
        </div>
        <div class="form-group">
            <label>Sueldo Base (Q):</label>
            <input type="number" step="0.01" name="sueldoBase" required>
        </div>

        <div id="campos_completo" class="seccion-especifica">
            <h4>Datos de Tiempo Completo</h4>
            <div class="form-group">
                <label>Bono Mensual (Q):</label>
                <input type="number" step="0.01" name="bono" placeholder="Ej. 250.00">
            </div>
        </div>

        <div id="campos_horas" class="seccion-especifica" style="display: none;">
            <h4>Datos de Contratación por Horas</h4>
            <div class="form-group">
                <label>Horas Trabajadas:</label>
                <input type="number" name="horasTrabajadas" placeholder="Ej. 40">
            </div>
            <div class="form-group">
                <label>Pago por Hora (Q):</label>
                <input type="number" step="0.01" name="pagoPorHora" placeholder="Ej. 50.00">
            </div>
        </div>

        <button type="submit">Calcular y Mostrar Nómina</button>
    </form>

    <?php if (!empty($resultado)) echo $resultado; ?>
</div>

<script>
function alternarCampos() {
    var tipo = document.getElementById("tipo_empleado").value;
    var camposCompleto = document.getElementById("campos_completo");
    var camposHoras = document.getElementById("campos_horas");

    if (tipo === "completo") {
        camposCompleto.style.display = "block";
        camposHoras.style.display = "none";
    } else {
        camposCompleto.style.display = "none";
        camposHoras.style.display = "block";
    }
}
</script>

</body>
</html>