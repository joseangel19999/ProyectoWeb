<?php  
    $peticionAjax=true;
    require_once "../core/configAPP.php";
    require_once "../controlador/socursalControlador.php";
    $opc=$_POST['Opc'];
    $CtrSocursal=new socursalControlador();
    if($opc==1){
        if(isset($_POST['Id'])){
            if(isset($_POST['Nombre']) && isset($_POST['Telefono'])){
                echo json_encode($CtrSocursal->agregar_socursal_controlador());
            }
        }else{
            cerrar_Session();
        }
    }else if($opc==4) {
        echo json_encode($CtrSocursal->consulta_socursales());
    }
    else if($opc==2) {
        if(isset($_POST['Id'])){
            if(isset($_POST['Nombre']) && isset($_POST['Telefono'])){
                echo json_encode($CtrSocursal->modificar_socursal_controlador());
            }
        }else{
            cerrar_Session();
        }
    }else if($opc==3){
        if(isset($_POST['Id'])){
            echo json_encode($CtrSocursal->eliminar_socursal_controlador());
        }else{
            cerrar_Session();
        }
    }
    function cerrar_Session(){
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.serverurl.'/login/"</script>';
    }
