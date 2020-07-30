<?php
    if ($peticionAjax) {
        require_once "../modelo/interfaces/InterfaceLogin.php";
        require_once "../modelo/loginModelo.php";
     } else {
        require_once "./modelo/interfaces/InterfaceLogin.php";
        require_once "./modelo/loginModelo.php";
     }
class LoginProxy implements InterfaceLogin{
    private $logodelo;
    function Iniciar_Session($datos){
        if($this->logodelo==null){
            $this->logodelo= new LoginModelo();
            return $this->logodelo->Iniciar_Session($datos);
        }else{
            return $this->logodelo->Iniciar_Session($datos);
        }

    }
    function Cerrar_Session($datos){
        if($this->logodelo==null){
            $this->logodelo= new LoginModelo();
            return $this->logodelo->Cerrar_Session($datos);
        }else{
            return $this->logodelo->Cerrar_Session($datos);
        }

    }

}
?>