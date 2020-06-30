<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class LoginModelo extends mainModel{

    protected function iniciar_session_modelo($datos)
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM vwUsuarios WHERE vchUsuario =:user AND vchPassword=:passw");
        $sql->bindParam(':user',$datos['usuario']);
        $sql->bindParam(':passw',$datos['password']);
        $sql->execute();
        return $sql;
    }
    protected function cerrarSession_modelo($datos){
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
