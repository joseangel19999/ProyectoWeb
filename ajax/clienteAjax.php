<?php  
    $peticionAjax=true;
    require_once "../core/configAPP.php";
    require_once "../controlador/clienteControlador.php";
    $opc=$_POST['Opc'];
    $CtrCliente=new clienteControlador();
    if($opc=='1'){
        if(isset($_POST['Password1'])){
            if(isset($_POST['Telefono']) && isset($_POST['Password1'])){
                echo json_encode($CtrCliente->agregar_cliente_controlador());
            }
        }else{
            cerrar_Session();
        }
    }else if($opc=='2'){
        if(isset($_POST['Password1'])){
            if(isset($_POST['Telefono']) && isset($_POST['Password1'])){
                echo json_encode($CtrCliente->modificar_cliente_controlador());
            }
        }else{
            cerrar_Session();
        }
    }else if($opc=='3'){
        if(isset($_POST['Id'])){
            echo json_encode($CtrCliente->eliminar_cliente_controlador());
        }else{
            cerrar_Session();
        }
    }else if($opc=='4'){
         echo json_encode($CtrCliente->consulta_cliente());
    }else if($opc=='10'){
        if(isset($_POST['Id'])){
        echo json_encode($CtrCliente->select_Cliente());
        }else{
            cerrar_Session();
        }
   }