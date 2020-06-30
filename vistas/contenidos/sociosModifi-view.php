<script src="<?php  echo serverurl; ?>vistas/js/notify.js"></script>
<div class="container-fluid">
			<div class="page-header">
			  <div class="text-t full-box text-uppercase">CATALOGO DE SOCIOS</div>
			</div>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  		<a href="<?php echo serverurl; ?>socios" class="btn botones">
			  			<i class="zmdi zmdi-plus ico"></i> &nbsp;NUEVO
			  		</a>
                  </li>
                  <li>
			  		<a href="<?php echo serverurl; ?>sociosModifi" class="btn botones" >
			  			<i class="zmdi zmdi-plus ico"></i> &nbsp;MODIFICAR
			  		</a>
			  	</li>
			  	<li>
			  		<a href="<?php echo serverurl; ?>sociolist" class="btn botones" >
			  			<i class="zmdi zmdi-format-list-bulleted ico"></i> &nbsp;LISTA
			  		</a>
			  	</li>
			</ul>
		</div>

		<!-- Panel nuevo cliente -->
<div id="AppModi">
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-plus ico"></i> &nbsp;MODIFICAR DATOS DE SOCIO</h3>
				</div>
				<div class="panel-body">
					<form>
				    	<fieldset>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										<label >Curp</label>
										  	<input pattern="[0-9-]{1,30}" v-model="Curp" class="form-control" type="text" name="dni-reg" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label >Nombres</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="Nombre"  class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label >Apellidos Paterno</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="Apepa" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
										</div>
									</div>
									<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label >Apellidos Materno</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="Apema"  class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label >Teléfono</label>
										  	<input pattern="[0-9+]{1,15}" v-model="Telefono"  class="form-control" type="text" name="telefono-reg" required="" maxlength="15">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label >Correo</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="Correo"  class="form-control" type="text" name="ocupacion-reg" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-8">
										<div class="form-group label-floating">
										  	<label >Dirección</label>
										  	<textarea name="direccion-reg" v-model="Direccion" class="form-control" rows="1" required="" maxlength="100"></textarea>
										</div>
				    				</div>
				    			</div>
				    		</div>
						</fieldset>
						</form>
				</div>
				</div>
				
		</div>

		<div class="container-fluid">
	<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-key ico"></i> &nbsp; MODIFICAR DATOS DE LA CUENTA</h3>
				</div>
				<div class="panel-body">
					<form>
				    	<fieldset>
				    			<div class="row">
				    				<div class="col-xs-12">
							    		<div class="form-group label-floating">
										  	<label >Nombre de usuario</label>
										  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" v-model="Usuario" class="form-control" type="text" name="usuario-reg" required="" maxlength="15">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label >Contraseña</label>
										  	<input class="form-control" type="password" v-model="Password" name="password1-reg" required="" maxlength="70">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label >Repita la contraseña</label>
										  	<input class="form-control" type="password" v-model="Password2" name="password2-reg" required="" maxlength="30">
										</div>
				    				</div>
				    			</div>
				    		</div>
				    	</fieldset>
					   
				    </form>
					<p class="text-center" style="margin-top: 20px;">
					    	<button  id="BtnModi" v-on:click="Modificar" class="btn botones"><i class="zmdi zmdi-floppy ico"></i> Guardar</button>
					    </p>
				</div>
			</div>
		</div>
</div>
<script src="jsaxios/axios.js"></script>
<script src="jsaxios/vue.js"></script>
<script type="module" src="jsaxios/cliente/Ope_ClieModi.js"></script>
