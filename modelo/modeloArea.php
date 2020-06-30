<?php
if ($peticionAjax) {
	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}
require_once "../vo/objectArea.php";
class areaModelo extends mainModel
{
	protected function agregar_areaTrabajo($datos)
	{
		$Id =    $datos->getId();
		$Nombre= $datos->getNombreArea();
		$Desc =  $datos->getDescriocion();
		$sql = mainModel::conectar()->prepare("INSERT INTO tblareatrabajo(chIdArea,vchNomArea,vchDescripcion) VALUES(:id,:nombre,:descripcion);");
		$sql->bindParam(":id", $Id);
		$sql->bindParam(":nombre", $Nombre);
		$sql->bindParam(":descripcion", $Desc);
		$sql->execute();
		return $sql;
	}
	protected function modifica_areaTrabajo($datos)
	{
		$Id =    $datos->getId();
		$Nombre= $datos->getNombreArea();
		$Desc =  $datos->getDescriocion();
		$sql = mainModel::conectar()->prepare("UPDATE tblareatrabajo SET vchNomArea=:nombre,vchDescripcion=:descripcion WHERE chIdArea=:id");
		$sql->bindParam(":id", $Id);
		$sql->bindParam(":nombre",$Nombre);
		$sql->bindParam(":descripcion", $Desc);
		$sql->execute();
		return $sql;
	}
	protected function eliminar_areaTrabajo($datos)
	{
		$Id = $datos->getId();
		$sql = mainModel::conectar()->prepare("DELETE FROM tblareatrabajo WHERE chIdArea=:id");
		$sql->bindParam(":id",$Id);
		$sql->execute();
		return $sql;
	}
	protected function consulta_areaTrabajo()
	{
		$AreaT = array();
		$sql = mainModel::conectar()->prepare("SELECT chIdArea,vchNomArea,vchDescripcion FROM  tblareatrabajo");
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
