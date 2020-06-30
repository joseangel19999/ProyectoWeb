<script src="<?php  echo serverurl; ?>vistas/js/notify.js"></script>
<div class="container-fluid">
			<div class="page-header">
			<div class="text-t full-box text-uppercase">CATALOGO DE SOCIOS</div>
			</div>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  		<a href="<?php echo serverurl; ?>socios" class="btn botones" >
			  			<i class="zmdi zmdi-plus ico"></i> &nbsp;NUEVO
			  		</a>
			  	</li>
			  	<li>
			  		<a href="<?php echo serverurl; ?>sociolist" class="btn botones" >
			  			<i class="zmdi zmdi-format-list-bulleted ico"></i> &nbsp;LISTA
			  		</a>
			  	</li>
			</ul>
		</div>
		
		<!-- Panel listado de clientes -->
<div id="app2" >
		<div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted ico"></i> &nbsp;LISTADO DE SOCIOS</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="tblsocio" class="table table-hover text-center">
							<thead>
								<tr>
									<th class="text-center">DNI</th>
									<th class="text-center">NOMBRE</th>
									<th class="text-center">APE. PATERNO</th>
									<th class="text-center">APE. MATERNO</th>
									<th class="text-center">TELÉFONO</th>
									<th class="text-center">ACT. DATOS</th>
									<th class="text-center">ELIMINAR</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(Empleado,index) in EmpleadoLista">
								<td >{{Empleado.vchCurp}}</td>
								<td >{{Empleado.vchNombre}}</td>
								<td >{{Empleado.vchApePa}}</td>
								<td >{{Empleado.vchApeMa}}</td>
								<td >{{Empleado.vchTelefono}}</td>
									<td>
										<a  v-on:click="Modi(index)" class="btn btn-success btn-raised btn-xs">
											<i class="zmdi zmdi-refresh ico"></i>
										</a>
									</td>
									<td>
										<form>
										
											<button  v-on:click="Eliminar(Empleado.vchCurp)"  class="btn btn-danger btn-raised btn-xs">
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
<script type="module" src="jsaxios/cliente/Ope_listClie.js"></script>
</div>
</div>
</div>