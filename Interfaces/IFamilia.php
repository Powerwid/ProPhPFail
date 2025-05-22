<?php 
    require_once '../Entidades/Familia.php';
    interface IFamiliañ{
        public function guardar(Familia $familia);
        public function cargar();

    }
?>