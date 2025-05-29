<?php
require_once __DIR__ . '/../Model/Logica/Familia/FamiliaModel.php';

class FamiliaController {
    private $model;

    public function __construct() {
        $this->model = new FamiliaModel();
    }

    public function guardarFamilia($nombre, $descripcion) {
        $familia = new Familia();
        $familia->setNombre($nombre);
        $familia->setDescripcion($descripcion);
        $this->model->guardar($familia);
    }

    public function cargarFamilias() {
        return $this->model->cargar();
    }

    public function borrarFamilia($id) {
        $this->model->borrar($id);
    }

    public function modificarFamilia($id, $nombre, $descripcion) {
        $familia = new Familia();
        $familia->setIdFamilia($id);
        $familia->setNombre($nombre);
        $familia->setDescripcion($descripcion);
        $this->model->modificar($familia);
    }
}
?>