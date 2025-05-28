<?php
require_once '../../Logica/Cliente/ClienteController.php';

$controller = new ClienteController();
$cliente = null;

if (isset($_GET['id'])) {
    $clientes = $controller->cargarClientes();
    foreach ($clientes as $c) {
        if ($c->getIdCliente() == $_GET['id']) {
            $cliente = $c;
            break;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $controller->modificarCliente($_POST['id'], $_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $_POST['celular'], $_POST['direccion']);
    header("Location: CargarCliente.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modificar Cliente</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .btn { background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 3px; }
        .btn:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <h2>Modificar Cliente</h2>
    <?php if ($cliente): ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $cliente->getIdCliente(); ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($cliente->getNombre()); ?>" required>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($cliente->getApellidos()); ?>" required>
            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" value="<?php echo htmlspecialchars($cliente->getDni()); ?>" required>
            <label for="celular">Celular:</label>
            <input type="text" id="celular" name="celular" value="<?php echo htmlspecialchars($cliente->getCelular()); ?>" required>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" value="<?php echo htmlspecialchars($cliente->getDireccion()); ?>" required>
            <input type="submit" value="Modificar">
        </form>
    <?php else: ?>
        <p>Cliente no encontrado.</p>
    <?php endif; ?>
    <p><a href="CargarCliente.php" class="btn">Volver</a></p>
</body>
</html>