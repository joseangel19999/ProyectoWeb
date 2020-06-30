<script src="<?php echo serverurl; ?>vistas/js/notify.js"></script>
<div class="container-fluid">
	<div class="page-header">
		<div class="text-t full-box text-uppercase">CATALOGO DE SOCURSALES</div>
	</div>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>

			<a href="<?php echo serverurl; ?>transportes" class="btn botones">
				<i class="zmdi zmdi-plus ico"></i> &nbsp;NUEVO
			</a>
		</li>
		<li>
			<a href="<?php echo serverurl; ?>transportelist" class="btn botones">
				<i class="zmdi zmdi-format-list-bulleted ico"></i> &nbsp;LISTA
			</a>
		</li>
	</ul>
</div>

<!-- Panel nuevo administrador -->
<div id="AppModiE">
	<div class="container-fluid">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="zmdi zmdi-plus ico"></i> &nbsp;MODIFICAR DATOS DE SOCURSAL</h3>
			</div>
			<div class="panel-body">
				<form action="<?php echo serverurl; ?>ajax/administradorAja.php" id="form-input" method="POST" data-form="" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
					<fieldset>
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12 col-sm-4">
									<div class="form-group label-floating">
										<label>DNI</label>
										<input pattern="[0-9-]{1,30}" v-model="Curp" class="form-control" type="text" name="dni-reg" required="" maxlength="30">
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="form-group label-floating">
										<label>Marca</label>
										<input pattern="[0-9-]{1,30}" v-model="Nombre" class="form-control" type="text" name="dni-reg" required="" maxlength="30">
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
								</div>
								<div class="col-xs-12 col-sm-4">
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="form-group label-floating">
										<label>Placa</label>
										<input v-model="Direccion" type="text" name="dni-reg"  class="form-control" required=""  maxlength="100"></input>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<p class="text-center" style="margin-top: 20px;">
						<button v-on:click="Modificar" type="submit" class="btn botones"><i class="zmdi zmdi-floppy ico"></i> Guardar</button>
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
<script type="module" src="jsaxios/transporte/Ope_empleModi.js"></script>