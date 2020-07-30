<?php
if ($peticionAjax) {
	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}
require_once "conexionBd.php";
require_once "../vo/objMotoTaxista.php";
class MotoTaxistaModelo extends mainModel{

    protected function agregar_Mototaxista($datos){
        $conectarBd = Conexion::getInstancia();
        $fecha = date("Y-m-d"); 
        $Nombre=  $datos->getNombreT();
        $Apellidos=  $datos->getApellidosT();
        $Telefono=  $datos->getTelefonoT();
        $Direccion=  $datos->getDireccionT();
        $Licencia=$datos->getLicenciaT();
        $Activo='0';
        $Correo=  $datos->getCorreoT();
        $Password = $datos->getPasswordT();
        $IdSocursal=  $datos->getSocursalT();
        $IdMotoTaxi=  $datos->getIdMotoT();
        $query="call SpInsertTaxista(?,?,?,?,?,?,?,?,?,?,?);";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Nombre,PDO::PARAM_STR);
        $sql->bindValue(2,$Apellidos,PDO::PARAM_STR);
		$sql->bindValue(3,$Telefono,PDO::PARAM_STR);
        $sql->bindValue(4,$Direccion,PDO::PARAM_STR);
        $sql->bindValue(5,$Correo,PDO::PARAM_STR);
        $sql->bindValue(6,$IdSocursal,PDO::PARAM_STR);
        $sql->bindValue(7,$fecha,PDO::PARAM_STR);
        $sql->bindValue(8,$Password,PDO::PARAM_STR);
        $sql->bindValue(9,$Licencia,PDO::PARAM_STR);
        $sql->bindValue(10,$Activo,PDO::PARAM_STR);
        $sql->bindValue(11,$IdMotoTaxi,PDO::PARAM_STR);
        $sql->execute();
		return $sql;
    }
    protected function modificar_MotoTaxista($datos){
        $conectarBd = Conexion::getInstancia();
        $Id= $datos->getId();
        $Nombre=  $datos->getNombreT();
        $Apellidos=  $datos->getApellidosT();
        $Telefono=  $datos->getTelefonoT();
        $Licencia=$datos->getLicenciaT();
        $Direccion=  $datos->getDireccionT();
        $Correo=  $datos->getCorreoT();
        $Password = $datos->getPasswordT();
        $query="call SpUpdateTaxista(?,?,?,?,?,?,?,?);";
        $sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->bindValue(2,$Nombre,PDO::PARAM_STR);
        $sql->bindValue(3,$Apellidos,PDO::PARAM_STR);
		$sql->bindValue(4,$Telefono,PDO::PARAM_STR);
        $sql->bindValue(5,$Direccion,PDO::PARAM_STR);
        $sql->bindValue(6,$Correo,PDO::PARAM_STR);
        $sql->bindValue(7,$Licencia,PDO::PARAM_STR);
        $sql->bindValue(8,$Password,PDO::PARAM_STR);
        $sql->execute();
		return $sql;
    }
    protected function activar_MotoTaxista($Id,$Activo){
        $conectarBd = Conexion::getInstancia();
        $query = "call SpUpdateActivoTaxista(?,?);";
        $sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->bindValue(2,$Activo,PDO::PARAM_STR);
        $sql->execute();
        return $sql;
    }
    protected function eliminar_MotoTaxista($datos){
        $conectarBd = Conexion::getInstancia();
        $Id=  $datos->getId();
        $query="call SpDeleteTaxistaDatos(?);";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->execute();
		return $sql;
    }
    protected function mototaxista($Id){
        $conectarBd = Conexion::getInstancia();
        $query = "call SpSelectDatotaxista(?)";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->execute();
		return $sql;
    }
    protected function consulta_motoTaxista(){
        $conectarBd = Conexion::getInstancia();
        $query="call SpSelectTaxistaLista();";
        $sql =$conectarBd->prepare($query);
        $sql->execute();
		return $sql;
    }
    protected function consulta_Socursal(){
        $conectarBd = Conexion::getInstancia();
        $query="call SpComboSocursal();";
        $sql =$conectarBd->prepare($query);
        $sql->execute();
		return $sql;
    } 
    protected function consulta_MotoTaxi(){
        $conectarBd = Conexion::getInstancia();
        $query="call SpSelectMotoActivo();";
        $sql =$conectarBd->prepare($query);
        $sql->execute();
		return $sql;
    }


}
