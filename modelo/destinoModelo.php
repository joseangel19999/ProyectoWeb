<?php
if ($peticionAjax) {
	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}
require_once "conexionBd.php";
require_once "../vo/objectArea.php";

class destinoModelo extends mainModel
{
	protected function agregar_destino($datos)
	{
        $conectarBd = Conexion::getInstancia();
        $Id =    $datos->getId();
        $Nombre= $datos->getNomDestino();
        $Precio=$datos->getPrecio();
        $Desc =  $datos->getDescriocion();
        $query2="call SpInsertDestino(?,?,?,?)";
		$sql =$conectarBd->prepare($query2);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->bindValue(2,$Nombre,PDO::PARAM_STR);
        $sql->bindValue(3,$Precio,PDO::PARAM_STR);
        $sql->bindValue(4,$Desc,PDO::PARAM_STR);
		$sql->execute();
		return $sql;
	}
	protected function modificar_destino($datos)
	{
        $conectarBd = Conexion::getInstancia();
		$Id =    $datos->getId();
        $Precio=$datos->getPrecio();
		$Nombre= $datos->getNomDestino();
        $Desc =  $datos->getDescriocion();
        $query2="call SpUpdateDestino(?,?,?,?)";
        $sql =$conectarBd->prepare($query2);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->bindValue(2,$Nombre,PDO::PARAM_STR);
        $sql->bindValue(3,$Precio,PDO::PARAM_STR);
        $sql->bindValue(4,$Desc,PDO::PARAM_STR);
		$sql->execute();
		return $sql;
	}
	protected function eliminar_destino($datos)
	{
        $conectarBd = Conexion::getInstancia();
        $Id = $datos->getId();
        $query2="call SpDeleteDestino(?);";
        $sql =$conectarBd->prepare($query2);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
		$sql->execute();
		return $sql;
	}
	protected function consulta_destino()
	{
		$sql = mainModel::conectar()->prepare("SELECT chClaveDestino,vchNomDestino,fltPrecio,vchDescripcion FROM  tbldestinos");
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
