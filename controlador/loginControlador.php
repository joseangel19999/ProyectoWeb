<?php
    if ($peticionAjax) {
        require_once "../core/mainModel.php";
        require_once "../modelo/LoginProxy.php";
    } else {
        require_once "./modelo/LoginProxy.php";
        require_once "./core/mainModel.php";
    }

    class LoginControlador extends mainModel{
        private $loginProxy;
        public function __construct()
        {
            $this->loginProxy= new  LoginProxy();
        }
        public function iniciar_session_controlador()
        {  
            $Usuario=mainModel::limpar_cadena($_POST['Usuario']);
            $Password=mainModel::limpar_cadena($_POST['Password']);
            $datos=[
                "usuario"=>$Usuario,
            ];
            $datosLogin=array();
            $datosLogin=$this->loginProxy->Iniciar_Session($datos);
            if($datosLogin->rowCount()>=1){
                    foreach ($datosLogin as $row) {
                    $PassVerficar=mainModel::decryption($row['vchPassword']);
                    if($PassVerficar==$Password){
                        $Existe=true;
                        $Puesto=$row['vchNomPuesto'];
                        $IdEmpleado=$row['intIdEmpleado'];
                        $Fecha=$row['dtFecha'];
                        $Modificado=$row['chModificado'];
                    }
                }
                if($Existe==true){
                    //if($Fecha==)
                    $dates=date("y-m-d H-i-s");
                    session_start(['name'=>'SMT']);
                    $_SESSION['usuario_smt']=$IdEmpleado;
                    $_SESSION['puesto_smt']=$Puesto;
                    $_SESSION['token_smt']=md5(uniqid(mt_rand(true)));
                }

                $FechaActual= date("y-m-d h-i-s");
                if($Modificado=='0'){
                    if($Fecha>=$FechaActual){
                        $Url=serverurl."prodserv";
                        return $url_location='<script> window.location="'.$Url.'"</script>';
                    }
                }
                if($Puesto=='Administrador'){
                    $Url=serverurl."prodserv";
                }else if($Puesto=='Recepcionista'){
                    $Url=serverurl."paquete";
                }
                else{
                    $Url=serverurl;
                    $alerta=[
                        "Alerta"=>"simple",
                        "Titulo"=>"Accede denegado",
                        "Texto"=>"Solo acceso Personal administrativo",
                        "Tipo"=>"error"
                    ];
                    return mainModel::sweet_alert($alerta);
                }
                return $url_location='<script> window.location="'.$Url.'"</script>';

            } else{
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Error de Acceso",
                    "Texto"=>"El usuario y la Contraseña no son correctos",
                    "Tipo"=>"error"
                ];
                return mainModel::sweet_alert($alerta);
            }
        }
        public function cerrarSession_controlador(){
            session_start(['name'=>'SMT']);
            $token=mainModel::decryption($_GET['Token']);
            $datos=[
                "Usuaio"=>$_SESSION['usuario_smt'],
                "Token_S"=>$_SESSION['token_smt'],
                "Token"=>$token
            ];
            return $this->loginProxy->Cerrar_Session($datos);
        }
        public function forzarCierre_session_controlador(){
            session_destroy();
            return header("Location: ".serverurl."");
        }
    }
?>