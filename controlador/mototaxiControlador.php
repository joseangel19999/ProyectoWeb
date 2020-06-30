<?php
if ($peticionAjax) {
	require_once "../modelo/mototaxiModelo.php";
} else {
	require_once "./modelo/mototaxiModelo.php";
}
require_once "../vo/objMototaxi.php";
class areaControlador extends mototaxiteModelo
{
	public function agregar_area_controlador(){
		$ObjArea = new Mototaxi();
		$ObjArea->setId(mainModel::limpar_cadena($_POST['Id']));
		$ObjArea->setMarca(mainModel::limpar_cadena($_POST['Marca']));
		$ObjArea->setPlaca(mainModel::limpar_cadena($_POST['Placa']));
		$respuesta=mototaxiteModelo::agregar_Mototaxi($ObjArea);
		if ($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function modificar_area_controlador(){
		$ObjArea = new Mototaxi();
		$ObjArea->setId(mainModel::limpar_cadena($_POST['Id']));
		$ObjArea->setMarca(mainModel::limpar_cadena($_POST['Marca']));
		$ObjArea->setPlaca(mainModel::limpar_cadena($_POST['Placa']));
		$respuesta=mototaxiteModelo::modifica_Mototaxi($ObjArea);
		if($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function eliminar_area_controlador(){
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
	public function consulta_areaTrabajo(){
		$datos=array();
		$datos= mototaxiteModelo::consulta_Mototaxi();
		var_dump($datos[0]);
	}
	
}
