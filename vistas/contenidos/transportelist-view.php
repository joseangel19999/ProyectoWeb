
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
		
		<!-- Panel listado de administradores -->
<div id="AppLista" >
		<div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted ico"></i> &nbsp;LISTA DE SOCURSALES</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover text-center">
							<thead>
								<tr>
									<th class="text-center">ClAVE</th>
									<th class="text-center">MARCA</th>
									<th class="text-center">NOMBRE MOTO-TAXI</th>
									<th class="text-center">PLACA</th>
								</tr>
							</thead>
							<tbody>
							<tr v-for="(Empleado,index) in EmpleadoLista">
								<td >{{Empleado.intIdMotoTaxi}}</td>
								<td >{{Empleado.vchMarca}}</td>
								<td >{{Empleado.vchNombre}}</td>
								<td >{{Empleado.vchPlaca}}</td>
									<td>
										<a  v-on:click="Modi(index)" class="btn btn-success btn-raised btn-xs">
											<i class="zmdi zmdi-refresh ico"></i>
										</a>
									</td>
									<td>
										<form>
										
											<button  v-on:click="Eliminar(Empleado.intIdMotoTaxi)"  class="btn btn-danger btn-raised btn-xs">
												<i class="zmdi zmdi-delete ico"></i>
											</button>
										</form>
									</td>
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
<script type="module" src="jsaxios/transporte/Ope_listEmple.js"></script>	