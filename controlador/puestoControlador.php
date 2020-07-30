<?php
if ($peticionAjax) {
	require_once "../modelo/puestoModelo.php";
} else {
	require_once "./modelo/puestoModelo.php";
}
require_once "../vo/objPuesto.php";
class puestoControlador extends puestoModelo
{
	public function agregar_puesto_controlador(){
		$ObjArea = new Puesto();
        $ObjArea->setId(mainModel::limpar_cadena($_POST['Id']));
        $ObjArea->setNombrePuesto(mainModel::limpar_cadena($_POST['NombrePuesto']));
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
	public function modificar_puesto_controlador(){
		$ObjArea = new Puesto();
        $ObjArea->setId(mainModel::limpar_cadena($_POST['Id']));
        $ObjArea->setNombrePuesto(mainModel::limpar_cadena($_POST['NombreP']));
        $ObjArea->setSalario(mainModel::limpar_cadena($_POST['SalarioP']));
		$ObjArea->setDescripcion(mainModel::limpar_cadena($_POST['DescripcionP']));
		$respuesta=puestoModelo::modificar_Puesto($ObjArea);
		if($respuesta->rowCount() >=1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function eliminar_puesto_controlador(){
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
	public function consulta_puestoTrabajo(){
		$datos=array();
		$datos= puestoModelo::consulta_Puesto();
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
