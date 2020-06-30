<script src="<?php echo serverurl; ?>vistas/js/notify.js"></script>
<div class="container-fluid">
	<div class="page-header">
		<div class="text-t full-box text-uppercase">CATALOGO DE AREA DE TRABAJO</div>
	</div>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>

			<a href="<?php echo serverurl; ?>area" class="btn botones">
				<i class="zmdi zmdi-plus ico"></i> &nbsp;NUEVO
			</a>
		</li>
		<li>
			<a href="<?php echo serverurl; ?>arealist" class="btn botones">
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
				<h3 class="panel-title"><i class="zmdi zmdi-plus ico"></i> &nbsp;MODIFICAR DATOS AREA DE TRABAJO</h3>
			</div>
			<div class="panel-body">
				<form action="<?php echo serverurl; ?>ajax/administradorAja.php" id="form-input" method="POST" data-form="" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
					<fieldset>
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12 col-sm-4">
									<div class="form-group label-floating">
										<label>DNI</label>
										<input pattern="[0-9-]{1,30}" v-model="Id" class="form-control" type="text" name="Id" maxlength="30">
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="form-group label-floating">
										<label>Nombre</label>
										<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,30}" v-model="NombreArea" class="form-control" type="text" name="Nombre" maxlength="30">
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
								</div>
								<div class="col-xs-12 col-sm-4">
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="form-group label-floating">
										<label>Descripcion</label>
										<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,50}" v-model="Descripcion" class="form-control" type="text" name="Descripcion" maxlength="50">
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
<script type="module" src="jsaxios/area_trabajo/Ope_areaModi.js"></script>