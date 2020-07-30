<script src="<?php echo serverurl; ?>vistas/js/notify.js"></script>
<div class="container-fluid">
	<div class="page-header">
		<div class="text-t full-box text-uppercase">CATALOGO DE MOTO-TAXISTAS</div>
	</div>
</div>


<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>

			<a href="<?php echo serverurl; ?>taxista" class="btn botones">
				<i class="zmdi zmdi-plus ico"></i> &nbsp;NUEVO
			</a>
		</li>
		<li>
			<a href="<?php echo serverurl; ?>taxistalist" class="btn botones">
				<i class="zmdi zmdi-format-list-bulleted ico"></i> &nbsp;LISTA
			</a>
		</li>
	</ul>
</div>

<!-- Panel nuevo cliente -->
<div id="AppProd">
	<div class="container-fluid">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO MOTO-TAXISTA</h3>
			</div>
			<div class="panel-body">
				<form class="form-registro" id="form-input" enctype="multipart/form-data">
					<fieldset>
						<div class="container-fluid">
							<div class="row">
							<div class="col-xs-12 col-sm-3">
									<div class="form-group">
										<label class="control-label">Nombre *</label>
										<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="ListaDatos[0].vchNombreP" class="form-control" type="text" name="Nombre" maxlength="30">
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="form-group ">
										<label class="control-label">Apellidos</label>
										<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}"  v-model="ListaDatos[0].vchApellidosP" class="form-control"  type="text" name="Apellidos" maxlength="70">
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="form-group ">
										<label class="control-label">Telefono *</label>
										<input pattern="[0-9+]{1,15}" v-model="ListaDatos[0].vchTelefono"class="form-control" type="text" name="Telefono" maxlength="10">
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="form-group ">
										<label class="control-label">Licencia de Manejo</label>
										<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="ListaDatos[0].vchLicencia" class="form-control" type="text" name="Direccion" maxlength="50">
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="form-group ">
										<label class="control-label">Direcccion</label>
										<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="ListaDatos[0].vchDireccion" class="form-control" type="text" name="Licencia" maxlength="50">
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="form-group ">
										<label class="control-label">Correo</label>
										<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="ListaDatos[0].vchCorreo" class="form-control"  type="text" name="Correo" maxlength="50">
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="form-group ">
										<label class="control-label">Contraseña</label>
										<input  class="form-control"  v-model="Password1" type="password" name="Password1" maxlength="50">
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="form-group ">
										<label class="control-label">Contraseña</label>
										<input  class="form-control" v-model="Password1" type="password" name="Password2" maxlength="50">
									</div>
								</div>
							</div>
						</div>
			</div>
			</fieldset>
			</form>
			<p class="text-center" style="margin-top: 20px;">
				<button v-on:click="modificarEmpleado" class="btn botones"><i class="zmdi zmdi-floppy ico"></i> Guardar</button>
			</p>
		</div>
	</div>
</div>
</div>
<script src="jsaxios/axios.js"></script>
<script src="jsaxios/vue.js"></script>
<script type="module" src="jsaxios/taxista/Ope_ModiProd.js"></script>