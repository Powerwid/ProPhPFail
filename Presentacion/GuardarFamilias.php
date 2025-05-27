<?php
    require '../Logica/LFamilia.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fam = new Familia();
        $fam->setNombre($_POST['nombre']);
        $fam->setDescripcion($_POST['descripcion']);
        $log = new LFamilia();
        $log->guardar($fam);
        // Redirigir a CargarFamilias.php después de guardar
        header("Location: CargarFamilias.php");
        exit(); // Siempre usa exit después de una redirección para detener la ejecución del script
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Guardar Familias</title>
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
    <h2>Guardar Nueva Familia</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required>
        <input type="submit" value="Guardar">
    </form>
    <p><a href="CargarFamilias.php">Ver Familias</a></p>
</body>
</html>