<?php
require_once '../../Logica/Cliente/ClienteController.php';

$controller = new ClienteController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->guardarCliente($_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $_POST['celular'], $_POST['direccion']);
    header("Location: CargarCliente.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Guardar Cliente</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .btn { background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 3px; }
        .btn:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <h2>Guardar Nuevo Cliente</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required>
        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" required>
        <label for="celular">Celular:</label>
        <input type="text" id="celular" name="celular" required>
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required>
        <input type="submit" value="Guardar">
    </form>
    <p><a href="CargarCliente.php" class="btn">Ver Clientes</a></p>
</body>
</html>