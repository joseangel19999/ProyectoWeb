<script src="<?php echo serverurl; ?>vistas/js/notify.js"></script>
<div class="container-fluid">
	<div class="page-header">
		<div class="text-t full-box text-uppercase">CATALOGO DE EMPLEADOS</div>
	</div>
</div>


<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>

			<a href="<?php echo serverurl; ?>prodserv" class="btn botones">
				<i class="zmdi zmdi-plus ico"></i> &nbsp;NUEVO
			</a>
		</li>
		<li>
			<a href="<?php echo serverurl; ?>prodservlist" class="btn botones">
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
				<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO EMPLEADO</h3>
			</div>
			<div class="panel-body">
				<form class="form-registro" id="form-input" enctype="multipart/form-data">
					<fieldset>
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div class="form-group label-floating">
										<label class="control-label">Nombre *</label>
										<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="ProdServ[0]" class="form-control" type="text" name="Nombre" maxlength="30">
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="form-group label-floating">
										<label class="control-label">Apellidos</label>
										<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control"  type="text" name="Apellidos" maxlength="70">
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="form-group label-floating">
										<label class="control-label">Telefono *</label>
										<input pattern="[0-9+]{1,15}" v-model="ProdServ[1]" class="form-control" type="text" name="Telefono" maxlength="10">
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="form-group label-floating">
										<label class="control-label">Direcccion</label>
										<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="Direccion" maxlength="50">
									</div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div class="form-group label-floating">
										<label class="control-label">Correo</label>
										<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control"  type="text" name="Correo" maxlength="50">
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="form-group label-floating">
										<label class="control-label">Contraseña Ingrese Caracteres especiales </label>
										<input  class="form-control" v-on:keyup="ValidaPass" v-model="Pass1" type="password" name="Password1" maxlength="50">
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="form-group label-floating">
										<label class="control-label">Contraseña</label>
										<input  class="form-control" v-model="Pass2" type="password" name="Password2" maxlength="50">
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<br>
									<div class="label-floating">
										<label>Puesto de Trabajo</label>
										<select id="combo" name="CategoriaPuesto" class="col-xs-12 col-ms-6">
											<option value="0">-Seleccione-</option>
											<option value="cate.vchIdcategoria" v-for="cate in ListaCate" v-bind:value="cate.chIdPuesto">{{cate.vchNomPuesto}}</option>;
										</select>
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<br>
									<div class="label-floating">
										<label>Area de Trabajo</label>
										<select id="comboArea" name="CategoriaArea" class="col-xs-12 col-ms-6">
											<option value="0">-Seleccione-</option>
											<option value="cate.chIdArea" v-for="cate in ListaArea" v-bind:value="cate.chIdArea">{{cate.vchNomArea}}</option>;
										</select>
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<br>
									<div class="label-floating">
										<label>Socursal</label>
										<select id="comboSocursal" name="CategoriaSocursal" class="col-xs-12 col-ms-6">
											<option value="0">-Seleccione-</option>
											<option value="cate.chIdSocursal" v-for="cate in ListaSocursal" v-bind:value="cate.chIdSocursal">{{cate.vchNombre}}</option>;
										</select>
									</div>
								</div>

							</div>
						</div>
			</div>
			</fieldset>
			</form>
			<p class="text-center" style="margin-top: 20px;">
				<button v-on:click="agregarTarea" class="btn botones"><i class="zmdi zmdi-floppy ico"></i> Guardar</button>
			</p>
		</div>
	</div>
</div>
</div>
<script src="jsaxios/axios.js"></script>
<script src="jsaxios/vue.js"></script>
<script type="module" src="jsaxios/prodserv/Ope_vueProd.js"></script>