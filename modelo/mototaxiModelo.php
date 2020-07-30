<?php
if ($peticionAjax) {
	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}
require_once "conexionBd.php";
require_once "../vo/objMototaxi.php";
class mototaxiteModelo extends mainModel
{
	protected function agregar_Mototaxi($datos)
	{
		$conectarBd = Conexion::getInstancia();
		$Id =    $datos->getId();
		$Nombre = $datos->getNombre();
		$Marca= $datos->getMarca();
		$Placa =  $datos->getPlaca();
		$Ocupado='0';
		$query="call SpInsertMoto(?,?,?,?,?)";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->bindValue(2,$Marca,PDO::PARAM_STR);
		$sql->bindValue(3,$Placa,PDO::PARAM_STR);
		$sql->bindValue(4,$Nombre,PDO::PARAM_STR);
		$sql->bindValue(5,$Ocupado,PDO::PARAM_STR);
		$sql->execute();
		return $sql;
	}
	protected function modifica_Mototaxi($datos)
	{
		$conectarBd = Conexion::getInstancia();
		$Id =    $datos->getId();
		$Nombre = $datos->getNombre();
		$Marca= $datos->getMarca();
		$Placa =  $datos->getPlaca();
		$query="call SpUpdateMoto(?,?,?,?)";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->bindValue(2,$Marca,PDO::PARAM_STR);
		$sql->bindValue(3,$Nombre,PDO::PARAM_STR);
		$sql->bindValue(4,$Placa,PDO::PARAM_STR);
		$sql->execute();
		return $sql;
	}
	protected function eliminar_Mototaxi($datos)
	{
		$conectarBd = Conexion::getInstancia();
		$Id = $datos->getId();
		$query="call SpDeleteMoto(?)";
		$sql =$conectarBd->prepare($query);
		$sql->bindValue(1,$Id,PDO::PARAM_STR);
		$sql->execute();
		return $sql;
	}
	protected function consulta_Mototaxi()
	{
		$sql = mainModel::conectar()->prepare("SELECT intIdMotoTaxi,vchNombre,vchMarca,vchPlaca FROM  tbmototaxi");
		$sql->execute();
		return $sql;
	}
	private function recordsetToUserObject($row)
	{
		$ObjArea = new AreaTrabajo();
		$ObjArea->setId($row['chIdArea']);
		$ObjArea->setNombreArea($row['vchNomArea']);
		$ObjArea->setDescripcion($row['vchDescripcion']);
		return $ObjArea;
	}
}
