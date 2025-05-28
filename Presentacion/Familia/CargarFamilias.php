<?php
require_once '../../Logica/Familia/FamiliaController.php';

$controller = new FamiliaController();
$familias = $controller->cargarFamilias();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Familias</title>
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
    <h2>Familias</h2>
    <table>
        <tr>
            <th>ID Familia</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        <?php 
            foreach ($familias as $familia) {
                echo "<tr>";
                echo "<td>" . $familia->getIdFamilia() . "</td>";
                echo "<td>" . $familia->getNombre() . "</td>";
                echo "<td>" . $familia->getDescripcion() . "</td>";
                echo "<td>";
                echo "<a href='ModificarFamilias.php?id=" . $familia->getIdFamilia() . "' class='btn edit-btn'>Modificar</a>";
                echo "<a href='BorrarFamilias.php?id=" . $familia->getIdFamilia() . "' class='btn delete-btn' onclick=\"return confirm('¿Seguro que quieres borrar esta familia?');\">Borrar</a>";
                echo "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <p><a href="GuardarFamilias.php" class="btn">Guardar Familia</a></p>
</body>
</html>