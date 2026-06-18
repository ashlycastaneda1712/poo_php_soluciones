<?php
    require_once 'clases/libro.php';
    
    $resultado = ""; 

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $libro = new libro();
        
        $libro->setIsbn($_POST['isbn']);
        $libro->setTitulo($_POST['titulo']);
        $libro->setAutor($_POST['autor']);
        $libro->setAnioPublicacion($_POST['anioPublicacion']);
        $infoLibro = $libro->obtenerInformacionCompleta();

        $resultado = "
            <div class='card-resultado'>
                <h3>¡Libro Registrado Exitosamente!</h3>
                <p>" . $infoLibro . "</p>
            </div>
        ";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual</title>
</head>
<body>
    <header>
        <h3>Ejercicio 3: Biblioteca Virtual</h3>
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
        <h2>Biblioteca Virtual</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>ISBN:</label>
                <input type="number" name="isbn" required>
            </div>
            <div class="form-group">
                <label>Título:</label>
                <input type="text" name="titulo" required>
            </div>
            <div class="form-group">
                <label>Autor:</label>
                <input type="text" name="autor" required>
            </div>
            <div class="form-group">
                <label>Año de Publicación:</label>
                <input type="number" name="anioPublicacion" required>
            </div>
            <button type="submit">Registrar Libro</button>
        </form>
        
        <?php if (!empty($resultado)) echo $resultado; ?>
    </div>
</body>
</html>