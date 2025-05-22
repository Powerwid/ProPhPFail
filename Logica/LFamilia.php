<?php 
    require '../Datos/DB.php';
    require '../Interfaces/IFamilia.php';
    class LFamilia implements IFamilia{
        public function guardar (Familia $familia){
            $db=new DB();
            $cn=$db->conectar();
            $sql="insert into familia (nombre,descripcion) values (:nom,:des)";
            $ps=$cn->prepare($sql);
            $ps->bindParam(':nom',$familia->getNombre());
            $ps->bindParam(':des',$familia->getDescripcion());
            $ps->execute();

        }
        public function cargar(){
            $db=new DB();
            $cn=$db->conectar();
            $sql="select * from familia";
            $ps=$cn->prepare($sql);
            $ps->execute();
            $familia=array();
            $filas=$ps->fetchAll();
            foreach($filas as $f){
                $fam=new Familia();
                $fam->setIdfamilia($f[0]);
                $fam->setNombre($f[1]);
                $fam->setDescripcion($f[2]);
                array_push($familia,$fam);
            }
            return $familias;
        }
    }

?>