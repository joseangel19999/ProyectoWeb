	<script src="<?php  echo serverurl; ?>vistas/js/notify.js"></script>
			<div class="container-fluid">
			<div class="page-header">
			<div class="text-t full-box text-uppercase">ATUALIZACION DE PASSWORD</div>
			</div>

		</div>
		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>

			  		
			  	</li>
			  	<li>
			  	</li>
			</ul>
		</div>
		 
		<!-- Panel nuevo administrador -->
<div id="app">
	<div class="conten-page">
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-plus ico"></i> &nbsp;ACTUALIZACION </h3>
				</div>
				<div class="panel-body" >
					<form   id="form-input" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
				    	<fieldset>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label>Fecha de Restauracion</label>
										  	<input pattern="[0-9-]{1,30}"  class="form-control" v-model="Fecha"  type="datetime-local" name="Dni" maxlength="30">
										</div>
				    				</div>
									<div class="col-xs-12 col-sm-3">
									<br><br>
									<div class="label-floating">
										<label>Seleccione Tipo de Usuarios</label>
										<select id="comboSocursal" name="CategoriaSocursal" class="col-xs-12 col-ms-6">
											<option value="0">-Seleccione-</option>
											<option value="Todos">Todos</option>
											<option value="cate.chIdPuesto" v-for="cate in ListaPuesto" v-bind:value="cate.chIdPuesto">{{cate.vchNomPuesto}}</option>;
											<option value="Cliente">Cliente</option>
										</select>
									</div>
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
<script type="module" src="jsaxios/adminFechas/Ope_vueEmpleado.js"></script>