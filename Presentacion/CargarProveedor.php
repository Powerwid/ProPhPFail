<?php    
    require_once '../Logica/LProveedor.php';
    $log = new LProveedor();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Proveedor</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
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
    <p><a href="GuardarProveedor.php">Guardar Proveedor</a></p>
</body>
</html>