<?php 
    require_once '..Logica/LFamilia.php';
    $fam=new Familia();
    $fam->setNombre($_POST['aaa']);
    $fam->setDescripcion($_POST['bbb']);
    $log=new LFamilia();
    $log->guardar($fam);
    echo 'DATO GUARDADO';
?>