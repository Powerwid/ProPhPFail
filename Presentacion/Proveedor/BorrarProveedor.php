<?php 

require_once '../../Logica/Proveedor/ProveedorController.php';
$controller = new ProveedorController();
if (isset($_GET['id'])) {
    $controller->borrarProveedor($_GET['id']);
    header("Location: CargarProveedor.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Borrar Proveedor</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .btn { background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 3px; }
        .btn:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <h2>Borrar Proveedor</h2>
    <p>El proveedor ha sido eliminado.</p>
    <p><a href="CargarProveedor.php" class="btn">Volver</a></p>
</body>
</html>