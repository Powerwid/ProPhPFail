<?php
    require '../Datos/DB.php';
    require '../Interfaces/IFamilia.php';

    class LFamilia implements IFamilia {
        public function guardar(Familia $familia) {
            $db = new DB();
            $cn = $db->conectar();
            $sql = "insert into familia (nombre, descripcion) values (:nom, :des)";
            $ps = $cn->prepare($sql);
            
            // Almacenar los valores en variables antes de vincularlos
            $nombre = $familia->getNombre();
            $descripcion = $familia->getDescripcion();
            
            $ps->bindParam(":nom", $nombre);
            $ps->bindParam(":des", $descripcion);
            $ps->execute();
        }

        public function cargar() {
            $db = new DB();
            $cn = $db->conectar();
            $sql = "select * from familia";
            $ps = $cn->prepare($sql);
            $ps->execute();
            $familias = array();
            $filas = $ps->fetchAll();
            foreach($filas as $f) {
                $fam = new Familia();
                $fam->setIdFamilia($f[0]);
                $fam->setNombre($f[1]);
                $fam->setDescripcion($f[2]);
                array_push($familias, $fam);
            }
            return $familias;
        }
    }
?>