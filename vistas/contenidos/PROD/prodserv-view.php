<div class="container-fluid">
			<div class="page-header">
			<div class="text-t full-box text-uppercase">CATALOGO DE PRODUCTOS/SERVICIOS</div>
			</div>
		</div>

		
		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>

			  		<a href="<?php echo serverurl; ?>prodserv" class="btn botones" >
			  			<i class="zmdi zmdi-plus"></i> &nbsp;NUEVO
			  		</a>
			  	</li>
			  	<li>
			  		<a href="<?php echo serverurl; ?>prodservlist" class="btn botones" >
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp;LISTA
			  		</a>
			  	</li>
			</ul>
		</div>
		
		<!-- Panel nuevo cliente -->
		<div id="AppProd">
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PRODUCTO/SERVICIO</h3>
				</div>
				<div class="panel-body">
					<form class="form-registro" id="form-input" enctype="multipart/form-data" >
				    	<fieldset>
				    		<div class="container-fluid">
				    			<div class="row">
								<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
											<select id="combo" name="categoria" class="col-xs-12 col-ms-6">
											  <option value="0">Elija Categoria</option>
											  <option value="cate.vchIdcategoria" v-for="cate in ListaCate" v-bind:value="cate.vchIdcategoria">{{cate.vchNombre}}</option>;
											</select>
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nombre *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="ProdServ[0]" class="form-control" type="text" name="nombre"  maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Precio *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="ProdServ[1]"  class="form-control" type="text" name="precio" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Descripcion</label>
										  	<input pattern="[0-9+]{1,15}" class="form-control" v-model="ProdServ[2]"  type="text" name="descripcion" maxlength="15">
										</div>
				    				</div>
				    				<div class="col-xs-12">
										<input type="file"  v-model="ProdServ[3]"  name="foto" id="foto">
									</div>
				    				</div>
				    			</div>
				    		</div>
				    	</fieldset>
				    	<br>
							<p class="text-center" style="margin-top: 20px;">
					    	<button v-on:click="agregarTarea" class="btn botones"><i class="zmdi zmdi-floppy"></i> Guardar</button>
					    </p>
				    </form>
				</div>
			</div>
		</div>
		</div>
<script src="jsaxios/axios.js"></script>
<script src="jsaxios/vue.js"></script>
<script src="jsaxios/prodserv/Ope_vueProd.js"></script>
