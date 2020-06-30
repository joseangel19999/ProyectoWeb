<?php
   $conexion = new mysqli("localhost","root","","bdPet");
   $Opc=$_POST['Opc'];
   $i=0;
   $opcion=0;
   switch($Opc){
       case 2:
           $query="SELECT * FROM tblproductos";
           $resultado=mysqli_query($conexion,$query);
           while ($fila=mysqli_fetch_assoc($resultado)){
               $rowdata[$i]=$fila;
               $i++;
           }
           echo json_encode($rowdata);
       break;
       case 5:
            $query="SELECT * FROM tblcategoria";
            $resultado=mysqli_query($conexion,$query);
            while ($fila=mysqli_fetch_assoc($resultado)){
                $rowdata[$i]=$fila;
                $i++;
            }
            echo json_encode($rowdata);
        break;
       case 3:
           $Id=$_POST['Id'];
                $query="SELECT * FROM tblproductos WHERE vchIdproducto=$Id";
                $resultado=$conexion->query($query);
                $var=$row=$resultado->fetch_assoc();
                $nom2=$row['vchImagen'];
		        $resultado= $conexion->query($query);
                $query="DELETE FROM tblproductos WHERE vchIdproducto='$Id' ";
                $resultado= $conexion->query($query);
                if($resultado){
                    $opcion=1;
                    $ruta="imagenes/producto/".$nom2;
                    unlink($ruta);
                }
                echo $nom2;
       break;
       case 4:
       $Curp=$_POST['Curp'];
       $Nombre=$_POST['Nombre'];
       $Apepa=$_POST['Apepa'];
       $Apema=$_POST['Apema'];
       $telefono=$_POST['Telefono'];
   
       $query="UPDATE tblsocios SET vchNombre='$Nombre',vchApepA='$Apepa',vchApeMa='$Apema',vchTelefono='$telefono' WHERE vchCurp='$Curp' ";
           $resultado= $conexion->query($query);
           if($resultado){
               $opcion=1;
           }
           echo $opcion;
       break;
   }
?>