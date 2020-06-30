<?php

class CtrPuesto{

    
    public static function ctrRegistroPuesto(){
        $nombre=null;
        if(isset($_POST['views'])){
            $nombre=$_POST['nombreSoc'];
            /*$tabla="tblpuesto";
            $datos=array(
                "Id"         =>$_POST['IdPuesto'],
                "Nombre"     =>$_POST['NombrePuesto'],
                "Descripcion"=>$_POST['DescPuesto']
            );
         $respuesta=mPuesto::mdRegistroPuesto($tabla,$datos);*/
        }

        echo "ok";;
    }
}
?>