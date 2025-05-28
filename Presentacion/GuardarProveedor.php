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
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
        .btn { background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 3px; }
        .btn:hover { background-color: #0056b3; }
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
    <p><a href="http://localhost:3000/Presentacion/CargarProveedor.php" class="btn">Ver Proveedores</a></p>
</body>
</html>