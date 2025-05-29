<?php
require_once __DIR__ . '/../Model/Logica/Cliente/ClienteModel.php';

class ClienteController {
    private $model;

    public function __construct() {
        $this->model = new ClienteModel();
    }

    public function guardarCliente($nombre, $apellidos, $dni, $celular, $direccion) {
        $cliente = new Cliente();
        $cliente->setNombre($nombre);
        $cliente->setApellidos($apellidos);
        $cliente->setDni($dni);
        $cliente->setCelular($celular);
        $cliente->setDireccion($direccion);
        $this->model->guardar($cliente);
    }

    public function cargarClientes() {
        return $this->model->cargar();
    }

    public function borrarCliente($id) {
        $this->model->borrar($id);
    }

    public function modificarCliente($id, $nombre, $apellidos, $dni, $celular, $direccion) {
        $cliente = new Cliente();
        $cliente->setIdCliente($id);
        $cliente->setNombre($nombre);
        $cliente->setApellidos($apellidos);
        $cliente->setDni($dni);
        $cliente->setCelular($celular);
        $cliente->setDireccion($direccion);
        $this->model->modificar($cliente);
    }
}
?>