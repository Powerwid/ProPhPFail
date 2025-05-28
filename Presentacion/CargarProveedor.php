<?php    
    require_once '../Logica/LProveedor.php';
    $log = new LProveedor();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Proveedor</title>
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
    <h2>Proveedor</h2>
    <table>
        <tr>
            <th>ID Proveedor</th>
            <th>Nombre</th>
            <th>RUC</th>
        </tr>
        <?php
            $proveedores = $log->cargar();
            if (empty($proveedores)) {
                echo "<tr><td colspan='3'>No hay proveedores registrados.</td></tr>";
            } else {
                foreach($proveedores as $proveedor) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($proveedor->getIdProveedor()) . "</td>";
                    echo "<td>" . htmlspecialchars($proveedor->getNombre()) . "</td>";
                    echo "<td>" . htmlspecialchars($proveedor->getRuc()) . "</td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
    <p><a href="GuardarProveedor.php" class="btn">Guardar Proveedor</a></p>
</body>
</html>