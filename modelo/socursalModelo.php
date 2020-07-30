<?php
if ($peticionAjax) {
	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}
require_once "conexionBd.php";
require_once "../vo/objSocursal.php";
class SocursalModelo extends mainModel{

    protected function agregar_Socursal($datos){
        $conectarBd = Conexion::getInstancia();
		$Id =    $datos->getId();
        $NombreS= $datos->getNombreS();
        $DireccionS=$datos->getDireccionS();
        $TelefonoS =  $datos->getTelefonoS();
        $CorreoS =  $datos->getCorreoS();
		$query="call SpInsertSocursal(?,?,?,?,?)";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->bindValue(2,$NombreS,PDO::PARAM_STR);
		$sql->bindValue(3,$DireccionS,PDO::PARAM_STR);
        $sql->bindValue(4,$TelefonoS,PDO::PARAM_STR);
        $sql->bindValue(5,$CorreoS,PDO::PARAM_STR);
        $sql->execute();
		return $sql;
    }
    protected function modificar_Socursal($datos){
        $conectarBd = Conexion::getInstancia();
		$Id =    $datos->getId();
        $NombreS= $datos->getNombreS();
        $DireccionS=$datos->getDireccionS();
        $TelefonoS =  $datos->getTelefonoS();
        $CorreoS =  $datos->getCorreoS();
		$query="call SpUpdateSocursal(?,?,?,?,?)";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->bindValue(2,$NombreS,PDO::PARAM_STR);
		$sql->bindValue(3,$DireccionS,PDO::PARAM_STR);
        $sql->bindValue(4,$TelefonoS,PDO::PARAM_STR);
        $sql->bindValue(5,$CorreoS,PDO::PARAM_STR);
		$sql->execute();
		return $sql;
    }
    protected function eliminar_Socursal($datos){
        $conectarBd = Conexion::getInstancia();
		$Id =    $datos->getId();
		$query="call SpDeleteSocursal(?)";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
		$sql->execute();
		return $sql;
    }
    protected function consulta_Socursal(){
        $sql = mainModel::conectar()->prepare("SELECT chIdSocursal,vchNombre,vchDireccion,vchTelefono,vchCorreo FROM  tblsocursal");
		$sql->execute();
		return $sql;
    }

}