<?php 
    require '../Logica/LFamilia.php';
    $log = new LFamilia();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Familias</title>
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
    <h2>Familias</h2>
    <table>
        <tr>
            <th>ID Familia</th>
            <th>Nombre</th>
            <th>Descripción</th>
        </tr>
        <?php 
            foreach($log->cargar() as $familia) {
                echo "<tr>";
                echo "<td>" . $familia->getIdFamilia() . "</td>";
                echo "<td>" . $familia->getNombre() . "</td>";
                echo "<td>" . $familia->getDescripcion() . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <p><a href="GuardarFamilias.php">Guardar Familia</a></p>
</body>
</html>