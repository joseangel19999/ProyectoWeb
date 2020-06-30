<?php
$conexion = new mysqli("localhost","Adminjose","adminjose","bdmototaxi");
$Opc=$_POST['Opc'];
$i=0;
$opcion=0;
switch($Opc){
    case 1:
    $Id=$_POST['Id'];
    $Nombre=$_POST['Nombre'];
    $Dire=$_POST['Direccion'];
    $Telefono=$_POST['Telefono'];
    $Correo=$_POST['Correo'];
    $query2="call SpInsertSocursal(?,?,?,?,?)";
    $stmt=$conexion->prepare($query2);
    $stmt->bind_param("sssss",$Id,$Nombre,$Dire,$Telefono,$Correo);
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
        $query2="call SpSelectSocursal();";
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
        $query2="call SpDeleteSocursal(?);";
        $stmt=$conexion->prepare($query2);
        $stmt->bind_param("s",$Curp);
        $stmt->execute();
        $ok=$stmt->affected_rows;
        echo json_encode($ok);
    break;
    case 4:
    $Curp=$_POST['Id'];
    $Nombre=$_POST['Nombre'];
    $Direccion=$_POST['Direccion'];
    $Telefono=$_POST['Telefono'];
    $Correo=$_POST['Correo'];
    $query2="call SpUpdateSocursal(?,?,?,?,?)";
    $stmt=$conexion->prepare($query2);
    $stmt->bind_param("sssss",$Curp,$Nombre,$Direccion,$Telefono,$Correo);
    $stmt->execute();
    $ok=$stmt->affected_rows;
    echo json_encode($ok);
    break;
}
?>