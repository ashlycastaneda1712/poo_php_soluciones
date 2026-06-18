<?php
    require_once 'clases/Producto.php';

    $resultado = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $producto = new Producto();

        $producto->setCodigo($_POST['codigo']);
        $producto->setNombre($_POST['nombre']);
        $producto->setPrecio($_POST['precio']);
        $producto->setExistencia($_POST['existencia']);

        $valorInventario = $producto->calcularValorInventario();
    
        $resultado = "
            <div class='card-resultado'>
                <h3>Datos del Producto Registrado</h3>
                <p><strong>Código:</strong> " . $producto->getCodigo() . "</p>
                <p><strong>Nombre:</strong> " . $producto->getNombre() . "</p>
                <p><strong>Precio:</strong> " . number_format($producto->getPrecio(), 2) . "</p> 
                <p><strong>Existencia:</strong> " . $producto->getExistencia() . "</p>
                <hr>
                <p><strong>Valor Total del Inventario:</strong> Q" . number_format($valorInventario, 2) . "</p>
            </div>
        ";
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
        <h3>Ejercicio 1: Registro de Producto</h3>
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
    <h2>Registro de Producto</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label>Código:</label>
            <input type="text" name="codigo" required>
        </div>
        <div class="form-group">
            <label>Nombre del Producto:</label>
            <input type="text" name="nombre" required>
        </div>
        <div class="form-group">
            <label>Precio:</label>
            <input type="number" step="0.01" name="precio" required>
        </div>
        <div class="form-group">
            <label>Cantidad en Existencia:</label>
            <input type="number" name="existencia" required>
        </div>
        <button type="submit">Guardar y Calcular</button>
    </form>

    <?php if (!empty($resultado)) echo $resultado; ?>
</div>
</body>
</html>