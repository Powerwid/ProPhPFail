<?php
    require '../Entidades/Familia.php';

    interface IProveedor {
        public function guardar(Proveedor $proveedor);
        public function cargar();
    }
?>