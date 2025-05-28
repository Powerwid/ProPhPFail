<?php 
    require_once '../Logica/LCategoria.php';
    $log=new LCategoria();
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
    <p><a href="GuardarCategoria.php" class="btn">Guardar Categoria</a></p>
</body>
</html>