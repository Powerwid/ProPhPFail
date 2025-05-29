<?php
require_once '../Controller/CategoriaController.php';
$controller = new CategoriaController();
$categorias = $controller->cargarCategorias();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Categorías</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
        .btn { background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 3px; }
        .btn:hover { background-color: #0056b3; }
        .delete-btn { background-color: #dc3545; margin-right: 5px; }
        .delete-btn:hover { background-color: #c82333; }
        .edit-btn { background-color: #28a745; }
        .edit-btn:hover { background-color: #218838; }
    </style>
</head>
<body>
    <h2>Categorías</h2>
    <table>
        <tr>
            <th>ID Categoría</th>
            <th>Nombre</th>
            <th>ID Familia</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?= $categoria->getIdcategoria() ?></td>
                <td><?= $categoria->getNombre() ?></td>
                <td><?= $categoria->getIdfamilia() ?></td>
                <td>
                    <a href="index.php?controller=categoria&accion=modificar&id=<?= $categoria->getIdcategoria() ?>" class="btn edit-btn">Modificar</a>
                    <a href="index.php?controller=categoria&accion=borrar&id=<?= $categoria->getIdcategoria() ?>" class="btn delete-btn" onclick="return confirm('¿Seguro que quieres borrar esta categoría?');">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="index.php?controller=categoria&accion=guardar" class="btn">Guardar Categoría</a></p>
</body>
</html>