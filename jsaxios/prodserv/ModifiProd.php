<?php
$conexion = new mysqli("localhost","root","","bdPet");
$i=0;
$opcion=0;
$Nombre=$_POST['nombre'];
$Precio=$_POST['precio'];
$Imagen=$_FILES['foto']['name'];
$Desc=$_POST['descripcion'];
$Cate=$_POST['categoria'];
$Id=$_POST['Id'];
$Img=$_POST['Img'];
$permitidos=array("image/jpg","image/png","image/jpeg");
    if($Imagen==null){
         $query = "UPDATE tblproductos SET vchNombre='".$Nombre."',fltPrecio='".$Precio."',vchImagen='".$Img."',vchDescripcion='".$Desc."',vchIdcategoria='".$Cate."' WHERE vchIdproducto='$Id'";
         $resultado= $conexion->query($query);
         if($resultado){
             $opcion=1;
         }

         echo $opcion;
    }else{
        $limite_kib=200;
        if(in_array($_FILES['foto']['type'],$permitidos) && $_FILES['foto']['size']<=$limite_kib * 1024)
        {
            $ruta="imagenes/producto/".$Img;
            unlink($ruta);
            $ruta="imagenes/producto/".$nomimagen=$_FILES['foto']['name'];
            move_uploaded_file($_FILES["foto"]["tmp_name"],$ruta);
            $query = "UPDATE tblproductos SET vchNombre='".$Nombre."',fltPrecio='".$Precio."',vchImagen='".$Imagen."',vchDescripcion='".$Desc."',vchIdcategoria='".$Cate."' WHERE vchIdproducto='$Id'";
            $resultado= $conexion->query($query);
            if($resultado){
                $opcion=2;
            }
            echo $opcion;
       }
    }

    
?>