<?php
if ($peticionAjax) {
    require_once "../modelo/interfaces/InterfaceLogin.php";
} else {
    require_once "./modelo/interfaces/InterfaceLogin.php";
}
require_once "conexionBd.php";
class LoginModelo implements InterfaceLogin {

    function Iniciar_Session($datos)
    {
        $conectarBd = Conexion::getInstancia();
        $sql = $conectarBd->prepare("SELECT * FROM ViewloginAcceso WHERE vchUsuario =:user");
        $sql->bindParam(':user',$datos['usuario']);
        $sql->execute();
        return $sql;
    }
    function Cerrar_Session($datos){
        $respuesta="false";
        if($datos['Token_S']==$datos['Token']){
            session_unset();
            session_destroy();
            $respuesta="true";
        }else{
            $respuesta="false";
        }
        return $respuesta;
    }
}

?>
