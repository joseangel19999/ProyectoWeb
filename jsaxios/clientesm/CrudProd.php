<?php
$conexion = new mysqli("localhost", "root", "", "bdmototaxi");
$Opc = $_POST['Opc'];
$i = 0;
$opcion = 0;
switch ($Opc) {
    case 2:
        $query2 = "call SpSelectAreaEmpl();";
        $stmt = $conexion->prepare($query2);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($fila = mysqli_fetch_assoc($res)) {
            $rowdata[$i] = $fila;
            $i++;
        }
        echo json_encode($rowdata);
        break;
    case 5:
        $Idcate = $_POST['Idcate'];
        $query2 = "call SpSelectPuestoEmp();";
        $stmt = $conexion->prepare($query2);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($fila = mysqli_fetch_assoc($res)) {
            if ($fila['chIdPuesto'] != $Idcate) {
                $rowdata[$i] = $fila;
            }
            $i++;
        }
        echo json_encode($rowdata);
        break;
    case 14:
        $query2 = "call SpSelectPuestoEmp();";
        $stmt = $conexion->prepare($query2);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($fila = mysqli_fetch_assoc($res)) {
            $rowdata[$i] = $fila;
            $i++;
        }
        echo json_encode($rowdata);
        break;
    case 11:
        $Idcate = $_POST['Idarea'];
        $query2 = "call SpSelectPuestoEmp();";
        $stmt = $conexion->prepare($query2);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($fila = mysqli_fetch_assoc($res)) {
            if ($fila['chIdPuesto'] != $Idcate) {
                $rowdata[$i] = $fila;
            }
            $i++;
        }
        echo json_encode($rowdata);
        break;
    case 8:
        $Idarea = $_POST['Idarea'];
        $query2 = "call SpSelectAreaEmpl();";
        $stmt = $conexion->prepare($query2);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($fila = mysqli_fetch_assoc($res)) {
            if ($fila['chIdArea'] != $Idarea) {
                $rowdata[$i] = $fila;
            }
            $i++;
        }
        echo json_encode($rowdata);
    break;
    case 13:
        $query2 = "call SpSelectAreaEmpl();";
        $stmt = $conexion->prepare($query2);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($fila = mysqli_fetch_assoc($res)) {
            $rowdata[$i] = $fila;
            $i++;
        }
        echo json_encode($rowdata);
        break;
    case 9:
        $query2 = "call SpComboSocursal();";
        $stmt = $conexion->prepare($query2);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($fila = mysqli_fetch_assoc($res)) {
            $rowdata[$i] = $fila;
            $i++;
        }
        echo json_encode($rowdata);
        break;
    case 3:
        $Id = $_POST['Id'];
        $query2 = "call SpDeleteDatoscliente(?);";
        $stmt = $conexion->prepare($query2);
        $stmt->bind_param("s", $Id);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($fila = mysqli_fetch_assoc($res)) {
            $rowdata[$i] = $fila;
            $i++;
        }
        $valor = implode(",", $rowdata);
        echo $valor;
        var_dump($valor);
        //var_dump("dato "+$rowdata);

        //echo json_decode($res);
        /*$query="SELECT * FROM tblproductos WHERE vchIdproducto=$Id";
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
                echo $nom2;*/
        break;
    case 4:
        $Curp = $_POST['Curp'];
        $Nombre = $_POST['Nombre'];
        $Apepa = $_POST['Apepa'];
        $Apema = $_POST['Apema'];
        $telefono = $_POST['Telefono'];
        $query = "UPDATE tblsocios SET vchNombre='$Nombre',vchApepA='$Apepa',vchApeMa='$Apema',vchTelefono='$telefono' WHERE vchCurp='$Curp' ";
        $resultado = $conexion->query($query);
        if ($resultado) {
            $opcion = 1;
        }
        echo $opcion;
        break;
    case 10:
        $Id = $_POST['Id'];
        $query2 = "call SpSelectCliente(?)";
        $stmt = $conexion->prepare($query2);
        $stmt->bind_param("i", $Id);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($fila = mysqli_fetch_assoc($res)) {
            $rowdata[$i] = $fila;
            $i++;
        }
        echo json_encode($rowdata);
        break;
    case 12:
        $IdEmp = $_POST['IdEmp'];
        $Nombre = $_POST['Nombre'];
        $Apellidos = $_POST['Apellidos'];
        $Telefono = $_POST['Telefono'];
        $Direccion = $_POST['Direccion'];
        $Correo = $_POST['Correo'];
        $Password = $_POST['Password1'];
        $CategoriaSocursal = $_POST['CategoriaSocursal'];
        $query2 = "call SpUpdateCliente(?,?,?,?,?,?,?,?);";
        $stmt = $conexion->prepare($query2);
        $stmt->bind_param("ssssssss", $IdEmp, $Nombre, $Apellidos, $Telefono, $Direccion, $Correo, $CategoriaSocursal, $Password);
        $stmt->execute();
        $ok = $stmt->affected_rows;
        echo json_encode($ok);
        break;
}
