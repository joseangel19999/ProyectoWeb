<?php
if ($peticionAjax) {
	require_once "../modelo/SocursalModelo.php";
} else {
	require_once "./modelo/SocursalModelo.php";
}
require_once "../vo/objSocursal.php";
class socursalControlador extends SocursalModelo
{
	public function agregar_socursal_controlador(){
		$objSocursal = new objSocursal();
        $objSocursal->setId(mainModel::limpar_cadena($_POST['Id']));
        $objSocursal->setNombreS(mainModel::limpar_cadena($_POST['Nombre']));
        $objSocursal->setDireccionS(mainModel::limpar_cadena($_POST['Direccion']));
        $objSocursal->setTelefonoS(mainModel::limpar_cadena($_POST['Telefono']));
        $objSocursal->setCorreoS(mainModel::limpar_cadena($_POST['Correo']));
		$respuesta=SocursalModelo::agregar_Socursal($objSocursal);
		if ($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function modificar_socursal_controlador(){
		$objSocursal = new objSocursal();
        $objSocursal->setId(mainModel::limpar_cadena($_POST['Id']));
        $objSocursal->setNombreS(mainModel::limpar_cadena($_POST['Nombre']));
        $objSocursal->setDireccionS(mainModel::limpar_cadena($_POST['Direccion']));
        $objSocursal->setTelefonoS(mainModel::limpar_cadena($_POST['Telefono']));
        $objSocursal->setCorreoS(mainModel::limpar_cadena($_POST['Correo']));
		$respuesta=SocursalModelo::modificar_Socursal($objSocursal);
		if($respuesta->rowCount() >=1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function eliminar_socursal_controlador(){
        $objSocursal = new objSocursal();
        $objSocursal->setId(mainModel::limpar_cadena($_POST['Id']));
		$respuesta=SocursalModelo::eliminar_Socursal($objSocursal);
		if($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function consulta_socursales(){
		$datos=array();
		$datos= SocursalModelo::consulta_Socursal();
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
