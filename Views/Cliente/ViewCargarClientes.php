<?php
require_once '../../Controller/ClienteController.php';
$controller = new ClienteController();
$clientes = $controller->ajustes = $controller->cargarClientes();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Clientes</title>
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
    <h2>Clientes</h2>
    <table>
        <tr>
            <th>ID Cliente</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>DNI</th>
            <th>Celular</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= $cliente->getIdCliente() ?></td>
                <td><?= $cliente->getNombre() ?></td>
                <td><?= $cliente->getApellidos() ?></td>
                <td><?= $cliente->getDni() ?></td>
                <td><?= $cliente->getCelular() ?></td>
                <td><?= $cliente->getDireccion() ?></td>
                <td>
                    <a href="index.php?controller=cliente&accion=modificar&id=<?= $cliente->getIdCliente() ?>" class="btn edit-btn">Modificar</a>
                    <a href="index.php?controller=cliente&accion=borrar&id=<?= $cliente->getIdCliente() ?>" class="btn delete-btn" onclick="return confirm('¿Seguro que quieres borrar este cliente?');">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="index.php?controller=cliente&accion=guardar" class="btn">Guardar Cliente</a></p>
</body>
</html>