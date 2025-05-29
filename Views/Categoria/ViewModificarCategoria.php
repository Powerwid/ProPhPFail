<?php
require_once '../../Controller/CategoriaController.php';
$controller = new CategoriaController();
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id) {
    $categorias = $controller->cargarCategorias();
    $categoria = null;
    foreach ($categorias as $cat) {
        if ($cat->getIdcategoria() == $id) {
            $categoria = $cat;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Modificar Categoría</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { width: 50%; margin: 0 auto; }
        input[type="text"], select { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 3px; }
        input[type="submit"] { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 3px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <h2>Modificar Categoría</h2>
    <?php if ($categoria): ?>
        <form action="index.php?controller=categoria&accion=modificar&id=<?= $categoria->getIdcategoria() ?>" method="post">
            <input type="text" name="nombre" value="<?= $categoria->getNombre() ?>" required>
            <input type="text" name="idfamilia" value="<?= $categoria->getIdfamilia() ?>" required>
            <input type="submit" value="Modificar">
        </form>
    <?php else: ?>
        <p>Categoría no encontrada.</p>
    <?php endif; ?>
</body>
</html>