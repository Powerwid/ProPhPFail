<?php
require_once '../../Controller/ClienteController.php';
$controller = new ClienteController();
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id) {
    $clientes = $controller->cargarClientes();
    $cliente = null;
    foreach ($clientes as $cli) {
        if ($cli->getIdCliente() == $id) {
            $cliente = $cli;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Modificar Cliente</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { width: 50%; margin: 0 auto; }
        input[type="text"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 3px; }
        input[type="submit"] { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 3px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <h2>Modificar Cliente</h2>
    <?php if ($cliente): ?>
        <form action="index.php?controller=cliente&accion=modificar&id=<?= $cliente->getIdCliente() ?>" method="post">
            <input type="text" name="nombre" value="<?= $cliente->getNombre() ?>" required>
            <input type="text" name="apellidos" value="<?= $cliente->getApellidos() ?>" required>
            <input type="text" name="dni" value="<?= $cliente->getDni() ?>" required>
            <input type="text" name="celular" value="<?= $cliente->getCelular() ?>" required>
            <input type="text" name="direccion" value="<?= $cliente->getDireccion() ?>" required>
            <input type="submit" value="Modificar">
        </form>
    <?php else: ?>
        <p>Cliente no encontrado.</p>
    <?php endif; ?>
</body>
</html>