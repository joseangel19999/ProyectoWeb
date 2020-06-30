<?php  

	if($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}
	class administradorModelo extends mainModel{
		protected function agregar_admin_modelo($datos)
		{
			$sql=mainModel::conectar()->prepare("INSERT INTO tblpuestos(vchIdpuesto,vchNombre,vchDescripcion) VALUES(:id,:nombre,:descripcion);");
			$sql->bindParam(":id",$datos['clavePuesto']);
			$sql->bindParam(":nombre",$datos['nombrePuesto']);
			$sql->bindParam(":descripcion",$datos['descPuesto']);
			$sql->execute();
			return $sql;
		}
	}


?>