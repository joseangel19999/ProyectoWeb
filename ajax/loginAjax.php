<?php
     $peticionAjax=true;
     require_once "../core/configAPP.php";
     if(isset($_GET['Token'])){
       require_once "../controlador/loginControlador.php";
       $logout=new LoginControlador();
       echo $logout->cerrarSession_controlador();
     }else{
         session_start();
         session_destroy();
         echo '<script> window.location.href="'.serverurl.'/login/"</script>';
     }
?>