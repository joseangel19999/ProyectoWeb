<?php
if ($peticionAjax) {
	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}
require_once "conexionBd.php";
require_once "../vo/objPaqueteria.php";
class PaqueteriaModelo extends mainModel{

    protected function agregar_Mototaxista($datos){
        $conectarBd = Conexion::getInstancia();
        $TelefonoR=  $datos->getNombreT();
        $NombresDes=  $datos->getApellidosT();
        $TelefonoDes=  $datos->getTelefonoT();
        $fecha = $datos->getFecha(); 
        $Iddestino = $datos->getPasswordT();
        $IdTipoP=  $datos->getSocursalT();

        $query="call SpInsertTaxista(?,?,?,?,?,?);";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$TelefonoR,PDO::PARAM_STR);
        $sql->bindValue(2,$NombresDes,PDO::PARAM_STR);
		$sql->bindValue(3,$TelefonoDes,PDO::PARAM_STR);
        $sql->bindValue(4,$fecha,PDO::PARAM_STR);
        $sql->bindValue(5,$Iddestino,PDO::PARAM_STR);
        $sql->bindValue(6,$IdTipoP,PDO::PARAM_STR);
        $sql->bindValue(7,$fecha,PDO::PARAM_STR);
        $sql->execute();
		return $sql;
    }
}