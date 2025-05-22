<?php 
    require '../Logica/LFamilia.php';
    $log=new LFamilia();
    foreach($log->cargar() as $familia){
        echo $familia->getNombre();
    }
?>