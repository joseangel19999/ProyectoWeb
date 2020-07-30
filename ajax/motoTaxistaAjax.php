<?php  
    $peticionAjax=true;
    require_once "../core/configAPP.php";
    require_once "../controlador/motoTaxistaControlador.php";
    $opc=$_POST['Opc'];
    $CtrMotoTaxista=new motoTaxistaControlador();
    if($opc=='1'){
        if(isset($_POST['Password1'])){
            if(isset($_POST['Licencia']) && isset($_POST['Password1'])){
                echo json_encode($CtrMotoTaxista->agregar_motoTaxista_controlador());
            }
        }else{
            cerrar_Session();
        }
    }else if($opc=='2'){
        if(isset($_POST['IdTaxista'])){
            if(isset($_POST['Telefono']) && isset($_POST['Password1'])){
                echo json_encode($CtrMotoTaxista->modificar_motoTaxista_controlador());
            }
        }else{
            cerrar_Session();
        }
    }else if($opc=='3'){
        if(isset($_POST['Id'])){
            echo json_encode($CtrMotoTaxista->eliminar_motoTaxista_controlador());
        }else{
            cerrar_Session();
        }
    }else if($opc=='4'){
         echo json_encode($CtrMotoTaxista->consulta_motoTaxista());
    }else if($opc=='5'){
        if(isset($_POST['Id'])){
            echo json_encode($CtrMotoTaxista->activar_motoTaxista_controlador());
        }else{
            cerrar_Session();
        }
    }
    else if($opc=='8'){
        echo json_encode($CtrMotoTaxista->consulta_motoTaxi_controlador());
   }
   else if($opc=='9'){
    echo json_encode($CtrMotoTaxista->consulta_Socursal_controlador());
    }else if($opc=='10'){
        if(isset($_POST['Id'])){
            echo json_encode($CtrMotoTaxista->select_motoTaxista());
        }else{
            cerrar_Session();
        }
    }