<div class="container-fluid">
		<div class="page-header">
			<div class="text-t full-box text-uppercase">CATALOGO TIPO DE PAQUETE</div>
			</div>
		</div>
		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>

			  		<a href="<?php echo serverurl; ?>tipoPaquete" class="btn botones" >
			  			<i class="zmdi zmdi-plus ico"></i> &nbsp;NUEVO
			  		</a>
			  	</li>
			  	<li>
			  		<a href="<?php echo serverurl; ?>tipoPaquetelist" class="btn botones" >
			  			<i class="zmdi zmdi-format-list-bulleted ico"></i> &nbsp;LISTA
			  		</a>
			  	</li>
			</ul>
		</div>
		<!-- Panel listado de clientes -->
		<div class="container-fluid" id="AppProd">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted ico"></i> &nbsp; LISTA TIPO DE PAQUETES</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover text-center">
							<thead>
								<tr>
									<th class="text-center">TIPO PAQUETE</th>
									<th class="text-center">PRECIO</th>
									<th class="text-center">DESCRIPCION</th>
									<th class="text-center">A. DATOS</th>
									<th class="text-center">ELIMINAR</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(tipo,index) in TipoPaqueteLista">
									<td>{{tipo.vchNombreTipoP}}</td>
									<td>$: {{tipo.fltPrecio}}.00</td>
									<td>{{tipo.vchDescripcion}}</td>
									<td>
										<button v-on:click="Modi(index)"   class="btn btn-success btn-raised btn-xs">
											<i class="zmdi zmdi-refresh ico"></i>
										</button>
									</td>
									<td>
											<button  v-on:click="Eliminar(tipo.chClaveTipoP)"    class="btn btn-danger btn-raised btn-xs">
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
<script src="jsaxios/tipopaquete/Ope_listEmple.js"></script>