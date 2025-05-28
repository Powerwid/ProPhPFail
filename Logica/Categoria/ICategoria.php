<?php 
    require_once '../../Entidades/Categoria.php';
    interface ICategoria{
        public function guardar(Categoria $categoria);
        public function cargar();
        public function borrar($id);
        public function modificar(Categoria $categoria);
    }
?>