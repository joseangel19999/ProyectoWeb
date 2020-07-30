<?php
$peticionAjax = true;
require_once "../core/configAPP.php";
require_once "../controlador/tipoPaqueteControlador.php";
$CtrTipoP = new TipoPaqueteControlador();
$opc = $_POST['Opc'];
if ($opc == 1) {
    if (isset($_POST['Id'])) {
        if (isset($_POST['TipoPaquete']) && isset($_POST['Precio'])) {
            echo json_decode($CtrTipoP->agregar_TipoPaquete_Controlador());
        }
    } else {
        cerrar_Session();
    }
} else if ($opc == 2) {
    if (isset($_POST['Id'])) {
        if (isset($_POST['Precio']) && isset($_POST['Descripcion'])) {
            echo json_decode($CtrTipoP->modificar_TipoPaquete_Controlador());
        }
    } else {
        cerrar_Session();
    }
} else if ($opc == 3) {
    echo json_encode($CtrTipoP->consulta_TipoPaquete_Controlador());
} else if ($opc == 4) {
    if (isset($_POST['Id'])) {
        echo json_encode($CtrTipoP->eliminar_TipoPaquete_Controlador());
    } else {
        cerrar_Session();
    }
}

function cerrar_Session()
{
    session_start();
    session_destroy();
    echo '<script> window.location.href="' . serverurl . '/login/"</script>';
}


?>