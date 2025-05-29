<?php
require './Config/DB.php';
require './Controller/CategoriaController.php';
require './Controller/ClienteController.php';
require './Controller/FamiliaController.php';
require './Controller/ProveedorController.php';

$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'FamiliaController';
$action = isset($_GET['accion']) ? $_GET['accion'] : 'cargarfamilias';

if (class_exists($controllerName)) {
    $controller = new $controllerName();
    switch ($action) {
        case 'guardar':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Handle POST data based on controller (example for Familia)
                if ($controllerName == 'FamiliaController') {
                    $controller->guardarFamilia($_POST['nombre'], $_POST['descripcion']);
                } elseif ($controllerName == 'CategoriaController') {
                    $controller->guardarCategoria($_POST['nombre'], $_POST['idfamilia']);
                } // Add similar conditions for Cliente and Proveedor
                header('Location: index.php?controller=' . strtolower(substr($controllerName, 0, -10)));
            } else {
                require './view/view' . ucfirst(strtolower(substr($controllerName, 0, -10))) . 'Guardar.php';
            }
            break;
        case 'cargar':
            $controller->{'cargar' . ucfirst(strtolower(substr($controllerName, 0, -10)) . 's')}();
            break;
        case 'borrar':
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            if ($id) $controller->{'borrar' . ucfirst(strtolower(substr($controllerName, 0, -10)))}($id);
            header('Location: index.php?controller=' . strtolower(substr($controllerName, 0, -10)));
            break;
        case 'modificar':
            
            break;
    }
} else {
    echo "Controller not found!";
}
?>