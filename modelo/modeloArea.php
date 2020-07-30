<?php
if ($peticionAjax) {
	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}
require_once "../vo/objectArea.php";
class areaModelo extends mainModel
{
	private $ClsConexion;
	public function __construct($Clsconecion)
	{
		$this->ClsConexion=$Clsconecion;	
	}
	protected function agregar_areaTrabajo($datos)
	{
		$conectarBd =$this->ClsConexion::getInstancia();
		$Id =    $datos->getId();
		$Nombre= $datos->getNombreArea();
		$Desc =  $datos->getDescriocion();
		$query="call InsertAreaEmpl(?,?,?)";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->bindValue(2,$Nombre,PDO::PARAM_STR);
		$sql->bindValue(3,$Desc,PDO::PARAM_STR);
		$sql->execute();
		return $sql;
	}
	protected function modifica_areaTrabajo($datos)
	{
		$conectarBd =$this->ClsConexion::getInstancia();
		$Id =    $datos->getId();
		$Nombre= $datos->getNombreArea();
		$Desc =  $datos->getDescriocion();
		$query="call SpUpdateAreaTrabajo(?,?,?)";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->bindValue(2,$Nombre,PDO::PARAM_STR);
		$sql->bindValue(3,$Desc,PDO::PARAM_STR);
		$sql->execute();
		return $sql;
	}
	protected function eliminar_areaTrabajo($datos)
	{
		$conectarBd =$this->ClsConexion::getInstancia();
		$Id =    $datos->getId();
		$query="call SpDeleteAreaTrabajo(?);";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
		$sql->execute();
		return $sql;
	}
	protected function consulta_areaTrabajo()
	{
		$sql = mainModel::conectar()->prepare("SELECT chIdArea,vchNomArea,vchDescripcion FROM  tblareatrabajo");
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
