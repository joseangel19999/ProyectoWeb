<?php
    if ($peticionAjax) {
        require_once "../modelo/loginModelo.php";
    } else {
        require_once "./modelo/loginModelo.php";
    }

    class LoginControlador extends LoginModelo{
        
        public function iniciar_session_controlador()
        {
            $Usuario=mainModel::limpar_cadena($_POST['Usuario']);
            $Password=mainModel::limpar_cadena($_POST['Password']);
            $datos=[
                "usuario"=>$Usuario,
                "password"=>$Password
            ];
            $datosLogin=LoginModelo::iniciar_session_modelo($datos);
            if($datosLogin->rowCount()>=1){
                $row=$datosLogin->fetch();
                session_start(['name'=>'SMT']);
                $_SESSION['usuario_smt']=$row['intIdEmpleado'];
                $_SESSION['puesto_smt']=$row['vchNomPuesto'];
                $_SESSION['token_smt']=md5(uniqid(mt_rand(true)));
                if($row['vchNomPuesto'=='Administrador']){
                    $Url=serverurl."empleados";
                }
                return $url_location='<script> window.location="'.$Url.'"</script>';

            }else{
                $alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
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
            return LoginModelo::cerrarSession_modelo($datos);
        }
        public function forzarCierre_session_controlador(){
            session_destroy();
            return header("Location: ".serverurl."");
        }
    }
?>