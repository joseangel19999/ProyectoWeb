<?php 
	if($peticionAjax){
		require_once "../core/configAPP.php";
	}else{
		require_once "./core/configAPP.php";
	}
	class mainModel{
		protected static function conectar(){
			$enlace= new PDO(sgbd,user,login);
			return $enlace;
		}
		protected function ejecutar_consulta_simple($consulta){
			$respuesta=self::conectar()->prepare($consulta);
			$respuesta->execute();
			return $respuesta;
		}
		protected static function agregar_cuenta($datos){
			$sql=self::conectar()->prepare("INSERT INTO tblpuestos(vchIdpuesto,vchNombre,vchDescripcion) VALUES(:id,:nombre,:descripcion);");
			$sql->bindParam(":id",$datos['clave']);
			$sql->bindParam(":nombre",$datos['nombre']);
			$sql->bindParam(":descripcion",$datos['desc']);
			$sql->execute();
			var_dump(sgbd);
			return $sql;
		}
		protected static function eliminar_cuenta($codigo){
			$sql=self::conectar()->prepare("DELETE FROM tblpuestos WHERE vchIdpuesto=:codigo");
			$sql->bindParam(":codigo",$codigo);
			$sql->execute();
			return $sql;
		}
		protected static function guardar_bitacura(){}
		
		public static function ecryption($string){
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV),0,16);
			$output=openssl_encrypt($string, METHOD,$key,0,$iv);
			$output=base64_encode($output);
			return $output;
		}
		public static function decryption($string){
			$key=hash('sha256',SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV),0,16);
			$output=openssl_decrypt(base64_decode($string), METHOD,$key,0,$iv);
			return $output;
		}
		protected function generar_codigo_aleatorio($letra,$longitud,$num){
			for($i=1;$i<=$longitud;$i++){
				$numero=rand(0,9);
				$letra.=$numero;	
			}
			return $letra.$num;
		}
		protected static function limpar_cadena($cadena){
			$cadena=trim($cadena);
			$cadena=stripslashes($cadena);
			$cadena=str_ireplace("<script>","",$cadena);
			return $cadena;
		}
		protected static function sweet_alert($datos){
			if($datos['Alerta']=="simple"){
				$alerta="
					<script>
						swal(
						'".$datos['Titulo']."',
						'".$datos['Texto']."',
						'".$datos['Tipo']."'
						);
					</script>
				";
			}else if($datos['Alerta']=="recargar"){
				$alerta="
					<script>
						swal({
							title:'".$datos['Titulo']."',
							text:'".$datos['Texto']."',
							type:'".$datos['Tipo']."',
							confirmButtonText:'Aceptar'
						}).them(function(){
							location.reload();
						});

					</script>";
			}else if($datos['Alerta']=="limpiar"){
				$alerta="
					<script>
						swal({
							title:'".$datos['Titulo']."',
							text:'".$datos['Texto']."',
							type:'".$datos['Tipo']."',
							confirmButtonText:'Aceptar'
						}).them(function(){
							$('.FormularioAjax')[0].reset();
						});
					</script>";
			}
			return $alerta;
		}
	}
?>