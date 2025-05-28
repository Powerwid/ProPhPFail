<?php
require_once '../../Logica/Categoria/CategoriaController.php';

$controller = new CategoriaController();

if (isset($_GET['id'])) {
    $controller->borrarCategoria($_GET['id']);
    header("Location: CargarCategoria.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Borrar Categoria</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .btn { background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 3px; }
        .btn:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <h2>Borrar Categoria</h2>
    <p>La categoría ha sido eliminada.</p>
    <p><a href="CargarCategoria.php" class="btn">Volver</a></p>
</body>
</html>