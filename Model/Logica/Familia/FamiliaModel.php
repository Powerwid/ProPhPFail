<?php
require_once '../../Config/DB.php';
require_once '../Entidades/Familia.php';

class FamiliaModel {
    private $db;

    public function __construct() {
        $dbInstance = new DB();
        $this->db = $dbInstance->conectar();
    }

    public function guardar(Familia $familia) {
        $sql = "INSERT INTO familia (nombre, descripcion) VALUES (:nombre, :descripcion)";
        $ps = $this->db->prepare($sql);
        $nombre = $familia->getNombre();
        $descripcion = $familia->getDescripcion();
        $ps->bindParam(":nombre", $nombre);
        $ps->bindParam(":descripcion", $descripcion);
        $ps->execute();
    }

    public function cargar() {
        $sql = "SELECT * FROM familia";
        $ps = $this->db->prepare($sql);
        $ps->execute();
        $filas = $ps->fetchAll();
        $familias = array();
        foreach ($filas as $fila) {
            $familia = new Familia();
            $familia->setIdFamilia($fila['idfamilia']);
            $familia->setNombre($fila['nombre']);
            $familia->setDescripcion($fila['descripcion']);
            $familias[] = $familia;
        }
        return $familias;
    }

    public function borrar($id) {
        $sql = "DELETE FROM familia WHERE idfamilia = :id";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":id", $id);
        $ps->execute();
    }

    public function modificar(Familia $familia) {
        $sql = "UPDATE familia SET nombre = :nombre, descripcion = :descripcion WHERE idfamilia = :id";
        $ps = $this->db->prepare($sql);
        $nombre = $familia->getNombre();
        $descripcion = $familia->getDescripcion();
        $id = $familia->getIdFamilia();
        $ps->bindParam(":nombre", $nombre);
        $ps->bindParam(":descripcion", $descripcion);
        $ps->bindParam(":id", $id);
        $ps->execute();
    }
}