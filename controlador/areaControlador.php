<?php
if ($peticionAjax) {
	require_once "../modelo/modeloArea.php";
} else {
	require_once "./modelo/modeloArea.php";
}
require_once "../vo/objectArea.php";
class areaControlador extends areaModelo
{
	public function agregar_area_controlador(){
		$ObjArea = new AreaTrabajo();
		$ObjArea->setId(mainModel::limpar_cadena($_POST['Id']));
		$ObjArea->setNombreArea(mainModel::limpar_cadena($_POST['NombreArea']));
		$ObjArea->setDescripcion(mainModel::limpar_cadena($_POST['Descripcion']));
		$respuesta=areaModelo::agregar_areaTrabajo($ObjArea);
		if ($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function modificar_area_controlador(){
		$ObjArea = new AreaTrabajo();
		$ObjArea->setId(mainModel::limpar_cadena($_POST['Id']));
		$ObjArea->setNombreArea(mainModel::limpar_cadena($_POST['NombreArea']));
		$ObjArea->setDescripcion(mainModel::limpar_cadena($_POST['Descripcion']));
		$respuesta=areaModelo::modifica_areaTrabajo($ObjArea);
		if($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function eliminar_area_controlador(){
		$ObjArea = new AreaTrabajo();
		$ObjArea->setId(mainModel::limpar_cadena($_POST['Id']));
		$respuesta=areaModelo::eliminar_areaTrabajo($ObjArea);
		if($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function consulta_areaTrabajo(){
		$datos=array();
		$datos= areaModelo::consulta_areaTrabajo();
		var_dump($datos[0]);
	}
	
}
