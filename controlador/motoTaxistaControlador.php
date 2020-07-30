<?php
if ($peticionAjax) {
	require_once "../modelo/motoTaxistaModelo.php";
} else {
	require_once "./modelo/motoTaxistaModelo.php";
}
require_once "../vo/objMotoTaxista.php";
class motoTaxistaControlador extends MotoTaxistaModelo
{
	public function agregar_motoTaxista_controlador(){
		$objMotoTaxista = new objMotoTaxista();
        $objMotoTaxista->setNombreT(mainModel::limpar_cadena($_POST['Nombre']));
        $objMotoTaxista->setApellidosT(mainModel::limpar_cadena($_POST['Apellidos']));
        $objMotoTaxista->setTelefonoT(mainModel::limpar_cadena($_POST['Telefono']));
        $objMotoTaxista->setDireccionT(mainModel::limpar_cadena($_POST['Direccion']));
        $objMotoTaxista->setLicenciaT(mainModel::limpar_cadena($_POST['Licencia']));
		$objMotoTaxista->setCorreoT(mainModel::limpar_cadena($_POST['Correo']));
		$passord=mainModel::limpar_cadena($_POST['Password1']);
        $objMotoTaxista->setPasswordT(mainModel::ecryption($passord));
        $objMotoTaxista->setIdMotoT(mainModel::limpar_cadena($_POST['CategoriaMotoTaxi']));
        $objMotoTaxista->setSocursalT(mainModel::limpar_cadena($_POST['CategoriaSocursal']));
		$respuesta=MotoTaxistaModelo::agregar_Mototaxista($objMotoTaxista);
		if ($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
        }
		return $Res;
	}
	public function modificar_motoTaxista_controlador(){
        $objMotoTaxista = new objMotoTaxista();
        $objMotoTaxista->setId(mainModel::limpar_cadena($_POST['IdTaxista']));
        $objMotoTaxista->setNombreT(mainModel::limpar_cadena($_POST['Nombre']));
        $objMotoTaxista->setApellidosT(mainModel::limpar_cadena($_POST['Apellidos']));
        $objMotoTaxista->setTelefonoT(mainModel::limpar_cadena($_POST['Telefono']));
        $objMotoTaxista->setLicenciaT(mainModel::limpar_cadena($_POST['Licencia']));
        $objMotoTaxista->setDireccionT(mainModel::limpar_cadena($_POST['Direccion']));
		$objMotoTaxista->setCorreoT(mainModel::limpar_cadena($_POST['Correo']));
		$passord=mainModel::limpar_cadena($_POST['Password1']);
        $objMotoTaxista->setPasswordT(mainModel::ecryption($passord));
		$respuesta=MotoTaxistaModelo::modificar_motoTaxista($objMotoTaxista);
		if ($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
    }
    public function activar_motoTaxista_controlador(){
        $Id=mainModel::limpar_cadena($_POST['Id']);
        $Activo=mainModel::limpar_cadena($_POST['Activo']);
		$respuesta=MotoTaxistaModelo::activar_MotoTaxista($Id,$Activo);
		if($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function eliminar_motoTaxista_controlador(){
        $objMotoTaxista = new objMotoTaxista();
        $objMotoTaxista->setId(mainModel::limpar_cadena($_POST['Id']));
		$respuesta=MotoTaxistaModelo::eliminar_motoTaxista($objMotoTaxista);
		if($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
    }
    public function select_motoTaxista(){
        $datos=array();
        $Id=mainModel::limpar_cadena($_POST['Id']);
		$datos= MotoTaxistaModelo::mototaxista($Id);
		if ($datos){
			foreach ($datos as $row) {
				$rowdata[]=array('iniIdClave'=>$row['iniIdClave'],'vchNombreP'=>$row['vchNombreP'],
				'vchApellidosP'=>$row['vchApellidosP'],'vchTelefono'=>$row['vchTelefono'],
				'vchDireccion'=>$row['vchDireccion'],'vchCorreo'=>$row['vchCorreo'],
				'vchUsuario'=>$row['vchUsuario'],'vchPassword'=>mainModel::decryption($row['vchPassword']),'vchLicencia'=>$row['vchLicencia']);
            }
			return $rowdata;
		}
	}
	public function consulta_motoTaxista(){
		$datos=array();
		$datos= MotoTaxistaModelo::consulta_motoTaxista();
		if ($datos){
			$i=0;
			foreach ($datos as $row) {
				$rowdata[$i]=$row;
				$i++;
            }
			return $rowdata;
		}
	}public function consulta_motoTaxi_controlador(){
		$datos=array();
		$datos= MotoTaxistaModelo::consulta_motoTaxi();
		if ($datos){
			$i=0;
			foreach ($datos as $row) {
				$rowdata[$i]=$row;
				$i++;
            }
			return $rowdata;
		}
    }
    public function consulta_Socursal_controlador(){
		$datos=array();
		$datos= MotoTaxistaModelo::consulta_Socursal();
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
