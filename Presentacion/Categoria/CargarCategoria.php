<?php
require_once '../../Logica/Categoria/CategoriaController.php';
$controller = new CategoriaController();
$categorias = $controller->cargarCategorias();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Categorias</title>
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
    <h2>Categorias</h2>
    <table>
        <tr>
            <th>ID Categoria</th>
            <th>Nombre</th>
            <th>ID Familia</th>
            <th>Acciones</th>
        </tr>
        <?php
            foreach ($categorias as $categoria) {
                echo "<tr>";
                echo "<td>" . $categoria->getIdcategoria() . "</td>";
                echo "<td>" . $categoria->getNombre() . "</td>";
                echo "<td>" . $categoria->getIdfamilia() . "</td>";
                echo "<td>";
                echo "<a href='ModificarCategoria.php?id=" . $categoria->getIdcategoria() . "' class='btn edit-btn'>Modificar</a>";
                echo "<a href='BorrarCategoria.php?id=" . $categoria->getIdcategoria() . "' class='btn delete-btn' onclick=\"return confirm('¿Seguro que quieres borrar esta categoria?');\">Borrar</a>";
                echo "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <p><a href="GuardarCategoria.php" class="btn">Guardar Categoria</a></p>
</body>
</html>