<?php
if ($peticionAjax) {
	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}
require_once "conexionBd.php";
require_once "../vo/objCliente.php";
class ClienteModelo extends mainModel{
    protected function agregar_Cliente($datos){
        $conectarBd = Conexion::getInstancia();
        $Nombre=  $datos->getNombreC();
        $Apellidos=  $datos->getApellidosC();
        $Telefono=  $datos->getTelefonoC();
        $Direccion=  $datos->getDireccionC();
        $Correo=  $datos->getCorreoC();
        $Password = $datos->getPasswordC();
        $CategoriaSocursal=  $datos->getSocursalC();
        $query="call SpInsertCliente(?,?,?,?,?,?,?);";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Nombre,PDO::PARAM_STR);
        $sql->bindValue(2,$Apellidos,PDO::PARAM_STR);
		$sql->bindValue(3,$Telefono,PDO::PARAM_STR);
        $sql->bindValue(4,$Direccion,PDO::PARAM_STR);
        $sql->bindValue(5,$Correo,PDO::PARAM_STR);
        $sql->bindValue(6,$CategoriaSocursal,PDO::PARAM_STR);
        $sql->bindValue(7,$Password,PDO::PARAM_STR);
        $sql->execute();
		return $sql;
    }
    protected function modificar_Cliente($datos){
        $conectarBd = Conexion::getInstancia();
        $Id=$datos->getId();
        $Nombre=  $datos->getNombreC();
        $Apellidos=  $datos->getApellidosC();
        $Telefono=  $datos->getTelefonoC();
        $Direccion=  $datos->getDireccionC();
        $Correo=  $datos->getCorreoC();
        $Password = $datos->getPasswordC();
        $CategoriaSocursal=  $datos->getSocursalC();
        $query="call SpUpdateCliente(?,?,?,?,?,?,?,?);";
        $sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->bindValue(2,$Nombre,PDO::PARAM_STR);
        $sql->bindValue(3,$Apellidos,PDO::PARAM_STR);
		$sql->bindValue(4,$Telefono,PDO::PARAM_STR);
        $sql->bindValue(5,$Direccion,PDO::PARAM_STR);
        $sql->bindValue(6,$Correo,PDO::PARAM_STR);
        $sql->bindValue(7,$CategoriaSocursal,PDO::PARAM_STR);
        $sql->bindValue(8,$Password,PDO::PARAM_STR);
        $sql->execute();
		return $sql;
    }
    protected function eliminar_Cliente($datos){
        $conectarBd = Conexion::getInstancia();
        $Id=$datos->getId();
        $query="call SpDeleteDatoscliente(?);";
        $sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->execute();
		return $sql;
    }
    protected function Cliente_Select($Id){
        $conectarBd = Conexion::getInstancia();
        $query = "call SpSelectCliente(?)";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->execute();
		return $sql;
    }
    protected function consulta_Empleado(){
        $conectarBd = Conexion::getInstancia();
        $query="call SpSelectClienteLista();";
        $sql =$conectarBd->prepare($query);
        $sql->execute();
		return $sql;
    }

}
