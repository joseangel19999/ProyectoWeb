<?php
$conexion = new mysqli("localhost","Adminjose","adminjose","bdmototaxi");
$Opc=$_POST['Opc'];
$i=0;
$opcion=0;
switch($Opc){
    case 1:
    $Id=$_POST['Id'];
    $NombreArea=$_POST['NombreArea'];
    $DescripcionP=$_POST['Descripcion'];
    $query2="call InsertAreaEmpl(?,?,?)";
    $stmt=$conexion->prepare($query2);
    $stmt->bind_param("sss",$Id,$NombreArea,$DescripcionP);
    $stmt->execute();
    $ok=$stmt->affected_rows;
    echo json_encode($ok);
    break;
    case 2:
        $query2="call sp_conPuestos();";
        $stmt=$conexion->prepare($query2);
        $stmt->execute();
        $res=$stmt->get_result();
        while($file=mysqli_fetch_assoc($res)){
            $rowdata[$i]=$file;
            $i++;
        }
        echo json_encode($rowdata);
    break;
    case 5:
        $query2="call SpSelectAreaTrabajo();";
        $stmt=$conexion->prepare($query2);
        $stmt->execute();
        $res=$stmt->get_result();
        while($file=mysqli_fetch_assoc($res)){
            $rowdata[$i]=$file;
            $i++;
        }
		echo json_encode($rowdata);
    break;
    case 3:
        $Curp=$_POST['Id'];
        $query2="call SpDeleteAreaTrabajo(?);";
        $stmt=$conexion->prepare($query2);
        $stmt->bind_param("s",$Curp);
        $stmt->execute();
        $ok=$stmt->affected_rows;
        echo json_encode($ok);
    break;
    case 4:
    $Id=$_POST['Id'];
    $NombreArea=$_POST['NombreArea'];
    $Descripcion=$_POST['Descripcion'];
    $query2="call SpUpdateAreaTrabajo(?,?,?)";
    $stmt=$conexion->prepare($query2);
    $stmt->bind_param("sss",$Id,$NombreArea,$Descripcion);
    $stmt->execute();
    $ok=$stmt->affected_rows;
    echo json_encode($ok);
    break;
}
?>