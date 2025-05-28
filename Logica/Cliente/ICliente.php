<?php
require_once '../../Entidades/Cliente.php';

interface ICliente {
    public function guardar(Cliente $cliente);
    public function cargar();
    public function borrar($id);
    public function modificar(Cliente $cliente);
}
?>