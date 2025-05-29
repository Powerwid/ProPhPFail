<?php
require_once 'C:/Users/mandarina/Documents/Proyecto/BACKEND DEVELOPER WEB/Semana_2/MVC/ProPhPFail/Config/DB.php';
require_once __DIR__ . '/../../Entidades/Cliente.php';

class ClienteModel {
    private $db;

    public function __construct() {
        $dbInstance = new DB();
        $this->db = $dbInstance->conectar();
    }

    public function guardar(Cliente $cliente) {
        $sql = "INSERT INTO cliente (nombre, apellidos, dni, celular, direccion) VALUES (:nombre, :apellidos, :dni, :celular, :direccion)";
        $ps = $this->db->prepare($sql);
        $nombre = $cliente->getNombre();
        $apellidos = $cliente->getApellidos();
        $dni = $cliente->getDni();
        $celular = $cliente->getCelular();
        $direccion = $cliente->getDireccion();
        $ps->bindParam(":nombre", $nombre);
        $ps->bindParam(":apellidos", $apellidos);
        $ps->bindParam(":dni", $dni);
        $ps->bindParam(":celular", $celular);
        $ps->bindParam(":direccion", $direccion);
        $ps->execute();
    }

    public function cargar() {
        $sql = "SELECT * FROM cliente";
        $ps = $this->db->prepare($sql);
        $ps->execute();
        $filas = $ps->fetchAll();
        $clientes = array();
        foreach ($filas as $fila) {
            $cliente = new Cliente();
            $cliente->setIdCliente($fila['idcliente']);
            $cliente->setNombre($fila['nombre']);
            $cliente->setApellidos($fila['apellidos']);
            $cliente->setDni($fila['dni']);
            $cliente->setCelular($fila['celular']);
            $cliente->setDireccion($fila['direccion']);
            $clientes[] = $cliente;
        }
        return $clientes;
    }

    public function borrar($id) {
        $sql = "DELETE FROM cliente WHERE idcliente = :id";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":id", $id);
        $ps->execute();
    }

    public function modificar(Cliente $cliente) {
        $sql = "UPDATE cliente SET nombre = :nombre, apellidos = :apellidos, dni = :dni, celular = :celular, direccion = :direccion WHERE idcliente = :id";
        $ps = $this->db->prepare($sql);
        $nombre = $cliente->getNombre();
        $apellidos = $cliente->getApellidos();
        $dni = $cliente->getDni();
        $celular = $cliente->getCelular();
        $direccion = $cliente->getDireccion();
        $id = $cliente->getIdCliente();
        $ps->bindParam(":nombre", $nombre);
        $ps->bindParam(":apellidos", $apellidos);
        $ps->bindParam(":dni", $dni);
        $ps->bindParam(":celular", $celular);
        $ps->bindParam(":direccion", $direccion);
        $ps->bindParam(":id", $id);
        $ps->execute();
    }
}