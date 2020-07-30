<?php 
 class vistasModelo{
 	
 	protected function obtener_vistas_modelo($vistas){

		 $listaBlanca=["objeto","categorylist","category","login",
		 "socursal","empleadoModifi","socursallist","prodserv","prodservlist",
		 "prodservModifi","socios","sociolist","socursalModifi","sociosModifi",
		 "empresa","empresalist","transportes","transportelist","transporteModifi",
		 "puesto","puestolist","puestoModifi","area","arealist","areaModifi","cliente",
		 "clientelist","clienteModifi","taxista","taxistalist","taxistaModifi","paquete",
		 "paquetelist","paqueteModifi","destino","destinolist","destinoModifi",
		 "tipoPaquete","tipoPaquetelist","tipoPaqueteModifi","AdminFechas","ActualizarPass",
		 "ActPass","viajeslist"];

 		if(in_array($vistas, $listaBlanca)){
 			if(is_file("./vistas/contenidos/".$vistas."-view.php")){
 				$contenido="./vistas/contenidos/".$vistas."-view.php";
 			}else{
 				$contenido="login";
			 }
			 
		 }else if($vistas=='ActualizarPass'){
			$contenido="ActualizarPass";
		}
		 else if($vistas=="login"){
 			$contenido="login";
 		}else if($vistas=="index"){
			$contenido="login";
 		}else{
 			$contenido="404";
 		}

 		return $contenido;
 	}
 }