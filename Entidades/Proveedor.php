<?php
    class Proveedor {
        private $idproveedor;
        private $nombre;
        private $ruc;

        public function getIdProveedor() {
            return $this->idproveedor;
        }

        public function setIdProveedor($idproveedor) {
            $this->idproveedor = $idproveedor;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function getRuc() {
            return $this->ruc;
        }

        public function setRuc($ruc) {
            $this->ruc = $ruc;
        }
    }
?>