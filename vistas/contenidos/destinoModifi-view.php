<script src="<?php echo serverurl; ?>vistas/js/notify.js"></script>
<div class="container-fluid">
	<div class="page-header">
		<div class="text-t full-box text-uppercase">CATALOGO DESTINOS DE PAQUETERIA</div>
	</div>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>

			<a href="<?php echo serverurl; ?>destino" class="btn botones">
				<i class="zmdi zmdi-plus ico"></i> &nbsp;NUEVO
			</a>
		</li>
		<li>
			<a href="<?php echo serverurl; ?>destinolist" class="btn botones">
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
				<h3 class="panel-title"><i class="zmdi zmdi-plus ico"></i> &nbsp;MODIFICAR DESTINO DE PAQUETERIA</h3>
			</div>
			<div class="panel-body">
				<form action="<?php echo serverurl; ?>ajax/administradorAja.php" id="form-input" method="POST" data-form="" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
					<fieldset>
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12 col-sm-4">
									<div class="form-group label-floating">
										<label>DNI</label>
										<input pattern="[0-9-]{1,30}" v-model="Id" class="form-control" type="text" name="Id" required="" maxlength="30">
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="form-group label-floating">
										<label>Nombre</label>
										<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" v-model="NombreP" class="form-control" type="text" name="Nombre" required="" maxlength="30">
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
								</div>
								<div class="col-xs-12 col-sm-4">
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="form-group label-floating">
										<label>Salario</label>
										<input v-model="SalarioP" type="text" name="Salario"  class="form-control" required=""  maxlength="100"></input>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="form-group label-floating">
										<label>Descripcion</label>
										<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" v-model="DescripcionP" class="form-control" type="text" name="Descripcion" maxlength="50">
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
<script type="module" src="jsaxios/destino/Ope_empleModi.js"></script>