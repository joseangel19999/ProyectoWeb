<?php
require_once "conexionBd.php";
$conectarBd = Conexion::getInstancia();
$opcion=0;
$Usuario=$_POST['Usuario'];
    $query='call SpUsuarios(?)'; 
    $rowdata[]=null;
    //preparar 
    $stmt=$conectarBd->prepare($query);
    $stmt->bindValue(1,$Usuario,PDO::PARAM_STR);
    $stmt->execute();
    while($row = $stmt->fetch()) {
        $rowdata[0] = $row['vchUsuario'];
        $rowdata[1] =$row['vchPassword'];
        $rowdata[2] =$row['vchNomPuesto'];
    }
    echo json_encode($rowdata);
?>
