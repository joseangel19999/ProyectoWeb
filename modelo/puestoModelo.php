<?php
if ($peticionAjax) {
	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}
require_once "../vo/objPuesto.php";
class puestoModelo extends mainModel
{
	protected function agregar_Puesto($datos)
	{
		$Id =    $datos->getId();
        $Nombre= $datos->getNombrePuesto();
        $Salario=$datos->getSalario();
		$Desc =  $datos->getDescriocion();
		$sql = mainModel::conectar()->prepare("INSERT INTO tblpuesto(chIdPuesto,vchNomPuesto,fltSalario,vchDescPuesto) VALUES(:id,:nombre,:salario,:descripcion);");
        $sql->bindParam(":id", $Id);
        $sql->bindParam(":salario", $Salario);
		$sql->bindParam(":nombre", $Nombre);
		$sql->bindParam(":descripcion", $Desc);
		$sql->execute();
		return $sql;
	}
	protected function modificar_Puesto($datos)
	{
		$Id =    $datos->getId();
        $Nombre= $datos->getNombrePuesto();
        $Salario=$datos->getSalario();
		$Desc =  $datos->getDescriocion();
		$sql = mainModel::conectar()->prepare("UPDATE tblpuesto SET vchNomPuesto=:nombre,fltSalario=:salario,vchDescPuesto=:descripcion WHERE chIdPuesto=:id");
		$sql->bindParam(":id", $Id);
        $sql->bindParam(":nombre",$Nombre);
        $sql->bindParam(":salario",$Salario);
		$sql->bindParam(":descripcion", $Desc);
		$sql->execute();
		return $sql;
	}
	protected function eliminar_Puesto($datos)
	{
		$Id = $datos->getId();
		$sql = mainModel::conectar()->prepare("DELETE FROM tblpuesto WHERE chIdPuesto=:id");
		$sql->bindParam(":id",$Id);
		$sql->execute();
		return $sql;
	}
	protected function consulta_Puesto()
	{
		$AreaT = array();
		$sql = mainModel::conectar()->prepare("SELECT chIdPuesto,vchNomPuesto,fltSalario,vchDescPuesto FROM  tblpuesto");
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
