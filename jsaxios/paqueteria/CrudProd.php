<?php
$conexion = new mysqli("localhost", "root", "", "bdmototaxi");
$Opc = $_POST['Opc'];
$i = 0;
$opcion = 0;
switch ($Opc) {
    case 42:
        header("Content-Type: application/json");
        $numerosSumar = json_decode($_POST['Datos'], true);
        $i = 1;
        $ok2=-1;
        foreach ($numerosSumar  as $value) {
            if ($i == 1) {
                $i++;
                $fecha = $value['Fecha'];
                $IdEmpleado = $value['IdEmp'];
                $Total =$value['Total'];
                $Telefono=$value['TelefonoR'];
                $query2 = "call SpInsertPaqueterisVenta(?,?,?,?);";
                $stmt = $conexion->prepare($query2);
                $stmt->bind_param("sdss", $IdEmpleado, $Total,$Telefono, $fecha);
                $stmt->execute();
                $ok = $stmt->affected_rows;
            } 
            $TelefonoR=$value['TelefonoR'];
            $NombreDes=$value['NombreDest'];
            $TelefonoDes=$value['TelefonoDest'];
            $Peso = $value['PesoP'];
            $IdDestino = $value['IdDestino'];
            $IdTipoPaquete =$value['IdTipoPaquete'];
            $query2 = "call SpIsertPaqueteriaVentaDetalle(?,?,?,?,?,?);";
            $stmt = $conexion->prepare($query2);
            $stmt->bind_param("sssdss",$TelefonoR,$NombreDes,  $TelefonoDes, $Peso , $IdDestino, $IdTipoPaquete);
            $stmt->execute();
            $ok2= $stmt->affected_rows;
            $i++;
            
        }
        echo json_encode($ok2);
        break;
    case 20:
        $query2 = "call SpConsultaDatosMDestino();";
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
    case 9:
        $query2 = "call SpCondultaDatosTipoPaquete();";
        $stmt = $conexion->prepare($query2);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($fila = mysqli_fetch_assoc($res)) {
            $rowdata[$i] = $fila;
            $i++;
        }
        echo json_encode($rowdata);
        break;
}
