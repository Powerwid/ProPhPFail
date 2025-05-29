<?php 
require_once __DIR__ . '/../Model/Logica/Proveedor/ProveedorModel.php';
class ProveedorController {
    private $model;

    public function __construct() {
        $this->model = new ProveedorModel();
    }

    public function guardarProveedor($nombre, $ruc) {
        $proveedor = new Proveedor();
        $proveedor->setNombre($nombre);
        $proveedor->setRuc($ruc);
        $this->model->guardar($proveedor);

    }

    public function cargarProveedores() {
        return $this->model->cargar();
    }

    public function borrarProveedor($id) {
        $this->model->borrar($id);
    }

    public function modificarProveedor($id, $nombre, $ruc) {
        $proveedor = new Proveedor();
        $proveedor->setIdProveedor($id);
        $proveedor->setNombre($nombre);
        $proveedor->setRuc($ruc);
        $this->model->modificar($proveedor);
    }
}

?>