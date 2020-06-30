<div class="full-box login-container cover">
	<div id="AppLogin">
		<form  autocomplete="off" method="POST";  class="logInForm" id="frmlogin">
			<p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
			<p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
			<div class="form-group label-floating">
			  <input class="form-control " id="UserName" required="" placeholder="Usuario" name="Usuario" v-model="Usuario" type="text">
			  <p class="help-block">Escribe tú nombre de usuario</p>
			</div>
			<div class="form-group label-floating">
			  <input class="form-control" id="UserPass" required="" v-model="Password" name="Password" placeholder="Password" type="password">
			  <p class="help-block">Escribe tú contraseña</p>
			</div>
			<input type="checkbox" v-on:click="Mostraspass"  title="mostrar password" />
			&nbsp;&nbsp;Ver Contraseña
			<p class="text-center" style="margin-top: 20px;">
			  <input type="submit"  class="btn botones" value="Acceder">
		   </p>
		   <p class="text-center" style="margin-top: 0px;">
			  <input type="submit" style="color:black;"   v-on:click="Exit" value="Cerrar">
		   </p>
		</form>	
	</div>
</div>
<?php

	if(isset($_POST['Usuario']) && isset($_POST['Password'])){
		require_once "./controlador/loginControlador.php";
		$login= new LoginControlador();
		echo $login->iniciar_session_controlador();
	}

?>
<script src="jsaxios/axios.js"></script>
<script src="jsaxios/vue.js"></script>
<script src="jsaxios/login/Ope_vueLogin.js"></script>