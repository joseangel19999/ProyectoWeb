<?php  
    $peticionAjax=true;
    require_once "../core/configAPP.php";
    require_once "../controlador/empleadoControlador.php";
    $opc=$_POST['Opc'];
    $CtrEmpleado=new empleadoControlador();
    if($opc=='1'){
        if(isset($_POST['Password1'])){
            if(isset($_POST['Telefono']) && isset($_POST['Password1'])){
                echo json_encode($CtrEmpleado->agregar_socursal_controlador());
            }
        }else{
            cerrar_Session();
        }
    }else if($opc=='2'){
        if(isset($_POST['Password1'])){
            if(isset($_POST['Telefono']) && isset($_POST['Password1'])){
                echo json_encode($CtrEmpleado->modificar_socursal_controlador());
            }
        }else{
            cerrar_Session();
        }
    }else if($opc=='3'){
        if(isset($_POST['Id'])){
            echo json_encode($CtrEmpleado->eliminar_socursal_controlador());
        }else{
            cerrar_Session();
        }
    }else if($opc=='4'){
         echo json_encode($CtrEmpleado->consulta_socursales());
    }else if($opc=='10'){
        if(isset($_POST['Id'])){
            echo json_encode($CtrEmpleado->select_Empleado_Controlador());
        }else{
            cerrar_Session();
        }
    }