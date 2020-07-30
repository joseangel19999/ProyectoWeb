<?php
if ($peticionAjax) {
	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}
require_once "conexionBd.php";
require_once "../vo/objPuesto.php";
class puestoModelo extends mainModel
{
	protected function agregar_Puesto($datos)
	{
		$conectarBd = Conexion::getInstancia();
		$Id =    $datos->getId();
        $Nombre= $datos->getNombrePuesto();
        $Salario=$datos->getSalario();
		$Desc =  $datos->getDescriocion();
		$query="call SpInsertPuesto(?,?,?,?)";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->bindValue(2,$Nombre,PDO::PARAM_STR);
		$sql->bindValue(3,$Salario,PDO::PARAM_STR);
		$sql->bindValue(4,$Desc,PDO::PARAM_STR);
		$sql->execute();
		return $sql;
	}
	protected function modificar_Puesto($datos)
	{
		$conectarBd = Conexion::getInstancia();
		$Id =    $datos->getId();
        $Nombre= $datos->getNombrePuesto();
        $Salario=$datos->getSalario();
		$Desc =  $datos->getDescriocion();
		$query="call SpUpdatePuesto(?,?,?,?);";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->bindValue(2,$Nombre,PDO::PARAM_STR);
		$sql->bindValue(3,$Salario,PDO::PARAM_STR);
		$sql->bindValue(4,$Desc,PDO::PARAM_STR);
		$sql->execute();
		return $sql;
	}
	protected function eliminar_Puesto($datos)
	{
		$conectarBd = Conexion::getInstancia();
		$Id =    $datos->getId();
		$query="call SpDeletePuesto(?);";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
		$sql->execute();
		return $sql;
	}
	protected function consulta_Puesto()
	{
		$sql = mainModel::conectar()->prepare("SELECT chIdPuesto,vchNomPuesto,fltSalario,vchDescPuesto FROM  tblpuesto");
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
