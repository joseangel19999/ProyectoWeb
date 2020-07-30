<?php
$conexion = new mysqli("localhost", "root", "", "bdmototaxi");
$Opc = $_POST['Opc'];
$i = 0;
$opcion = 0;
switch ($Opc) {
    case 2:
        $query2 = "call SpSelectTaxistaLista();";
        $stmt = $conexion->prepare($query2);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($fila = mysqli_fetch_assoc($res)) {
            $rowdata[$i] = $fila;
            $i++;
        }
        echo json_encode($rowdata);
        break;
    case 20:
        $query2 = "call SpSelectMotoActivo();";
        $stmt = $conexion->prepare($query2);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($fila = mysqli_fetch_assoc($res)) {
            $rowdata[$i] = $fila;
            $i++;
        }
        echo json_encode($rowdata);
        break;
    break;
    case 21:
        $Idcate = $_POST['Id'];
        $Activo = $_POST['Activo'];
        $query2 = "call SpUpdateActivoTaxista(?,?);";
        $stmt = $conexion->prepare($query2);
        $stmt->bind_param("ss", $Idcate, $Activo);
        $stmt->execute();
        $ok = $stmt->affected_rows;
        echo json_encode($ok);
        break;
    case 8:
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
        $query2 = "call SpDeleteTaxistaDatos(?);";
        $stmt = $conexion->prepare($query2);
        $stmt->bind_param("s", $Id);
        $stmt->execute();
        $ok = $stmt->affected_rows;
        echo json_encode($ok);
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
        $query2 = "call SpSelectDatotaxista(?)";
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
        $Id = $_POST['IdTaxista'];
        $Nombre = $_POST['Nombre'];
        $Apellidos = $_POST['Apellidos'];
        $Telefono = $_POST['Telefono'];
        $Licencia = $_POST['Licencia'];
        $Direccion = $_POST['Direccion'];
        $Correo = $_POST['Correo'];
        $Password = $_POST['Password1'];
        $query2 = "call SpUpdateTaxista(?,?,?,?,?,?,?,?);";
        $stmt = $conexion->prepare($query2);
        $stmt->bind_param("ssssssss", $Id, $Nombre, $Apellidos, $Telefono, $Direccion, $Correo,$Licencia, $Password);
        $stmt->execute();
        $ok = $stmt->affected_rows;
        echo json_encode($ok);
        break;
}
