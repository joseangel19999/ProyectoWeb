<?php  
	if($peticionAjax){
		require_once "../modelo/administradorModelo.php";
	}else{
		require_once "./modelo/administradorModelo.php";
	}

	class administradorcontrolador extends administradorModelo{
		public function agregar_admin_controlador()
		{
			$clave=mainModel::limpar_cadena($_POST['clavePuesto']);
			$nombrePuesto=mainModel::limpar_cadena($_POST['nombrePuesto']);
			$descPuesto=mainModel::limpar_cadena($_POST['descPuesto']);
			if($clave!=$clave){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"La contrasela no coicide",
					"Tipo"=>"error"
				];
			}else{
				$consulta=mainModel::ejecutar_consulta_simple("SELECT chIdPuesto FROM tblpuesto WHERE chIdPuesto='$clave'");
				if($consulta->rowCount()>=1){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"La Clave de puesto ya existe",
						"Tipo"=>"error"
					];
				}else{
					$dataAC=[
						"clave"=>$clave,
						"nombre"=>$nombrePuesto,
						"desc"=>$descPuesto
					];
					$respuesta=administradorModelo::agregar_admin_modelo($dataAC);
					if($respuesta->rowCount()>=1){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Registro",
							"Texto"=>"El registro se gurado con exito",
							"Tipo"=>"error"
						];
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Error",
							"Texto"=>"Error al registrar",
							"Tipo"=>"error"
						];
					}

				}
			}
			return mainModel::sweet_alert($alerta);
		}
	}

?>