<?php
require_once '../../Entidades/Familia.php';

interface IFamilia {
    public function guardar(Familia $familia);
    public function cargar();
    public function borrar($id);
    public function modificar(Familia $familia);
}
?>