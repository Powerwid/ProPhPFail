<?php
require_once '../../Controller/ProveedorController.php';
$controller = new ProveedorController();
$proveedores = $controller->cargarProveedores();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Proveedores</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
        .btn { background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 3px; }
        .btn:hover { background-color: #0056b3; }
        .delete-btn { background-color: #dc3545; margin-right: 5px; }
        .delete-btn:hover { background-color: #c82333; }
        .edit-btn { background-color: #28a745; }
        .edit-btn:hover { background-color: #218838; }
    </style>
</head>
<body>
    <h2>Proveedores</h2>
    <table>
        <tr>
            <th>ID Proveedor</th>
            <th>Nombre</th>
            <th>RUC</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($proveedores as $proveedor): ?>
            <tr>
                <td><?= $proveedor->getIdProveedor() ?></td>
                <td><?= $proveedor->getNombre() ?></td>
                <td><?= $proveedor->getRuc() ?></td>
                <td>
                    <a href="index.php?controller=proveedor&accion=modificar&id=<?= $proveedor->getIdProveedor() ?>" class="btn edit-btn">Modificar</a>
                    <a href="index.php?controller=proveedor&accion=borrar&id=<?= $proveedor->getIdProveedor() ?>" class="btn delete-btn" onclick="return confirm('¿Seguro que quieres borrar este proveedor?');">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="index.php?controller=proveedor&accion=guardar" class="btn">Guardar Proveedor</a></p>
</body>
</html>