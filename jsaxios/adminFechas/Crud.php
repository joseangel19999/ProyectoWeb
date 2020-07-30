<?php
$conexion = new mysqli("localhost","Adminjose","adminjose","bdmototaxi");
$Opc=$_POST['Opc'];
$i=0;
$opcion=0;
switch($Opc){
    case 1:
    $Id=$_POST['Id'];
    $NombreP=$_POST['NombreP'];
    $Fecha=$_POST['Fecha'];
        if($Id==1){
           
            $query2="call SpUpdateFechaUserAll(?)";
            $stmt=$conexion->prepare($query2);
            $stmt->bind_param("s",$Fecha);
            $stmt->execute();
            $ok=$stmt->affected_rows;
            echo json_encode($ok);
        }else{
            if($NombreP=='Recepcionista'){
                $i=0;
                $query2="call SpSelectUserModicarFechasActPass(?);";
                $stmt=$conexion->prepare($query2);
                $stmt->bind_param("s",$Id);
                $stmt->execute();
                $res=$stmt->get_result();
                $stmt->close();
                while($file=mysqli_fetch_assoc($res)){
                    $IdUser=$file['IdUser'];
                    $query3="call SpUpdateFechaUserEmp(?,?)";
                    $stmt2=$conexion->prepare($query3);
                    $stmt2->bind_param("is",$IdUser,$Fecha);
                    $stmt2->execute();
                    $i=1;
                } 
                echo json_encode($i);
            }else if($NombreP=='Transportista'){

            }else if($NombreP=='Cliente'){
                $i=0;
                $query2="call  SpSelectClienteModicarFechasActPass();";
                $stmt=$conexion->prepare($query2);
                $stmt->execute();
                $res=$stmt->get_result();
                $stmt->close();
                while($file=mysqli_fetch_assoc($res)){
                    $IdUser=$file['intIdUsuario'];
                    $query3="call SpUpdateFechaUserEmp(?,?)";
                    $stmt2=$conexion->prepare($query3);
                    $stmt2->bind_param("is",$IdUser,$Fecha);
                    $stmt2->execute();
                    $i=1;
                } 
                echo json_encode($i);
            }
          
        }
    break;
    case 2:
        $query2="call SpSelectPuesto();";
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
        $query2="call SpSelectDestinoList();";
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
        $query2="call SpDeleteDestino(?);";
        $stmt=$conexion->prepare($query2);
        $stmt->bind_param("s",$Curp);
        $stmt->execute();
        $ok=$stmt->affected_rows;
        echo json_encode($ok);
    break;
    case 4:
    $Id=$_POST['Id'];
    $NombreP=$_POST['Destino'];
    $SalarioP=$_POST['Precio'];
    $DescripcionP=$_POST['Descripcion'];
    $query2="call SpUpdateDestino(?,?,?,?)";
    $stmt=$conexion->prepare($query2);
    $stmt->bind_param("ssds",$Id,$NombreP,$SalarioP,$DescripcionP);
    $stmt->execute();
    $ok=$stmt->affected_rows;
    echo json_encode($ok);
    break;
}
