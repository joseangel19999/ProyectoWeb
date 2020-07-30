<?php  
    $peticionAjax=true;
    require_once "../core/configAPP.php";
    require_once "../controlador/puestoControlador.php";
    $opc=$_POST['Opc'];
    $puesto=new puestoControlador();
    if($opc==1){
        if(isset($_POST['Id'])){
            if(isset($_POST['NombrePuesto']) && isset($_POST['Salario'])){
                echo json_encode($puesto->agregar_puesto_controlador());
            }
        }else{
            cerrar_Session();
        }
    }else if($opc==4) {
        echo json_encode($puesto->consulta_puestoTrabajo());
    }
    else if($opc==2) {
        if(isset($_POST['Id'])){
            if(isset($_POST['NombreP']) && isset($_POST['SalarioP'])){
                echo json_encode($puesto->modificar_puesto_controlador());
            }
        }else{
            cerrar_Session();
        }
    }else if($opc==3){
        if(isset($_POST['Id'])){
            echo json_encode($puesto->eliminar_puesto_controlador());
        }else{
            cerrar_Session();
        }
    }
    function cerrar_Session(){
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.serverurl.'/login/"</script>';
    }
