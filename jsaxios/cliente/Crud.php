<?php
$conexion = new mysqli("localhost","root","","bdPet");
$Opc=$_POST['Opc'];
$i=0;
switch($Opc){
    case 1:
    $Curp=$_POST['Curp'];
    $Nombre=$_POST['Nombre'];
    $Apepa=$_POST['Apepa'];
    $Apema=$_POST['Apema'];
    $Telefono=$_POST['Telefono'];
    $Cargo=$_POST['Cargo'];
    $Direccion=$_POST['Direccion'];
    $Usuario=$_POST['Usuario'];
    $Password=$_POST['Password'];
    $query2="call sp_insertSocio(?,?,?,?,?,?,?,?,?);";
    $stmt=$conexion->prepare($query2);
    $stmt->bind_param("sssssssss",$Curp,$Nombre,$Apepa,$Apema,$Telefono,$Cargo,$Direccion, $Usuario,$Password);
    $stmt->execute();
    $ok=$stmt->affected_rows;
    echo json_encode($ok);
    break;
    case 2:
        $query2="call sp_consultaSocios();";
        $stmt=$conexion->prepare($query2);
        $stmt->execute();
        $res=$stmt->get_result();
        while ($fila=mysqli_fetch_assoc($res)){
            $rowdata[$i]=$fila;
            $i++;
        }
        echo json_encode($rowdata);
    break;
    case 3:
        $Curp=$_POST['Curp'];
        $query2="call sp_eliminarsocio(?);";
        $stmt=$conexion->prepare($query2);
        $stmt->bind_param("s",$Curp);
        $stmt->execute();
        $ok=$stmt->affected_rows;
        echo json_encode($ok);
    break;
    case 4:
    $Curp=$_POST['Curp'];
    $Nombre=$_POST['Nombre'];
    $Apepa=$_POST['Apepa'];
    $Apema=$_POST['Apema'];
    $telefono=$_POST['Telefono'];
    $Direccion=$_POST['Direccion'];
    $Correo=$_POST['Correo'];
    $Usuario=$_POST['Usuario'];
    $Password=$_POST['Password'];
    $query2="call sp_modificarSocio(?,?,?,?,?,?,?,?,?)";
    $stmt=$conexion->prepare($query2);
    $stmt->bind_param("sssssssss",$Curp,$Nombre,$Apepa, $Apema,$telefono,$Direccion,$Correo,$Usuario,$Password);
    $stmt->execute();
    $ok=$stmt->affected_rows;
    echo json_encode($ok);
}
?>