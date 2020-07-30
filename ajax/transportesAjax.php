<?php  
    $peticionAjax=true;
    require_once "../core/configAPP.php";
    require_once "../controlador/mototaxiControlador.php";
    $opc=$_POST['Opc'];
    $Mototaxi=new mototaxiControlador();
    if($opc==1){
        if(isset($_POST['Id'])){
            if(isset($_POST['Nombre']) && isset($_POST['Placa'])){
                echo json_encode($Mototaxi->agregar_mototaxi_controlador());
            }
        }else{
            cerrar_Session();
        }
    }else if($opc==10) {
        echo json_encode($Mototaxi->consulta_Mototaxi());
    }
    else if($opc==2) {
        if(isset($_POST['Id'])){
            if(isset($_POST['Nombre']) && isset($_POST['Placa'])){
                echo json_encode($Mototaxi->modificar_mototaxi_controlador());
            }
        }else{
            cerrar_Session();
        }
    }else if($opc==3){
        if(isset($_POST['Id'])){
            echo json_encode($Mototaxi->eliminar_mototaxi_controlador());
        }else{
            cerrar_Session();
        }
    }
    function cerrar_Session(){
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.serverurl.'/login/"</script>';
    }
