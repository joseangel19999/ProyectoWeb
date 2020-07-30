<?php
if ($peticionAjax) {
	require_once "../modelo/clienteModelo.php";
} else {
	require_once "./modelo/clienteModelo.php";
}
require_once "../vo/objCliente.php";
class clienteControlador extends ClienteModelo
{
	public function agregar_cliente_controlador(){
		$objC = new objCliente();
        $objC->setNombreC(mainModel::limpar_cadena($_POST['Nombre']));
        $objC->setApellidosC(mainModel::limpar_cadena($_POST['Apellidos']));
        $objC->setTelefonoC(mainModel::limpar_cadena($_POST['Telefono']));
        $objC->setDireccionC(mainModel::limpar_cadena($_POST['Direccion']));
		$objC->setCorreoC(mainModel::limpar_cadena($_POST['Correo']));
		$password=mainModel::limpar_cadena($_POST['Password1']);
        $objC->setPasswordC(mainModel::ecryption($password));
        $objC->setSocursalC(mainModel::limpar_cadena($_POST['CategoriaSocursal']));
		$respuesta=ClienteModelo::agregar_Cliente($objC);
		if ($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function modificar_cliente_controlador(){
        $objEmp = new objCliente();
        $objEmp->setId(mainModel::limpar_cadena($_POST['IdC']));
        $objEmp->setNombreC(mainModel::limpar_cadena($_POST['Nombre']));
        $objEmp->setApellidosC(mainModel::limpar_cadena($_POST['Apellidos']));
        $objEmp->setTelefonoC(mainModel::limpar_cadena($_POST['Telefono']));
        $objEmp->setDireccionC(mainModel::limpar_cadena($_POST['Direccion']));
        $objEmp->setCorreoC(mainModel::limpar_cadena($_POST['Correo']));
		$password=mainModel::limpar_cadena($_POST['Password1']);
        $objEmp->setPasswordC(mainModel::ecryption($password));
        $objEmp->setSocursalC(mainModel::limpar_cadena($_POST['CategoriaSocursal']));
        $respuesta=ClienteModelo::modificar_Cliente($objEmp);
		if ($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function eliminar_cliente_controlador(){
        $objC= new objCliente();
        $objC->setId(mainModel::limpar_cadena($_POST['Id']));
		$respuesta=ClienteModelo::eliminar_Cliente($objC);
		if($respuesta->rowCount() >= 1) {
			$Res=1;
		} else {
			$Res=0;
		}
		return $Res;
	}
	public function select_Cliente(){
        $datos=array();
        $Id=mainModel::limpar_cadena($_POST['Id']);
		$datos= ClienteModelo::Cliente_Select($Id);
		if ($datos){
			foreach ($datos as $row) {
				$rowdata[]=array('intIdCliente'=>$row['intIdCliente'],'vchNombreP'=>$row['vchNombreP'],
				'vchApellidosP'=>$row['vchApellidosP'],'vchTelefono'=>$row['vchTelefono'],
				'vchDireccion'=>$row['vchDireccion'],'vchCorreo'=>$row['vchCorreo'],
				'vchUsuario'=>$row['vchUsuario'],'vchPassword'=>mainModel::decryption($row['vchPassword']));
            }
			return $rowdata;
		}
	}
	public function consulta_cliente(){
		$datos=array();
		$datos= ClienteModelo::consulta_Empleado();
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