<?php 
    require '../Datos/DB.php';
    require '../Interfaces/ICategoria.php';

    class LCategoria implements ICategoria{
        public function guardar (Categoria $categoria){
            $db=new DB();
            $cn=$db->conectar();
            $sql="insert into categoria (nombre,idfamilia) values (:nom,:idfam)";
            $ps=$cn->prepare($sql);

            // Almacenar los valores en variables antes de vincularlos
            $nombre = $categoria->getNombre();
            $idfamilia = $categoria->getIdfamilia();

            $ps->bindValue(':nom',$categoria->getNombre());
            $ps->bindValue(':idfam',$categoria->getIdfamilia());
            $ps->execute();
        }
        public function cargar(){
            $db=new DB();
            $cn=$db->conectar();
            $sql="select * from categoria";
            $ps=$cn->prepare($sql);
            $ps->execute();
            $categorias=array();
            $filas=$ps->fetchAll();
            foreach($filas as $f){
                $cat=new Categoria();
                $cat->setIdcategoria($f[0]);
                $cat->setNombre($f[1]);
                $cat->setIdfamilia($f[2]);
                array_push($categorias,$cat);
            }
            return $categorias;
        }          
    }
?>