<?php
require_once '../../Datos/DB.php';
require_once 'IProveedor.php';

class ProveedorModel implements IProveedor {
    public function guardar(Proveedor $proveedor) {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "INSERT INTO proveedor (nombre, ruc) VALUES (:nom, :ruc)";
        $ps = $cn->prepare($sql);
        $nombre = $proveedor->getNombre();
        $ruc = $proveedor->getRuc();
        $ps->bindParam(":nom", $nombre);
        $ps->bindParam(":ruc", $ruc);
        $ps->execute();
    }

    public function cargar() {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "SELECT * FROM proveedor";
        $ps = $cn->prepare($sql);
        $ps->execute();
        $proveedores = array();
        $filas = $ps->fetchAll();
        foreach ($filas as $f) {
            $prov = new Proveedor();
            $prov->setIdProveedor($f[0]);
            $prov->setNombre($f[1]);
            $prov->setRuc($f[2]);
            array_push($proveedores, $prov);
        }
        return $proveedores;
    }

    public function borrar($id) {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "DELETE FROM proveedor WHERE idproveedor = :id";
        $ps = $cn->prepare($sql);
        $ps->bindParam(":id", $id);
        $ps->execute();
    }

    public function modificar(Proveedor $proveedor) {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "UPDATE proveedor SET nombre = :nom, ruc = :ruc WHERE idproveedor = :id";
        $ps = $cn->prepare($sql);
        $id = $proveedor->getIdProveedor();
        $nombre = $proveedor->getNombre();
        $ruc = 	$proveedor->getRuc();
        $ps->bindParam(":id", 	$id);
        $ps->bindParam(":nom", 	$nombre);
        $ps->bindParam(":ruc", 	$ruc);
       	$ps->execute();
    }
}

?>