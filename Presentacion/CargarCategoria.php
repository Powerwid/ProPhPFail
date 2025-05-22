<?php 
    require '../Logica/LCategoria.php';
    $log=new LCategoria();
    foreach($log->cargar() as $categoria){
        echo $categoria->getNombre();
    }
?>