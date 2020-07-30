<?php
$conexion = new mysqli("localhost","root","","bdmototaxi");
$i=0;
$opcion=0;
$Nombre=$_POST['Nombre'];
$Apellidos=$_POST['Apellidos'];
$Telefono=$_POST['Telefono'];
$Direccion=$_POST['Direccion'];
$Correo=$_POST['Correo'];
$Password=$_POST['Password1'];
$CategoriaSocursal=$_POST['CategoriaSocursal'];
        $query2="call SpInsertCliente(?,?,?,?,?,?,?);";
        $stmt=$conexion->prepare($query2);
        $stmt->bind_param("sssssss",$Nombre,$Apellidos,$Telefono,$Direccion,$Correo,$CategoriaSocursal,$Password);
        $stmt->execute();
        $ok=$stmt->affected_rows;
        echo json_encode($ok);
?>