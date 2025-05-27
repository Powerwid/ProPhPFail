<?php 
    require_once '../Logica/LCategoria.php';
    $log=new LCategoria();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Categorias</title>
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
    <h2>Categorias</h2>
    <table>
        <tr>
            <th>ID Categoria</th>
            <th>Nombre</th>
            <th>ID Familia</th>
        </tr>
        <?php 
            foreach($log->cargar() as $categoria) {
                echo "<tr>";
                echo "<td>" . $categoria->getIdcategoria() . "</td>";
                echo "<td>" . $categoria->getNombre() . "</td>";
                echo "<td>" . $categoria->getIdfamilia() . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <p><a href="GuardarCategoria.php">Guardar Categoria</a></p>
</body>
</html>