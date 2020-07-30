<?php
if ($peticionAjax) {
	require_once "../modelo/TipoPaqueteModelo.php";
} else {
	require_once "./modelo/TipoPaqueteModelo.php";
}
require_once "../vo/objTipoP.php";
class TipoPaqueteControlador extends TipoPaqueteModelo{
    public function agregar_TipoPaquete_Controlador(){
        $TipoPaquete = new TipPaquete();
		$TipoPaquete->setId(mainModel::limpar_cadena($_POST['Id']));
        $TipoPaquete->setTipoP(mainModel::limpar_cadena($_POST['TipoPaquete']));
        $TipoPaquete->setPrecio(mainModel::limpar_cadena($_POST['Precio']));
		$TipoPaquete->setDesc(mainModel::limpar_cadena($_POST['Descripcion']));
		$respuesta=TipoPaqueteModelo::agregar_TipoPaquete($TipoPaquete);
		if ($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
    }
    public function modificar_TipoPaquete_Controlador(){
        $TipoPaquete = new TipPaquete();
		$TipoPaquete->setId(mainModel::limpar_cadena($_POST['Id']));
        $TipoPaquete->setTipoP(mainModel::limpar_cadena($_POST['TipoPaquete']));
        $TipoPaquete->setPrecio(mainModel::limpar_cadena($_POST['Precio']));
		$TipoPaquete->setDesc(mainModel::limpar_cadena($_POST['Descripcion']));
		$respuesta=TipoPaqueteModelo::modificar_TipoPaquete($TipoPaquete);
		if ($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
    }
    public function eliminar_TipoPaquete_Controlador(){
        $TipoPaquete = new TipPaquete();
		$TipoPaquete->setId(mainModel::limpar_cadena($_POST['Id']));
		$respuesta=TipoPaqueteModelo::eliminar_TipoPaquete($TipoPaquete);
		if ($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
    }
    public function consulta_TipoPaquete_Controlador(){
        $datos=array();
		$datos= TipoPaqueteModelo::consulta_TipoPaquete();
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
?>