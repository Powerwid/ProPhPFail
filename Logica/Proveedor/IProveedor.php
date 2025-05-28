<?php
    require '../../Entidades/Proveedor.php';

    interface IProveedor {
        public function guardar(Proveedor $proveedor);
        public function cargar();
        public function borrar($id);
        public function modificar(Proveedor $proveedor);
    }
?>