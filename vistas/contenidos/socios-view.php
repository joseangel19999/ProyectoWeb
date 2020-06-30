<script src="<?php  echo serverurl; ?>vistas/js/notify.js"></script>
		<div class="container-fluid">
			<div class="page-header">
			  <div class="text-t full-box text-uppercase">CATALOGO DE SOCIOS</div>
			</div>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>

			  		<a href="<?php echo serverurl; ?>socios" class="btn botones" >
			  			<i class="zmdi zmdi-plus ico"></i> &nbsp;NUEVO
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
		<div id="app">
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-plus ico"></i> &nbsp; DATOS DE NUEVO SOCIO</h3>
				</div>
				<div class="panel-body">
					<form>
				    	<fieldset>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label class="control-label">DNI/CEDULA</label>
										  	<input pattern="[0-9-]{1,30}" v-model="Empleado[0]" class="form-control" type="text" name="dni-reg"  maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nombres</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="Empleado[1]" class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label class="control-label">Apellidos Paterno</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="Empleado[2]"  class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
										</div>
									</div>
									<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label class="control-label">Apellidos Paterno</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="Empleado[3]"   class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label class="control-label">Teléfono</label>
										  	<input pattern="[0-9+]{1,15}" v-model="Empleado[4]"  class="form-control" type="text" name="telefono-reg" maxlength="10">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label class="control-label">Cargo/Ocupación</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="Empleado[5]"  class="form-control" type="text" name="ocupacion-reg" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-8">
										<div class="form-group label-floating">
										  	<label class="control-label">Dirección</label>
										  	<textarea name="direccion-reg" v-model="Empleado[6]"   class="form-control" rows="1" maxlength="100"></textarea>
										</div>
				    				</div>
				    			</div>
				    		</div>
				    	</fieldset>
						</form>
				</div>
				</div>
				
		</div>
<!-- Panel nuevo cliente seguridad -->
<div class="container-fluid">
	<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-key ico"></i> &nbsp; DATOS DE LA CUENTA</h3>
				</div>
				<div class="panel-body">
					<form>
				    	<fieldset>
						<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12">
							    		<div class="form-group label-floating">
										  	<label class="control-label">Nombre de usuario</label>
										  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" v-model="Empleado[7]" class="form-control" type="text" name="usuario-reg"  maxlength="15">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Contraseña</label>
										  	<input class="form-control" v-model="Empleado[8]"  type="password" name="password1-reg"  maxlength="70">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Repita la contraseña</label>
										  	<input class="form-control" v-model="Empleado[9]"  type="password" name="password2-reg"  maxlength="70">
										</div>
				    				</div>
				    			</div>
				    		</div>
				    	</fieldset>
					    <p class="text-center" style="margin-top: 20px;">
					    	<button  v-on:click="agregarTarea" class="btn botones"><i class="zmdi zmdi-floppy ico"></i> Guardar</button>
					    </p>
				    </form>
				</div>
			</div>
	<script src="jsaxios/axios.js"></script>
	<script src="jsaxios/vue.js"></script>
	<script src="jsaxios/Cliente/Ope_vue.js"></script>
	</div>
	
	
	
