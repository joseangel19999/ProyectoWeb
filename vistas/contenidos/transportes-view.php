	<script src="<?php  echo serverurl; ?>vistas/js/notify.js"></script>
			<div class="container-fluid">
			<div class="page-header">
			<div class="text-t full-box text-uppercase">CATALOGO DE MOTO-TAXI</div>
			</div>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>

			  		<a href="<?php echo serverurl; ?>transportes" class="btn botones" >
			  			<i class="zmdi zmdi-plus ico"></i> &nbsp;NUEVO
			  		</a>
			  	</li>
			  	<li>
			  		<a href="<?php echo serverurl; ?>transportelist" class="btn botones" >
			  			<i class="zmdi zmdi-format-list-bulleted ico"></i> &nbsp;LISTA
			  		</a>
			  	</li>
			</ul>
		</div>
		 
		<!-- Panel nuevo administrador -->
<div id="app">
	<div class="conten-page">
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-plus ico"></i> &nbsp;NUEVO SOCURSAL</h3>
				</div>
				<div class="panel-body" >
					<form  method="POST" data-form="" id="form-input" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
				    	<fieldset>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label class="control-label">DNI</label>
										  	<input pattern="[0-9-]{1,30}" class="form-control"  v-model="Empleado[0]"  type="text" name="Dni" maxlength="30">
										</div>
									</div>
									<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nombre/Numero</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="Empleado[1]" class="form-control" type="text" name="Nombre" required="" maxlength="30">
										</div>
				    				</div>
									<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Marca</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="Empleado[2]" class="form-control" type="text" name="Apellido" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label class="control-label">Placa</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="Empleado[3]" class="form-control" type="text" name="Apellido" required="" maxlength="30">
										</div>
				    				</div>
									<div >
									<br><br>
				    				</div>
				    			</div>
				    		</div>
						</fieldset>
						<p class="text-center" style="margin-top: 20px;">
					    	<button v-on:click="agregarTarea"   class="btn botones"><i class="zmdi zmdi-floppy ico"></i> Guardar</button>
					    </p> 
						</form>
				</div>
			</div>
		</div>
		<div class="container-fluid">
	</div>
</div>
<script src="jsaxios/axios.js"></script>
<script src="jsaxios/vue.js"></script>
<script type="module" src="jsaxios/transporte/Ope_vueTranporte.js"></script>