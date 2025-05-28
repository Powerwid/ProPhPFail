<?php
require_once '../../Logica/Familia/FamiliaController.php';

$controller = new FamiliaController();

if (isset($_GET['id'])) {
    $controller->borrarFamilia($_GET['id']);
    header("Location: CargarFamilias.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Borrar Familia</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .btn { background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 3px; }
        .btn:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <h2>Borrar Familia</h2>
    <p>La familia ha sido eliminada.</p>
    <p><a href="CargarFamilias.php" class="btn">Volver</a></p>
</body>
</html>