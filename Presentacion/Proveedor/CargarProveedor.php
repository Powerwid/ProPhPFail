<?php    
    require_once '../../Logica/Proveedor/ProveedorController.php';
    
    $controller = new ProveedorController();
    $proveedores = $controller->cargarProveedores();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Proveedores</title>
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
    <h2>Proveedores</h2>
    <table>
        <tr>
            <th>ID Proveedor</th>
            <th>Nombre</th>
            <th>RUC</th>
            <th>Acciones</th>
        </tr>
        <?php 
            foreach ($proveedores as $proveedor) {
                echo "<tr>";
                echo "<td>" . $proveedor->getIdProveedor() . "</td>";
                echo "<td>" . $proveedor->getNombre() . "</td>";
                echo "<td>" . $proveedor->getRuc() . "</td>";
                echo "<td>";
                echo "<a href='ModificarProveedor.php?id=" . $proveedor->getIdProveedor() . "' class='btn edit-btn'>Modificar</a>";
                echo "<a href='BorrarProveedor.php?id=" . $proveedor->getIdProveedor() . "' class='btn delete-btn' onclick=\"return confirm('¿Seguro que quieres borrar este proveedor?');\">Borrar</a>";
                echo "</td>";
                echo "</tr>";
                }
                ?>
        </table>
        <p><a href="GuardarProveedor.php" class="btn">Guardar Proveedor</a></p>
</html>
