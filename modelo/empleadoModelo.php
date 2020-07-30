<?php
if ($peticionAjax) {
	require_once "../core/mainModel.php";
} else {
	require_once "./core/mainModel.php";
}
require_once "conexionBd.php";
require_once "../vo/objEmpleado.php";
class EmpleadoModelo extends mainModel{
    protected function agregar_Empleado($datos){
        $conectarBd = Conexion::getInstancia();
        $fecha = date("Y-m-d");
        $Nombre=  $datos->getNombreE();
        $Apellidos=  $datos->getApellidosE();
        $Telefono=  $datos->getTelefonoE();
        $Direccion=  $datos->getDireccionE();
        $Correo=  $datos->getCorreoE();
        $Password = $datos->getPasswordE();
        $Cate=  $datos->getPuestoTrabajoE();
        $CategoriaArea=  $datos->getAreaTrabajoE();
        $CategoriaSocursal=  $datos->getSocursalE();
        $query="call SpInsertEmpleado10(?,?,?,?,?,?,?,?,?,?);";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Nombre,PDO::PARAM_STR);
        $sql->bindValue(2,$Apellidos,PDO::PARAM_STR);
		$sql->bindValue(3,$Telefono,PDO::PARAM_STR);
        $sql->bindValue(4,$Direccion,PDO::PARAM_STR);
        $sql->bindValue(5,$Correo,PDO::PARAM_STR);
        $sql->bindValue(6,$CategoriaSocursal,PDO::PARAM_STR);
        $sql->bindValue(7,$fecha,PDO::PARAM_STR);
        $sql->bindValue(8,$Cate,PDO::PARAM_STR);
        $sql->bindValue(9,$CategoriaArea,PDO::PARAM_STR);
        $sql->bindValue(10,$Password,PDO::PARAM_STR);
        $sql->execute();
		return $sql;
    }
    protected function modificar_Empleado($datos){
        $conectarBd = Conexion::getInstancia();
        $Id=$datos->getId();
        $Nombre=  $datos->getNombreE();
        $Apellidos=  $datos->getApellidosE();
        $Telefono=  $datos->getTelefonoE();
        $Direccion=  $datos->getDireccionE();
        $Correo=  $datos->getCorreoE();
        $Password = $datos->getPasswordE();
        $Cate=  $datos->getPuestoTrabajoE();
        $CategoriaArea=  $datos->getAreaTrabajoE();
        $CategoriaSocursal=  $datos->getSocursalE();
        $query="call SpUpdateEmp(?,?,?,?,?,?,?,?,?,?);";
        $sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->bindValue(2,$Nombre,PDO::PARAM_STR);
        $sql->bindValue(3,$Apellidos,PDO::PARAM_STR);
		$sql->bindValue(4,$Telefono,PDO::PARAM_STR);
        $sql->bindValue(5,$Direccion,PDO::PARAM_STR);
        $sql->bindValue(6,$Correo,PDO::PARAM_STR);
        $sql->bindValue(7,$CategoriaSocursal,PDO::PARAM_STR);
        $sql->bindValue(8,$Cate,PDO::PARAM_STR);
        $sql->bindValue(9,$CategoriaArea,PDO::PARAM_STR);
        $sql->bindValue(10,$Password,PDO::PARAM_STR);
        $sql->execute();
		return $sql;
    }
    protected function eliminar_Empleado($datos){
        $conectarBd = Conexion::getInstancia();
        $Id=$datos->getId();
        $query="call SpDeleteEmpleadoDatos(?);";
        $sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->execute();
		return $sql;
    }
   
    protected function select_Empleado($Id){
        $conectarBd = Conexion::getInstancia();
        $query = "call SpDatosEmplModi(?)";
		$sql =$conectarBd->prepare($query);
        $sql->bindValue(1,$Id,PDO::PARAM_STR);
        $sql->execute();
		return $sql;
    }

    protected function consulta_Empleado(){
        $conectarBd = Conexion::getInstancia();
        $query="call SpSelectEmpleadodatos();";
        $sql =$conectarBd->prepare($query);
        $sql->execute();
		return $sql;
    }

}
