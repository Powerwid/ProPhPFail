<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../Logica/Cliente/ClienteController.php';

$controller = new ClienteController();
$clientes = $controller->cargarClientes();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
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
    <h2>Clientes</h2>
    <table>
        <tr>
            <th>ID Cliente</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Celular</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
        <?php
        if (!empty($clientes) && is_array($clientes)) {
            foreach ($clientes as $cliente) {
                echo "<tr>";
                echo "<td>" . $cliente->getIdCliente() . "</td>";
                echo "<td>" . $cliente->getNombre() . "</td>";
                echo "<td>" . $cliente->getApellidos() . "</td>"; // Cambiado a getApellidos
                echo "<td>" . $cliente->getDni() . "</td>";
                echo "<td>" . $cliente->getCelular() . "</td>";
                echo "<td>" . $cliente->getDireccion() . "</td>";
                echo "<td>";
                echo "<a href='ModificarCliente.php?id=" . $cliente->getIdCliente() . "' class='btn edit-btn'>Modificar</a>";
                echo "<a href='BorrarCliente.php?id=" . $cliente->getIdCliente() . "' class='btn delete-btn' onclick=\"return confirm('¿Seguro que quieres borrar este cliente?');\">Borrar</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No hay clientes para mostrar.</td></tr>";
        }
        ?>
    </table>
    <p><a href="GuardarCliente.php" class="btn">Guardar Cliente</a></p>
</body>
</html>