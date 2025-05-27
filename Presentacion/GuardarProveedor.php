<?php 
    require_once '../Entidades/Proveedor.php'; // Cambia a require_once
    require_once '../Logica/LProveedor.php'; // Usa require_once para LProveedor también

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pro = new Proveedor();
        $pro->setNombre($_POST['nombre']);
        $pro->setRuc($_POST['ruc']);
        $log = new LProveedor();
        $log->guardar($pro);
        header("Location: http://localhost:3000/Presentacion/CargarProveedor.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Guardar Proveedor</title>
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
    <h2>Guardar Nuevo Proveedor</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="ruc">RUC:</label>
        <input type="text" id="ruc" name="ruc" required>
        <input type="submit" value="Guardar">
    </form>
    <p><a href="http://localhost:3000/Presentacion/CargarProveedor.php">Ver Proveedores</a></p>
</body>
</html>