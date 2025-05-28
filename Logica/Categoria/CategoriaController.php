<?php
require_once 'CategoriaModel.php';

class CategoriaController {
    private $model;

    public function __construct() {
        $this->model = new CategoriaModel();
    }

    public function guardarCategoria($nombre, $idfamilia) {
        $categoria = new Categoria();
        $categoria->setNombre($nombre);
        $categoria->setIdfamilia($idfamilia);
        $this->model->guardar($categoria);
    }

    public function cargarCategorias() {
        return $this->model->cargar();
    }

    public function borrarCategoria($id) {
        $this->model->borrar($id);
    }

    public function modificarCategoria($id, $nombre, $idfamilia) {
        $categoria = new Categoria();
        $categoria->setIdCategoria($id);
        $categoria->setNombre($nombre);
        $categoria->setIdfamilia($idfamilia); 
        $this->model->modificar($categoria);
    }
}
?>