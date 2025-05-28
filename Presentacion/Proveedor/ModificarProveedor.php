<?php 
require_once '../../Logica/Proveedor/ProveedorController.php';
$controller = new ProveedorController();
$proveedor = null;
if (isset($_GET['id'])) {
    $proveedores = $controller->cargarProveedores($_GET['id']);
    foreach ($proveedores as $p) {
        if ($p->getIdProveedor() == $_GET['id']) {
            $proveedor = $p;
            break;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ID'])) {
    $controller->modificarProveedor($_POST['ID'], $_POST['nombre'], $_POST['ruc']);
    header("Location: CargarProveedor.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modificar Proveedor</title>
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
    <h2>Modificar Proveedor</h2>
    <?php if ($proveedor): ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="ID" value="<?php echo $proveedor->getIdProveedor(); ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($proveedor->getNombre()); ?>" required>
            <label for="ruc">RUC:</label>
            <input type="text" id="ruc" name="ruc" value="<?php echo htmlspecialchars($proveedor->getRuc()); ?>" required>
            <input type="submit" value="Modificar">
        </form>
    <?php else: ?>
        <p>Proveedor no encontrado.</p>
    <?php endif; ?>
    <p><a href="CargarProveedor.php" class="btn">Volver</a></p>
</body>
</head>
