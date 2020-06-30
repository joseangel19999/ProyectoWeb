<?php
$conexion = new mysqli("localhost","root","","bdPet");
$i=0;
$opcion=0;
$Nombre=$_POST['Nombre'];
$Apellidos=$_POST['Apellidos'];
$Telefono=$_POST['Telefono'];
$Direccion=$_POST['Direccion'];
$Correo=$_POST['Correo'];
$Usuario=$_POST['Usuario'];
$Password=$_POST['Password1'];
$Cate=$_POST['categoria'];
$CategoriaArea=$_POST['CategoriaArea'];
$CategoriaSocursal=$_POST['CategoriaSocursal'];
$Id=$_POST['Id'];
        $query2="call SpInsertEmpleado10(?,?,?,?,?,?,?,?,?,?);";
        $stmt=$conexion->prepare($query2);
        $stmt->bind_param("sdssss",$Nombre,$Precio,$Imagen,$Desc,$Cate,$Id);
        $stmt->execute();
        $ok=$stmt->affected_rows;
        echo json_encode($ok);

?>