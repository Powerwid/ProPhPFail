<?php
require_once '../../Controller/ProveedorController.php';
$controller = new ProveedorController();
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id) {
    $proveedores = $controller->cargarProveedores();
    $proveedor = null;
    foreach ($proveedores as $prov) {
        if ($prov->getIdProveedor() == $id) {
            $proveedor = $prov;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Modificar Proveedor</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { width: 50%; margin: 0 auto; }
        input[type="text"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 3px; }
        input[type="submit"] { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 3px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <h2>Modificar Proveedor</h2>
    <?php if ($proveedor): ?>
        <form action="index.php?controller=proveedor&accion=modificar&id=<?= $proveedor->getIdProveedor() ?>" method="post">
            <input type="text" name="nombre" value="<?= $proveedor->getNombre() ?>" required>
            <input type="text" name="ruc" value="<?= $proveedor->getRuc() ?>" required>
            <input type="submit" value="Modificar">
        </form>
    <?php else: ?>
        <p>Proveedor no encontrado.</p>
    <?php endif; ?>
</body>
</html>