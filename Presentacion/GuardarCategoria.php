<?php 
    require '../Logica/LCategoria.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cat = new Categoria();
        $cat->setNombre($_POST['nombre']);
        $cat->setIdfamilia($_POST['idfamilia']);
        $log = new LCategoria();
        $log->guardar($cat);
        // Redirigir a la página de categorías después de guardar
        header("Location: CargarCategoria.php");
        exit(); // Siempre usa exit después de una redirección para detener la ejecución del script
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Guardar Categoria</title>
    <style>
        form {
            width: 50%;
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label, input {
            display: block;
            margin: 10px 0;
        }
        input[type="submit"] {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Guardar Nueva Categoria</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="idfamilia">ID Familia:</label>
        <input type="number" id="idfamilia" name="idfamilia" required>
        <input type="submit" value="Guardar">
    </form>
    <p><a href="CargarCategoria.php">Ver Categorias</a></p>
    
</body>
</html>