<?php 
 class vistasModelo{
 	
 	protected function obtener_vistas_modelo($vistas){

 		$listaBlanca=["objeto","categorylist","category","login","empleados","empleadolist","prodserv","prodservlist","prodservModifi","socios","sociolist","empleadosModifi","sociosModifi","empresa","empresalist","transportes","transportelist","transporteModifi","puesto","puestolist","puestoModifi","area","arealist","areaModifi"];

 		if(in_array($vistas, $listaBlanca)){

 			if(is_file("./vistas/contenidos/".$vistas."-view.php")){
 				$contenido="./vistas/contenidos/".$vistas."-view.php";
 			}else{
 				$contenido="login";
 			}
 		}else if($vistas=="login"){
 			$contenido="login";
 		}else if($vistas=="index"){
			$contenido="login";
 		}else{
 			$contenido="404";
 		}

 		return $contenido;
 	}
 }