<?php
if ($peticionAjax) {
	require_once "../modelo/mototaxiModelo.php";
} else {
	require_once "./modelo/mototaxiModelo.php";
}
require_once "../vo/objMototaxi.php";
class mototaxiControlador extends mototaxiteModelo
{
	public function agregar_mototaxi_controlador(){
		$ObjMoto = new Mototaxi();
		$ObjMoto->setId(mainModel::limpar_cadena($_POST['Id']));
		$ObjMoto->setMarca(mainModel::limpar_cadena($_POST['Marca']));
		$ObjMoto->setPlaca(mainModel::limpar_cadena($_POST['Placa']));
		$ObjMoto->setNombre(mainModel::limpar_cadena($_POST['Nombre']));
		$respuesta=mototaxiteModelo::agregar_Mototaxi($ObjMoto);
		if ($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function modificar_mototaxi_controlador(){
		$ObjMoto = new Mototaxi();
		$ObjMoto->setId(mainModel::limpar_cadena($_POST['Id']));
		$ObjMoto->setMarca(mainModel::limpar_cadena($_POST['Marca']));
		$ObjMoto->setPlaca(mainModel::limpar_cadena($_POST['Placa']));
		$ObjMoto->setNombre(mainModel::limpar_cadena($_POST['Nombre']));
		$respuesta=mototaxiteModelo::modifica_Mototaxi($ObjMoto);
		if($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function eliminar_mototaxi_controlador(){
        $ObjArea = new Mototaxi();
		$ObjArea->setId(mainModel::limpar_cadena($_POST['Id']));
		$respuesta=mototaxiteModelo::eliminar_Mototaxi($ObjArea);
		if($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function consulta_mototaxi(){
		$datos=array();
		$datos= mototaxiteModelo::consulta_Mototaxi();
		if ($datos){
			$i=0;
			foreach ($datos as $row) {
				$rowdata[$i]=$row;
				$i++;
			}
			return $rowdata;
		}
	}
	
}
