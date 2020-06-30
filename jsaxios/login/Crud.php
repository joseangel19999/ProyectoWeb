<?php
$conexion = new mysqli("localhost","root","","bdPet");
$opcion=0;
$Usuario=$_POST['Usuario'];
    //preparar 
    $stmt=$conexion->prepare("call sp_conSocios(?)");
    $stmt->bind_param('s',$Usuario);
    $stmt->execute();
    //recibir datos de la consulta 
    $res=$stmt->get_result();
    $registro=$res->fetch_assoc();
    echo json_encode($registro);
?>

