<?php
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoSeleccionado = $_POST['tipo_vehiculo'];

    if ($tipoSeleccionado == "auto") {
        require_once 'clases/4_Automovil.php';
        $auto = new Automovil();

        $auto->setPlaca($_POST['placa']);
        $auto->setMarca($_POST['marca']);
        $auto->setModelo($_POST['modelo']);
        $auto->setPrecio($_POST['precio']);

        $auto->setTipoVehiculo($_POST['tipoVehiculo']);
        $auto->setNumeroPuertas($_POST['numeroPuertas']);
        $auto->setTipoCombustible($_POST['tipoCombustible']);

        $resultado = "
            <div class='card-resultado'>
                <h3>¡Automóvil Registrado!</h3>
                <p>" . $auto->mostrarInfoCompleta() . "</p>
            </div>
        ";

    } elseif ($tipoSeleccionado == "moto") {
        require_once 'clases/4_Motocicleta.php';
        $moto = new Motocicleta();

        $moto->setPlaca($_POST['placa']);
        $moto->setMarca($_POST['marca']);
        $moto->setModelo($_POST['modelo']);
        $moto->setPrecio($_POST['precio']);

        $moto->setCilindrada($_POST['cilindrada']);
        $moto->setTipoMoto($_POST['tipoMoto']);

        $resultado = "
            <div class='card-resultado'>
                <h3>¡Motocicleta Registrada!</h3>
                <p>" . $moto->mostrarInfoCompleta() . "</p>
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
    <title>Sistema de Vehículos</title>
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
<header>
    <h3>Ejercicio 4: Sistema de Vehículos</h3>
</header>
<body>

<div class="container">
    <h2>Sistema de Vehículos (Herencia POO)</h2>
    
    <form method="POST" action="">
        <div class="form-group">
            <label>Seleccione el tipo de Vehículo:</label>
            <select name="tipo_vehiculo" id="tipo_vehiculo" onchange="alternarCampos()" required>
                <option value="auto">Automóvil</option>
                <option value="moto">Motocicleta</option>
            </select>
        </div>

        <div class="form-group">
            <label>Placa:</label>
            <input type="text" name="placa" required>
        </div>
        <div class="form-group">
            <label>Marca:</label>
            <input type="text" name="marca" required>
        </div>
        <div class="form-group">
            <label>Modelo (Año):</label>
            <input type="number" name="modelo" required>
        </div>
        <div class="form-group">
            <label>Precio:</label>
            <input type="number" step="0.01" name="precio" required>
        </div>

        <div id="campos_auto" class="seccion-especifica">
            <h4>Datos específicos del Automóvil</h4>
            <div class="form-group">
                <label>Tipo de Vehículo:</label>
                <select name="tipoVehiculo">
                    <option value="Sedán">Sedán</option>
                    <option value="Hatchback">Hatchback</option>
                    <option value="Pickup">Pickup</option>
                    <option value="Camioneta">Camioneta</option>
                </select>
            </div>
            <div class="form-group">
                <label>Número de Puertas:</label>
                <input type="number" name="numeroPuertas" value="4">
            </div>
            <div class="form-group">
                <label>Tipo de Combustible:</label>
                <input type="text" name="tipoCombustible" value="Gasolina">
            </div>
        </div>

        <div id="campos_moto" class="seccion-especifica" style="display: none;">
            <h4>Datos específicos de la Motocicleta</h4>
            <div class="form-group">
                <label>Cilindrada (cc):</label>
                <input type="text" name="cilindrada" placeholder="Ej. 150">
            </div>
            <div class="form-group">
                <label>Tipo de Moto:</label>
                <select name="tipoMoto">
                    <option value="Scooter">Scooter</option>
                    <option value="Naked">Naked</option>
                    <option value="Deportiva">Deportiva</option>
                    <option value="Cruiser">Cruiser</option>
                </select>
            </div>
        </div>

        <button type="submit">Registrar y Mostrar Vehículo</button>
    </form>

    <?php if (!empty($resultado)) echo $resultado; ?>
</div>

<script>
function alternarCampos() {
    var tipo = document.getElementById("tipo_vehiculo").value;
    var camposAuto = document.getElementById("campos_auto");
    var camposMoto = document.getElementById("campos_moto");

    if (tipo === "auto") {
        camposAuto.style.display = "block";
        camposMoto.style.display = "none";
    } else {
        camposAuto.style.display = "none";
        camposMoto.style.display = "block";
    }
}
</script>

</body>
</html>