<?php
$conexion = new mysqli("localhost","root","","bdmototaxi");
$i=0;
$opcion=0;
$fecha = date("Y-m-d"); 
$Nombre=$_POST['Nombre'];
$Apellidos=$_POST['Apellidos'];
$Telefono=$_POST['Telefono'];
$Direccion=$_POST['Direccion'];
$Licencia=$_POST['Licencia'];
$Activo='0';
$Correo=$_POST['Correo'];
$Password=$_POST['Password1'];
$CategoriaSocursal=$_POST['CategoriaSocursal'];
$CategoriaMototaxi=$_POST['CategoriaMotoTaxi'];
        $query2="call SpInsertTaxista(?,?,?,?,?,?,?,?,?,?,?);";
        $stmt=$conexion->prepare($query2);
        $stmt->bind_param("sssssssssss",$Nombre,$Apellidos,$Telefono,$Direccion,$Correo,$CategoriaSocursal,$fecha,$Password,$Licencia,$Activo,$CategoriaMototaxi );
        $stmt->execute();
        $ok=$stmt->affected_rows;
        echo json_encode($ok);
?>