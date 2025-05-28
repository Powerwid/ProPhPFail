<?php
require_once '../../Datos/DB.php';
require_once 'ICliente.php';

class ClienteModel implements ICliente {
    public function guardar(Cliente $cliente) {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "INSERT INTO cliente (nombre, apellidos, dni, celular, direccion) VALUES (:nom, :ape, :dni, :cel, :dir)";
        $ps = $cn->prepare($sql);
        $nombre = $cliente->getNombre();
        $apellidos = $cliente->getApellidos();
        $dni = $cliente->getDni();
        $celular = $cliente->getCelular();
        $direccion = $cliente->getDireccion();
        $ps->bindParam(":nom", $nombre);
        $ps->bindParam(":ape", $apellidos);
        $ps->bindParam(":dni", $dni);
        $ps->bindParam(":cel", $celular);
        $ps->bindParam(":dir", $direccion);
        $ps->execute();
    }

    public function cargar() {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "SELECT * FROM cliente";
        $ps = $cn->prepare($sql);
        $ps->execute();
        $clientes = array();
        $filas = $ps->fetchAll();
        foreach ($filas as $f) {
            $cliente = new Cliente();
            $cliente->setIdCliente($f[0]);
            $cliente->setNombre($f[1]);   
            $cliente->setApellidos($f[2]); 
            $cliente->setDni($f[3]);      
            $cliente->setCelular($f[4]);   
            $cliente->setDireccion($f[5]); 
            array_push($clientes, $cliente);
        }
        return $clientes;
    }

    public function borrar($id) {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "DELETE FROM cliente WHERE idcliente = :id"; // Cambiado a minúsculas
        $ps = $cn->prepare($sql);
        $ps->bindParam(":id", $id);
        $ps->execute();
    }

    public function modificar(Cliente $cliente) {
        $db = new DB();
        $cn = $db->conectar();
        $sql = "UPDATE cliente SET nombre = :nom, apellidos = :ape, dni = :dni, celular = :cel, direccion = :dir WHERE idcliente = :id"; // Cambiado a minúsculas
        $ps = $cn->prepare($sql);
        $id = $cliente->getIdCliente();
        $nombre = $cliente->getNombre();
        $apellidos = $cliente->getApellidos();
        $dni = $cliente->getDni();
        $celular = $cliente->getCelular();
        $direccion = $cliente->getDireccion();
        $ps->bindParam(":id", $id);
        $ps->bindParam(":nom", $nombre);
        $ps->bindParam(":ape", $apellidos);
        $ps->bindParam(":dni", $dni);
        $ps->bindParam(":cel", $celular);
        $ps->bindParam(":dir", $direccion);
        $ps->execute();
    }
}
?>