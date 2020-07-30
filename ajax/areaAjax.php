<?php  
    $peticionAjax=true;
    require_once "../core/configAPP.php";
    require_once "../controlador/areaControlador.php";
    $AreaTrabajo=new areaControlador();
    $opc=$_POST['Opc'];
    if($opc==1){
        if(isset($_POST['Id'])){
            if(isset($_POST['NombreArea']) && isset($_POST['Descripcion'])){
                echo json_encode($AreaTrabajo->agregar_area_controlador());
            }
        }else{
            cerrar_Session();
        }
    }
    else if($opc==2) {
        echo json_encode($AreaTrabajo->consulta_areaTrabajo_controlador());
    }else if($opc==3){
        if(isset($_POST['Id'])){
            if(isset($_POST['NombreArea']) && isset($_POST['Descripcion'])){
                echo json_decode($AreaTrabajo->modificar_area_controlador());
            }
        }else{
            cerrar_Session();
        }
    }else if($opc==4){
        if(isset($_POST['Id'])){
            echo json_encode($AreaTrabajo->eliminar_area_controlador());
        }else{
            cerrar_Session();
        }
    }

    function cerrar_Session(){
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.serverurl.'/login/"</script>';
    }
