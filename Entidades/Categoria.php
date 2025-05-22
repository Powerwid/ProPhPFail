<?php 
    class Categoria{
        private $idcategoria;
        private $nombre;
        private $idfamilia;

        public function getIdcategoria(){
            return $this->idcategoria;
        }

        public function setIdcategoria($idcategoria){
            $this->idcategoria=$idcategoria;
        }

        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            $this->nombre=$nombre;
        }
        public function getIdfamilia(){
            return $this->idfamilia;
        }
        public function setIdfamilia($idfamilia){
            $this->idfamilia=$idfamilia;
        }
    }
?>