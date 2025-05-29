<?php
require_once '../../Config/DB.php';
require_once '../Entidades/Proveedor.php';

class ProveedorModel {
    private $db;

    public function __construct() {
        $dbInstance = new DB();
        $this->db = $dbInstance->conectar();
    }

    public function guardar(Proveedor $proveedor) {
        $sql = "INSERT INTO proveedor (nombre, ruc) VALUES (:nombre, :ruc)";
        $ps = $this->db->prepare($sql);
        $nombre = $proveedor->getNombre();
        $ruc = $proveedor->getRuc();
        $ps->bindParam(":nombre", $nombre);
        $ps->bindParam(":ruc", $ruc);
        $ps->execute();
    }

    public function cargar() {
        $sql = "SELECT * FROM proveedor";
        $ps = $this->db->prepare($sql);
        $ps->execute();
        $filas = $ps->fetchAll();
        $proveedores = array();
        foreach ($filas as $fila) {
            $proveedor = new Proveedor();
            $proveedor->setIdProveedor($fila['idproveedor']);
            $proveedor->setNombre($fila['nombre']);
            $proveedor->setRuc($fila['ruc']);
            $proveedores[] = $proveedor;
        }
        return $proveedores;
    }

    public function borrar($id) {
        $sql = "DELETE FROM proveedor WHERE idproveedor = :id";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":id", $id);
        $ps->execute();
    }

    public function modificar(Proveedor $proveedor) {
        $sql = "UPDATE proveedor SET nombre = :nombre, ruc = :ruc WHERE idproveedor = :id";
        $ps = $this->db->prepare($sql);
        $nombre = $proveedor->getNombre();
        $ruc = $proveedor->getRuc();
        $id = $proveedor->getIdProveedor();
        $ps->bindParam(":nombre", $nombre);
        $ps->bindParam(":ruc", $ruc);
        $ps->bindParam(":id", $id);
        $ps->execute();
    }
}