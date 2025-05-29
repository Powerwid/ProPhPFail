<?php
require_once __DIR__ . '/../../Entidades/Categoria.php'; // Corrección de la ruta usando __DIR__
require_once __DIR__ . '/../../../Config/DB.php';


class CategoriaModel {
    private $db;

    public function __construct() {
        $dbInstance = new DB(); 
        $this->db = $dbInstance->conectar(); 
    }

    public function guardar(Categoria $categoria) {
        $sql = "INSERT INTO categoria (nombre, idfamilia) VALUES (:nombre, :idfamilia)";
        $ps = $this->db->prepare($sql);
        $nombre = $categoria->getNombre();
        $idfamilia = $categoria->getIdfamilia();
        $ps->bindParam(":nombre", $nombre);
        $ps->bindParam(":idfamilia", $idfamilia);
        $ps->execute();
    }

    public function cargar() {
        $sql = "SELECT * FROM categoria";
        $ps = $this->db->prepare($sql);
        $ps->execute();
        $filas = $ps->fetchAll();
        $categorias = array();
        foreach ($filas as $fila) {
            $categoria = new Categoria();
            $categoria->setIdcategoria($fila['idcategoria']);
            $categoria->setNombre($fila['nombre']);
            $categoria->setIdfamilia($fila['idfamilia']);
            $categorias[] = $categoria;
        }
        return $categorias;
    }

    public function borrar($id) {
        $sql = "DELETE FROM categoria WHERE idcategoria = :id";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":id", $id);
        $ps->execute();
    }

    public function modificar(Categoria $categoria) {
        $sql = "UPDATE categoria SET nombre = :nombre, idfamilia = :idfamilia WHERE idcategoria = :id";
        $ps = $this->db->prepare($sql);
        $nombre = $categoria->getNombre();
        $idfamilia = $categoria->getIdfamilia();
        $id = $categoria->getIdcategoria();
        $ps->bindParam(":nombre", $nombre);
        $ps->bindParam(":idfamilia", $idfamilia);
        $ps->bindParam(":id", $id);
        $ps->execute();
    }
}