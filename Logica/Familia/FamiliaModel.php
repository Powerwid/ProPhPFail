<?php
require_once '../../Datos/DB.php';
require_once 'IFamilia.php';

class FamiliaModel implements IFamilia {
    public function guardar(Familia $familia) {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "INSERT INTO familia (nombre, descripcion) VALUES (:nom, :des)";
        $ps = $cn->prepare($sql);
        $nombre = $familia->getNombre();
        $descripcion = $familia->getDescripcion();
        $ps->bindParam(":nom", $nombre);
        $ps->bindParam(":des", $descripcion);
        $ps->execute();
    }

    public function cargar() {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "SELECT * FROM familia";
        $ps = $cn->prepare($sql);
        $ps->execute();
        $familias = array();
        $filas = $ps->fetchAll();
        foreach ($filas as $f) {
            $fam = new Familia();
            $fam->setIdFamilia($f[0]);
            $fam->setNombre($f[1]);
            $fam->setDescripcion($f[2]);
            array_push($familias, $fam);
        }
        return $familias;
    }

    public function borrar($id) {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "DELETE FROM familia WHERE idfamilia = :id";
        $ps = $cn->prepare($sql);
        $ps->bindParam(":id", $id);
        $ps->execute();
    }

    public function modificar(Familia $familia) {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "UPDATE familia SET nombre = :nom, descripcion = :des WHERE idfamilia = :id";
        $ps = $cn->prepare($sql);
        $id = $familia->getIdFamilia();
        $nombre = $familia->getNombre();
        $descripcion = $familia->getDescripcion();
        $ps->bindParam(":id", $id);
        $ps->bindParam(":nom", $nombre);
        $ps->bindParam(":des", $descripcion);
        $ps->execute();
    }
}
?>