<?php  
    $peticionAjax=true;
    require_once "../core/configAPP.php";
    if(isset($_POST['clavePuesto'])){
        require_once "../controlador/administradorControlador.php";
        $insAdmin=new administradorcontrolador();
        if(isset($_POST['clavePuesto']) && isset($_POST['nombrePuesto']) && isset($_POST['descPuesto'])){
            var_dump($_POST['clavePuesto']);
         //   echo $insAdmin->agregar_admin_controlador();
         echo "vacio";
        }
    }else{
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.serverurl.'/login/"</script>';
    }
?>