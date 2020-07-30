<?php
$peticionAjax = true;
require_once "../core/configAPP.php";
require_once "../controlador/destinoControlador.php";
$Destino = new destinoControlador();
$opc = $_POST['Opc'];
if ($opc == 1) {
    if (isset($_POST['Id'])) {
        if (isset($_POST['Destino']) && isset($_POST['Descripcion'])) {
            echo json_decode($Destino->agregar_destino_controlador());
        }
    } else {
        cerrar_Session();
    }
} else if ($opc == 2) {
    if (isset($_POST['Id'])) {
        if (isset($_POST['Precio']) && isset($_POST['Descripcion'])) {
            echo json_decode($Destino->modificar_destino_controlador());
        }
    } else {
        cerrar_Session();
    }
} else if ($opc == 3) {
    echo json_encode($Destino->consulta_destino());
} else if ($opc == 4) {
    if (isset($_POST['Id'])) {
        echo json_encode($Destino->eliminar_destino_controlador());
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
