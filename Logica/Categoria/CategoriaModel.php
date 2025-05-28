<?php
require_once '../../Datos/DB.php';
require_once 'ICategoria.php';

class CategoriaModel implements ICategoria {
    public function guardar(Categoria $categoria) {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "INSERT INTO categoria (nombre, idfamilia) VALUES (:nom, :idfam)";
        $ps = $cn->prepare($sql);
        $nombre = $categoria->getNombre();
        $idfamilia = $categoria->getIdfamilia();
        $ps->bindValue(':nom', $nombre);
        $ps->bindValue(':idfam', $idfamilia);
        $ps->execute();
    }

    public function cargar() {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "SELECT * FROM categoria";
        $ps = $cn->prepare($sql);
        $ps->execute();
        $categorias = array();
        $filas = $ps->fetchAll();
        foreach ($filas as $f) {
            $cat = new Categoria();
            $cat->setIdcategoria($f[0]);
            $cat->setNombre($f[1]);
            $cat->setIdfamilia($f[2]);
            array_push($categorias, $cat);
        }
        return $categorias;
    }

    public function borrar($id) {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "DELETE FROM categoria WHERE idcategoria = :id";
        $ps = $cn->prepare($sql);
        $ps->bindParam(":id", $id);
        $ps->execute();
    }

    public function modificar(Categoria $categoria) {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "UPDATE categoria SET nombre = :nom, idfamilia = :idfam WHERE idcategoria = :id";
        $ps = $cn->prepare($sql);
        $id = $categoria->getIdcategoria();
        $nombre = $categoria->getNombre();
        $idfamilia = $categoria->getIdfamilia();
        $ps->bindParam(":id", $id);
        $ps->bindParam(":nom", $nombre);
        $ps->bindParam(":idfam", $idfamilia);
        $ps->execute();
    }
}
?>