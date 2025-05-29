<?php
require_once '../Controller/FamiliaController.php';
$controller = new FamiliaController();
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id) {
    $familias = $controller->cargarFamilias();
    $familia = null;
    foreach ($familias as $fam) {
        if ($fam->getIdFamilia() == $id) {
            $familia = $fam;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Modificar Familia</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { width: 50%; margin: 0 auto; }
        input[type="text"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 3px; }
        input[type="submit"] { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 3px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <h2>Modificar Familia</h2>
    <?php if ($familia): ?>
        <form action="index.php?controller=familia&accion=modificar&id=<?= $familia->getIdFamilia() ?>" method="post">
            <input type="text" name="nombre" value="<?= $familia->getNombre() ?>" required>
            <input type="text" name="descripcion" value="<?= $familia->getDescripcion() ?>" required>
            <input type="submit" value="Modificar">
        </form>
    <?php else: ?>
        <p>Familia no encontrada.</p>
    <?php endif; ?>
</body>
</html>