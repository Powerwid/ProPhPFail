<?php
require_once '../../Logica/Categoria/CategoriaController.php';

$controller = new CategoriaController();
$categoria = null;

if (isset($_GET['id'])) {
    $categorias = $controller->cargarCategorias();
    foreach ($categorias as $c) {
        if ($c->getIdcategoria() == $_GET['id']) {
            $categoria = $c;
            break;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $controller->modificarCategoria($_POST['id'], $_POST['nombre'], $_POST['idfamilia']);
    header("Location: CargarCategoria.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modificar Categoria</title>
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
    <h2>Modificar Categoria</h2>
    <?php if ($categoria): ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $categoria->getIdcategoria(); ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($categoria->getNombre()); ?>" required>
            <label for="idfamilia">ID Familia:</label>
            <input type="number" id="idfamilia" name="idfamilia" value="<?php echo htmlspecialchars($categoria->getIdfamilia()); ?>" required>
            <input type="submit" value="Modificar">
        </form>
    <?php else: ?>
        <p>Categoria no encontrada.</p>
    <?php endif; ?>
    <p><a href="CargarCategoria.php" class="btn">Volver</a></p>
</body>
</html>