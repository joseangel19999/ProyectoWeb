<div class="container-fluid">
		<div class="page-header">
			<div class="text-t full-box text-uppercase">CATALOGO DE MOTO-TAXISTA</div>
			</div>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>

			  		<a href="<?php echo serverurl; ?>taxista" class="btn botones" >
			  			<i class="zmdi zmdi-plus ico"></i> &nbsp;NUEVO
			  		</a>
			  	</li>
			  	<li>
			  		<a href="<?php echo serverurl; ?>taxistalist" class="btn botones" >
			  			<i class="zmdi zmdi-format-list-bulleted ico"></i> &nbsp;LISTA
			  		</a>
			  	</li>
			</ul>
		</div>
		
		<!-- Panel listado de clientes -->
		<div class="container-fluid" id="AppProd">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted ico"></i> &nbsp; LISTA DE MOTO-TAXISTAS</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover text-center">
							<thead>
								<tr>
									<th class="text-center">NOMBRE</th>
									<th class="text-center">APELLIDOS</th>
									<th class="text-center">TELEFONO</th>
									<th class="text-center">DIRECCION</th>
									<th class="text-center">NOM. MOTO-TAXI</th>
									<th class="text-center">ACTIVAR/DESACTIVAR</th>
									<th class="text-center">A. DATOS</th>
									<th class="text-center">ELIMINAR</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(taxista,index) in ListaTaxista">
									<td>{{taxista.vchNombreP}}</td>
									<td>{{taxista.vchApellidosP}}</td>
									<td>{{taxista.vchTelefono}}</td>
									<td>{{taxista.vchDireccion}}</td>
									<td>{{taxista.vchNombre}}</td>
									<td>
											<button  v-on:click="llamarActivar(taxista.iniIdClave)"  class="btn btn-success btn-raised btn-xs">
												<span v-if="taxista.chActivo==1"  >Activado</span>
												<span v-else>Desactivado</span>
												<i class="zmdi zmdi-delete ico"></i>
											</button>
									</td>
									
									<td>
										<button v-on:click="Modi(index)"  class="btn btn-success btn-raised btn-xs">
											<i class="zmdi zmdi-refresh ico"></i>
										</button>
									</td>
									<td>
											<button  v-on:click="Eliminar(taxista.iniIdClave)"    class="btn btn-danger btn-raised btn-xs">
												<i class="zmdi zmdi-delete ico"></i>
											</button>
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
<script src="jsaxios/taxista/Ope_listProd.js"></script>