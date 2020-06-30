<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="  <?php  echo serverurl; ?>vistas/css/main.css">
	<script src="<?php  echo serverurl; ?>vistas/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="<?php  echo serverurl; ?>vistas/js/jquery1.js"></script>
	<script src="<?php  echo serverurl; ?>vistas/js/notify.js"></script>
	<script src="<?php  echo serverurl; ?>vistas/js/sweetalert2.min.js"></script>
</head>
<body>
	<!-- SideBar -->
	<!-- Content page -->
	<?php
		$peticionAjax=false;
		require_once "./controlador/vistasControlador.php";
		//require_once "./controlador/controladorPuesto/CtrPuestos.php.php";

		$vt=new vistasControlador();
		//verifica si la pagina que decea navegar existe en la lista blanca para tener una seguridad
		//de paginas habilitadas
		$vistasR=$vt->obtener_vistas_controlador();
		if($vistasR=="login" || $vistasR=="404" ):
			if($vistasR=="login"){
				require_once "./vistas/contenidos/login-view.php";
			}else{
				require_once "./vistas/contenidos/404-view.php";
			}
		else:
			session_start(['name'=>'SMT']);
			require_once "./controlador/loginControlador.php";
			//verifica si se ha iniciado una session o no para forzar a cerrarla
			$loginCTR=new LoginControlador();
			if(!isset($_SESSION['token_smt']) || !isset($_SESSION['usuario_smt'])){
				$loginCTR->forzarCierre_session_controlador();
			}
			//incluye el modulo nagecacion lateral
			//<-- NavBar -->
			include "vistas/modulos/navlateral.php";
	?>
	<!-- script -->
	<script src="<?php  echo serverurl; ?>vistas/js/jquery-3.1.1.min.js"></script>
	<script src="<?php  echo serverurl; ?>vistas/js/material.min.js"></script>
	<script src="<?php  echo serverurl; ?>vistas/js/ripples.min.js"></script>
	<script src="<?php  echo serverurl; ?>vistas/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="<?php  echo serverurl; ?>vistas/js/main.js"></script>       
	<section class="full-box dashboard-contentPage">
	<?php 
	require_once $vistasR;
	?>
	</section>
	<script>
		$.material.init();
	</script>
<!-- codigo que incluye el boton de cerrar session -->
<?php include "vistas/modulos/logoutScript.php"; 
endif;?>
</body>
</html>