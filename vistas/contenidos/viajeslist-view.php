<div class="container-fluid">
		<div class="page-header">
			<div class="text-t full-box text-uppercase">HISTORIAL DE VIAJES</div>
			</div>
		</div>
		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  	</li>
			</ul>
		</div>
		<!-- Panel listado de clientes -->
		<div class="container-fluid" id="AppProd">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted ico"></i> &nbsp; LISTA DE VIAJES</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover text-center">
							<thead>
								<tr>
									<th class="text-center">NOMBRE</th>
									<th class="text-center">APELLIDOS</th>
									<th class="text-center">TELEFONO</th>
									<th class="text-center">FECHA</th>
									<th class="text-center">TOTAL</th>
									<th class="text-center">ORIGEN</th>
									<th class="text-center">DESTINO</th>
									<th class="text-center">NOM. MOTOTAXI</th>
									<th class="text-center">LICENCIA</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(viaje,index) in ListaViajes">
									<td>{{viaje.vchNombreP}}</td>
									<td>{{viaje.vchApellidosP}}</td>
									<td>{{viaje.vchTelefono}}</td>
									<td>{{viaje.dtFechaV}}</td>
									<td>${{viaje.fltTotalV }}</td>
									<td>{{viaje.vchOrigenV}}</td>
									<td>{{viaje.vchDestinoV}}</td>
									<td>{{viaje.vchNombre}}</td>
									<td>{{viaje.vchPlaca}}</td>
								</tr>
							</tbody>
						</table>
					</div>
					<nav class="text-center">
						<ul class="pagination pagination-sm">
							<li class="disabled"><a href="javascript:void(0)">«</a></li>
							<li class="active"><a href="javascript:void(0)">1</a></li>
							<li><a href="javascript:void(0)">2</a></li>
							<li><a href="javascript:void(0)">3</a></li>
							<li><a href="javascript:void(0)">4</a></li>
							<li><a href="javascript:void(0)">5</a></li>
							<li><a href="javascript:void(0)">»</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
</div>
<script src="jsaxios/axios.js"></script>
<script src="jsaxios/vue.js"></script>
<script src="jsaxios/viajes/Ope_listEmple.js"></script>