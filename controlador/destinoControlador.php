<?php
if ($peticionAjax) {
	require_once "../modelo/destinoModelo.php";
} else {
	require_once "./modelo/destinoModelo.php";
}
require_once "../vo/objDestino.php";
class destinoControlador extends destinoModelo
{
	public function agregar_destino_controlador(){
		$ObjDestino = new Destino();
		$ObjDestino->setId(mainModel::limpar_cadena($_POST['Id']));
        $ObjDestino->setNomDestino(mainModel::limpar_cadena($_POST['Destino']));
        $ObjDestino->setPrecio(mainModel::limpar_cadena($_POST['Precio']));
		$ObjDestino->setDescripcion(mainModel::limpar_cadena($_POST['Descripcion']));
		$respuesta=destinoModelo::agregar_destino($ObjDestino);
		if ($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function modificar_destino_controlador(){
        $ObjDestino = new Destino();
		$ObjDestino->setId(mainModel::limpar_cadena($_POST['Id']));
        $ObjDestino->setNomDestino(mainModel::limpar_cadena($_POST['Destino']));
        $ObjDestino->setPrecio(mainModel::limpar_cadena($_POST['Precio']));
		$ObjDestino->setDescripcion(mainModel::limpar_cadena($_POST['Descripcion']));
        $respuesta=destinoModelo::modificar_destino($ObjDestino);
		if($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function eliminar_destino_controlador(){
        $ObjDestino = new Destino();
		$ObjDestino->setId(mainModel::limpar_cadena($_POST['Id']));
		$respuesta=destinoModelo::eliminar_destino($ObjDestino);
		if($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function consulta_destino(){
		$datos=array();
		$datos= destinoModelo::consulta_destino();
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
