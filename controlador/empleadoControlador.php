<?php
if ($peticionAjax) {
	require_once "../modelo/empleadoModelo.php";
} else {
	require_once "./modelo/empleadoModelo.php";
}
require_once "../vo/objEmpleado.php";
class empleadoControlador extends EmpleadoModelo
{
	public function agregar_socursal_controlador(){
		
		$objEmp = new objEmpleado();
        $objEmp->setNombreE(mainModel::limpar_cadena($_POST['Nombre']));
        $objEmp->setApellidosE(mainModel::limpar_cadena($_POST['Apellidos']));
        $objEmp->setTelefonoE(mainModel::limpar_cadena($_POST['Telefono']));
        $objEmp->setDireccionE(mainModel::limpar_cadena($_POST['Direccion']));
        $objEmp->setCorreoE(mainModel::limpar_cadena($_POST['Correo']));
		$Pass=mainModel::limpar_cadena($_POST['Password1']);
		$objEmp->setPasswordE(mainModel::ecryption($Pass));
        $objEmp->setPuestoTrabajoE(mainModel::limpar_cadena($_POST['CategoriaPuesto']));
        $objEmp->setAreaTrabajoE(mainModel::limpar_cadena($_POST['CategoriaArea']));
        $objEmp->setSocursalE(mainModel::limpar_cadena($_POST['CategoriaSocursal']));
		$respuesta=EmpleadoModelo::agregar_empleado($objEmp);
		if ($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function modificar_socursal_controlador(){
        $objEmp = new objEmpleado();
        $objEmp->setId(mainModel::limpar_cadena($_POST['IdEmp']));
        $objEmp->setNombreE(mainModel::limpar_cadena($_POST['Nombre']));
        $objEmp->setApellidosE(mainModel::limpar_cadena($_POST['Apellidos']));
        $objEmp->setTelefonoE(mainModel::limpar_cadena($_POST['Telefono']));
        $objEmp->setDireccionE(mainModel::limpar_cadena($_POST['Direccion']));
        $objEmp->setCorreoE(mainModel::limpar_cadena($_POST['Correo']));
		$Pass=mainModel::limpar_cadena($_POST['Password1']);
		$objEmp->setPasswordE(mainModel::ecryption($Pass));
        $objEmp->setPuestoTrabajoE(mainModel::limpar_cadena($_POST['CategoriaPuesto']));
        $objEmp->setAreaTrabajoE(mainModel::limpar_cadena($_POST['CategoriaArea']));
        $objEmp->setSocursalE(mainModel::limpar_cadena($_POST['CategoriaSocursal']));
        $respuesta=EmpleadoModelo::modificar_Empleado($objEmp);
		if ($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function eliminar_socursal_controlador(){
        $objEmp = new objEmpleado();
        $objEmp->setId(mainModel::limpar_cadena($_POST['Id']));
		$respuesta=EmpleadoModelo::eliminar_Empleado($objEmp);
		if($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}

	public function select_Empleado_Controlador(){
        $datos=array();
        $Id=mainModel::limpar_cadena($_POST['Id']);
		$datos= EmpleadoModelo::select_Empleado($Id);
		if ($datos){//
			foreach ($datos as $row) {
				$rowdata[]=array('intClave'=>$row['intClave'],'vchNombreP'=>$row['vchNombreP'],
				'vchApellidosP'=>$row['vchApellidosP'],'vchTelefono'=>$row['vchTelefono'],
				'vchDireccion'=>$row['vchDireccion'],'vchCorreo'=>$row['vchCorreo'],'intIdEmpleado'=>$row['intIdEmpleado'],
				'chIdSocursal'=>$row['chIdSocursal'],'chIdPuesto'=>$row['chIdPuesto'],'IdUser'=>$row['IdUser'],
				'vchUsuario'=>$row['vchUsuario'],'vchPassword'=>mainModel::decryption($row['vchPassword']));
            }
			return $rowdata;
		}
	}
	public function consulta_socursales(){
		$datos=array();
		$datos= EmpleadoModelo::consulta_Empleado();
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
