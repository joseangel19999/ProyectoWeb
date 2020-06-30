<?php
if ($peticionAjax) {
	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}
require_once "../vo/objMototaxi.php";
class mototaxiteModelo extends mainModel
{
	protected function agregar_Mototaxi($datos)
	{
		$Id =    $datos->getId();
		$Nombre= $datos->getMarca();
		$Desc =  $datos->getPlaca();
		$sql = mainModel::conectar()->prepare("INSERT INTO tbmototaxi(intIdMotoTaxi,vchMarca,vchPlaca) VALUES(:id,:marca,:palaca);");
		$sql->bindParam(":id", $Id);
		$sql->bindParam(":marca", $Nombre);
		$sql->bindParam(":placa", $Desc);
		$sql->execute();
		return $sql;
	}
	protected function modifica_Mototaxi($datos)
	{
		$Id =    $datos->getId();
		$Nombre= $datos->getMarca();
		$Desc =  $datos->getPlaca();
		$sql = mainModel::conectar()->prepare("UPDATE tbmototaxi SET vchMarca=:marca,vchPlaca=:placa WHERE intIdMotoTaxi=:id");
		$sql->bindParam(":id", $Id);
		$sql->bindParam(":marca",$Nombre);
		$sql->bindParam(":placa", $Desc);
		$sql->execute();
		return $sql;
	}
	protected function eliminar_Mototaxi($datos)
	{
		$Id = $datos->getId();
		$sql = mainModel::conectar()->prepare("DELETE FROM tbmototaxi WHERE intIdMotoTaxi=:id");
		$sql->bindParam(":id",$Id);
		$sql->execute();
		return $sql;
	}
	protected function consulta_Mototaxi()
	{
		$AreaT = array();
		$sql = mainModel::conectar()->prepare("SELECT intIdMotoTaxi,vchMarca,vchPlaca FROM  tbmototaxi");
		$sql->execute();
		if ($sql) {
			foreach ($sql as $row) {
				$AreaT[] = $this->recordsetToUserObject($row);
			}
			return $AreaT;
		}
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
