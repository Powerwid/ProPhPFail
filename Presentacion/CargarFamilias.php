<?php 
    require '../Logica/LFamilia.php';
    $log = new LFamilia();
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
    <p><a href="GuardarFamilias.php" class="btn">Guardar Familia</a></p>
</body>
</html>