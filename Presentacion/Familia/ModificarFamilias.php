<?php
require_once '../../Logica/Familia/FamiliaController.php';

$controller = new FamiliaController();
$familia = null;

if (isset($_GET['id'])) {
    $familias = $controller->cargarFamilias();
    foreach ($familias as $f) {
        if ($f->getIdFamilia() == $_GET['id']) {
            $familia = $f;
            break;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $controller->modificarFamilia($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
    header("Location: CargarFamilias.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modificar Familia</title>
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
    <h2>Modificar Familia</h2>
    <?php if ($familia): ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $familia->getIdFamilia(); ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($familia->getNombre()); ?>" required>
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" value="<?php echo htmlspecialchars($familia->getDescripcion()); ?>" required>
            <input type="submit" value="Modificar">
        </form>
    <?php else: ?>
        <p>Familia no encontrada.</p>
    <?php endif; ?>
    <p><a href="CargarFamilias.php" class="btn">Volver</a></p>
</body>
</html>