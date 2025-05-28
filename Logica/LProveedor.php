<?php
    // Configurando la ruta base para apuntar solo a ProPhPFail\Entidades\
    $basePath = __DIR__ . '/../../ProPhPFail/Entidades/'; // Ajustado para apuntar a ProPhPFail\Entidades\
    $proveedorPath = $basePath . 'Proveedor.php';
    $interfacePath = __DIR__ . '/../../ProPhPFail/Interfaces/IProveedor.php'; // Ajustado para Interfaces
    $dbPath = __DIR__ . '/../../ProPhPFail/Datos/DB.php'; // Ajustado para Datos

    // Depuración
    if (!file_exists($proveedorPath)) {
        die("Error: No se encontró el archivo Proveedor.php en $proveedorPath");
    }
    require_once $proveedorPath;

    if (!file_exists($interfacePath)) {
        die("Error: No se encontró el archivo IProveedor.php en $interfacePath");
    }
    require_once $interfacePath;

    if (!file_exists($dbPath)) {
        die("Error: No se encontró el archivo DB.php en $dbPath");
    }
    require_once $dbPath;

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    class LProveedor implements IProveedor {
        public function guardar(Proveedor $proveedor) {
            $db = new DB();
            $cn = $db->conectar();
            $sql = "insert into proveedor (nombre, ruc) values (:nom, :ruc)";
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
            $sql = "select * from proveedor";
            $ps = $cn->prepare($sql);
            $ps->execute();
            $proveedores = array();
            $filas = $ps->fetchAll();
            foreach($filas as $f) {
                $prov = new Proveedor();
                $prov->setIdProveedor($f[0]);
                $prov->setNombre($f[1]);
                $prov->setRuc($f[2]);
                array_push($proveedores, $prov);
            }
            return $proveedores;
        }
    }
?>