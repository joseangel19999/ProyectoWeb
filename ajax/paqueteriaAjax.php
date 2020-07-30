<?php  
    $peticionAjax=true;
    require_once "../core/mainModel.php";
    require_once "../core/configAPP.php";
    $opc=$_POST['Opc'];
    if($opc==30){
    header("Content-Type: application/json");
    //$datos=$_POST['Datos'];$result = (array) json_decode($json);
    $numerosSumar = json_decode($_POST['Datos'],true);

   /* $numeroUno = (int)$numerosSumar['numero1'];
    $numeroDos = (int)$numerosSumar['numero2'];*/
    foreach ($numerosSumar  as $value) {
        echo  $value['CorreoR'];
     }
   
      
        //var_dump($numerosSumar[0]);
       

       // echo $_POST['Datos'];
       /* if(isset($_POST['Id'])){
            if(isset($_POST['Destino']) && isset($_POST['Descripcion'])){
                echo json_decode($Destino->agregar_destino_controlador());
            }
        }else{
            cerrar_Session();
        }*/
    }
    function cerrar_Session(){
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.serverurl.'/login/"</script>';
    }

?>
