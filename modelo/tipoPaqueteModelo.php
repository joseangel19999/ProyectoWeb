<?php
if ($peticionAjax) {
	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}
require_once "conexionBd.php";
require_once "../vo/objTipoP.php";
class TipoPaqueteModelo extends mainModel{

    protected function agregar_TipoPaquete($datos){
        $conectarBd = Conexion::getInstancia();
		$Id =    $datos->getId();
        $TpoP= $datos->getTipoP();
        $precio=$datos->getPrecio();
		$Desc =  $datos->getDesc();
		$query="call SpInsertTipoPaquete(?,?,?,?)";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->bindValue(2,$TpoP,PDO::PARAM_STR);
		$sql->bindValue(3,$precio,PDO::PARAM_STR);
		$sql->bindValue(4,$Desc,PDO::PARAM_STR);
		$sql->execute();
		return $sql;
    }
    protected function modificar_TipoPaquete($datos){
        $conectarBd = Conexion::getInstancia();
		$Id =    $datos->getId();
        $TpoP= $datos->getTipoP();
        $precio=$datos->getPrecio();
		$Desc =  $datos->getDesc();
		$query="call SpUpdateTipoPaquete(?,?,?,?)";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->bindValue(2,$TpoP,PDO::PARAM_STR);
		$sql->bindValue(3,$precio,PDO::PARAM_STR);
		$sql->bindValue(4,$Desc,PDO::PARAM_STR);
		$sql->execute();
		return $sql;
    }

    protected function eliminar_TipoPaquete($datos){
        $conectarBd = Conexion::getInstancia();
		$Id =    $datos->getId();
        $query="call SpDeleteTipoPaquete(?)";
        $sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
		$sql->execute();
		return $sql;
    }
    protected function consulta_TipoPaquete()
	{
		$sql = mainModel::conectar()->prepare("SELECT chClaveTipoP,vchNombreTipoP,fltPrecio,vchDescripcion FROM  tbltipopaquete");
		$sql->execute();
		return $sql;
	}
}

?>