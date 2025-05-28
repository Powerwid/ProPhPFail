<?php
require_once '../../Logica/Familia/FamiliaController.php';

$controller = new FamiliaController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->guardarFamilia($_POST['nombre'], $_POST['descripcion']);
    header("Location: CargarFamilias.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Guardar Familias</title>
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
    <h2>Guardar Nueva Familia</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required>
        <input type="submit" value="Guardar">
    </form>
    <p><a href="CargarFamilias.php" class="btn">Ver Familias</a></p>
</body>
</html>