<?php 
    require_once '..Logica/LFamilia.php';
    $cat=new Categoria();
    $cat->setNombre($_POST['aaa']);
    $cat->setIdfamilia($_POST['1']);
    $log=new LCategoria();
    $log->guardar($cat);
    echo 'DATO GUARDADO';
?>