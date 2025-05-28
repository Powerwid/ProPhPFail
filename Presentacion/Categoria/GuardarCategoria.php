<?php
require_once '../../Logica/Categoria/CategoriaController.php';

$controller = new CategoriaController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->guardarCategoria($_POST['nombre'], $_POST['idfamilia']);
    header("Location: CargarCategoria.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Guardar Categoria</title>
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
    <h2>Guardar Nueva Categoria</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="idfamilia">ID Familia:</label>
        <input type="number" id="idfamilia" name="idfamilia" required>
        <input type="submit" value="Guardar">
    </form>
    <p><a href="CargarCategoria.php" class="btn">Ver Categorias</a></p>
</body>
</html>