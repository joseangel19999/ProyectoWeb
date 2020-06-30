<?php
if ($peticionAjax) {
	require_once "../modelo/puestoModelo.php";
} else {
	require_once "./modelo/puestoModelo.php";
}
require_once "../vo/objPuesto.php";
class areaControlador extends puestoModelo
{
	public function agregar_area_controlador(){
		$ObjArea = new Puesto();
        $ObjArea->setId(mainModel::limpar_cadena($_POST['Id']));
        $ObjArea->setNombrePuesto(mainModel::limpar_cadena($_POST['NombreArea']));
        $ObjArea->setSalario(mainModel::limpar_cadena($_POST['Salario']));
		$ObjArea->setDescripcion(mainModel::limpar_cadena($_POST['Descripcion']));
		$respuesta=puestoModelo::agregar_Puesto($ObjArea);
		if ($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function modificar_area_controlador(){
		$ObjArea = new Puesto();
        $ObjArea->setId(mainModel::limpar_cadena($_POST['Id']));
        $ObjArea->setNombrePuesto(mainModel::limpar_cadena($_POST['NombreArea']));
        $ObjArea->setSalario(mainModel::limpar_cadena($_POST['Salario']));
		$ObjArea->setDescripcion(mainModel::limpar_cadena($_POST['Descripcion']));
		$respuesta=puestoModelo::modificar_Puesto($ObjArea);
		if($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function eliminar_area_controlador(){
		$ObjArea = new Puesto();
        $ObjArea->setId(mainModel::limpar_cadena($_POST['Id']));
		$respuesta=puestoModelo::eliminar_Puesto($ObjArea);
		if($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function consulta_areaTrabajo(){
		$datos=array();
		$datos= puestoModelo::consulta_Puesto();
		var_dump($datos[0]);
	}
	
}
