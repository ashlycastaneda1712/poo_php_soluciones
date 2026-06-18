<?php
    require_once 'clases/Empleado.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $empleado = new Empleado();

        $empleado->setNombre($_POST['nombre']);
        $empleado->setPuesto($_POST['puesto']);
        $empleado->setHorasTrabajadas($_POST['horasTrabajadas']);
        $empleado->setPagoPorHora($_POST['pagoPorHora']);
        $salarioBruto = $empleado->calcularSalario();
        $igss = $empleado->calcularIGSS();
        $sueldoLiquido = $empleado->calcularSueldoLiquido();


    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h3>Ejercicio 2: Registro de Empleado</h3>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            background: white;
            padding: 20px;
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
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .card-resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #e7f3fe;
            border-left: 6px solid #2196F3;
            border-radius: 4px;
        }
</style>
    </header>
    <div class="container">
    <h2>Registro de Empleado</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
        </div>
        <div class="form-group">
            <label>Puesto:</label>
            <input type="text" name="puesto" required>
        </div>
        <div class="form-group">
            <label>Horas Trabajadas:</label>
            <input type="number" name="horasTrabajadas" required>
        </div>
        <div class="form-group">
            <label>Pago por Hora:</label>
            <input type="number" name="pagoPorHora" step="0.01" required>
        </div>
        <button type="submit">Registrar Empleado</button>
    </form>
    <?php if (isset($salarioBruto)): ?>
        <div class="card-resultado">
            <h4>Resultados para <?php echo $empleado->getNombre(); ?>:</h4>
            <p><strong>Puesto:</strong> <?php echo $empleado->getPuesto(); ?></p>
            <p><strong>Salario Bruto:</strong> Q<?php echo number_format($salarioBruto, 2); ?></p>
            <p><strong>IGSS:</strong> Q<?php echo number_format($igss, 2); ?></p>
            <p><strong>Sueldo Líquido:</strong> Q<?php echo number_format($sueldoLiquido, 2); ?></p>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
