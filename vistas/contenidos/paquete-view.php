<script src="<?php echo serverurl; ?>vistas/js/notify.js"></script>
<div class="container-fluid">
	<div class="text-t full-box text-uppercase">CATALOGO DE PAQUETERIA</div>
</div>
<!-- Panel nuevo cliente -->

<div id="AppProd">
	<div class="container-fluid">
		<ul class="breadcrumb breadcrumb-tabs">
			<li>
				<p class="text-center" style="margin-top: 20px;">
					<button v-on:click="agregarTarea" class="btn botones">Nuevo Paquete</button>
				</p>
			</li>
			<li>
				<button class="btn botones" v-on:click="EnviaDatos" class="btn botones">Enviar</button>
			</li>
			<li>
				<a>
				<input  value="<?php echo $puesto=$_SESSION['usuario_smt']; ?>" id="IdUserEmp" type="hidden">
				</a>
			</li>
			<li>
				<a >
					<label>PRECIO TOTAL $: {{PrecioT}}</label>
				</a>
			</li>
		</ul>
	</div>
	<div class="container-fluid">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PAQUETE</h3>
			</div>
			<div class="panel-body">
				<form class="form-registro" id="form-input" enctype="multipart/form-data">
					<fieldset>
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div class="form-group label-floating">
										<label class="control-label">Telefono Remitente</label>
										<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="ListaPquete[0]" class="form-control" type="text" name="Apellidos" maxlength="70">
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="form-group label-floating">
										<label class="control-label">Nombre Destinatario</label>
										<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="ListaPquete[1]" class="form-control" type="text" name="Direccion" maxlength="50">
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="form-group label-floating">
										<label class="control-label">Telefono Destinatario</label>
										<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="ListaPquete[2]" class="form-control" type="text" name="Licencia" maxlength="50">
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="form-group">
										<input class="form-control" v-model="ListaPquete[3]" type="date" name="Fecha" maxlength="50">
										<label>Fecha</label>
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<br>
									<div class="label-floating">
										<label>Destino</label>
										<select id="comboDestino" name="CategoriaSocursal" class="col-xs-12 col-ms-6">
											<option value="0">-Seleccione-</option>
											<option value="cate.chClaveDestino" v-for="cate in ListaMotos" v-bind:value="cate.chClaveDestino">{{cate.vchNomDestino}}</option>;
										</select>
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<br>
									<div class="label-floating">
										<label>Tipo Paquete</label>
										<select @change="Verificar" id="comboTipoPaquete" name="CategoriaMotoTaxi" class="col-xs-12 col-ms-6">
											<option value="0">-Seleccione-</option>
											<option  value="paquete.chClaveTipoP" v-for="paquete in ListaTipoPaquete" v-bind:value="paquete.chClaveTipoP">{{paquete.vchNombreTipoP}}</option>;
										</select>
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="form-group label-floating" id="IdPeso">
										
									
									</div>
								</div>
							</div>
						</div>
			</div>
			</fieldset>
			</form>
		</div>
	</div>
	<!-- lista paquetes-->
	<div class="container-fluid">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted ico"></i> &nbsp; LISTADO DE PAQUETES</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover text-center">
						<thead>
							<tr>
								<th class="text-center">TELEFONO REMITENTE</th>
								<th class="text-center">NOMBRE DESTINATARIO</th>
								<th class="text-center">TELEFONO DETINATARIO</th>
								<th class="text-center">ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(paquete) in ProdServ">
								<td>{{paquete.TelefonoR}}</td>
								<td>{{paquete.NombreDest}}</td>
								<td>{{paquete.TelefonoDest}}</td>
								<td>
									<button v-on:click="Eliminar(paquete)" class="btn btn-danger btn-raised btn-xs">
										<i class="zmdi zmdi-delete ico"></i>
									</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- termina -->
</div>
</div>
<script src="jsaxios/axios.js"></script>
<script src="jsaxios/vue.js"></script>
<script type="module" src="jsaxios/paqueteria/Ope_vueProd.js"></script>