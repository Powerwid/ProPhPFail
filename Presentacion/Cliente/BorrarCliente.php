<?php
require_once '../../Logica/Cliente/ClienteController.php';

$controller = new ClienteController();

if (isset($_GET['id'])) {
    $controller->borrarCliente($_GET['id']);
    header("Location: CargarCliente.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Borrar Cliente</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .btn { background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 3px; }
        .btn:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <h2>Borrar Cliente</h2>
    <p>El cliente ha sido eliminado.</p>
    <p><a href="CargarCliente.php" class="btn">Volver</a></p>
</body>
</html>