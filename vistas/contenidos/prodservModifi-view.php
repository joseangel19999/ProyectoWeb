<script src="<?php  echo serverurl; ?>vistas/js/notify.js"></script>
<div class="container-fluid">
			<div class="page-header">
			<div class="text-t full-box text-uppercase">CATALOGO DE PRODUCTOS/SERVICIOS</div>
			</div>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
				<li>
			  		<a href="<?php  echo serverurl; ?>prodserv" class="btn botones" >
			  			<i class="zmdi zmdi-plus ico"></i> &nbsp;NUEVO
			  		</a>
			  	</li>
			  	<li>
			  		<a href="#" class="btn botones">
			  			<i class="zmdi zmdi-plus ico"></i> &nbsp;MODIFICAR
			  		</a>
			  	</li>
			  	<li>
			  		<a href="<?php  echo serverurl; ?>prodservlist" class="btn botones" >
			  			<i class="zmdi zmdi-format-list-bulleted ico"></i> &nbsp;LISTA
			  		</a>
			  	</li>
			</ul>
		</div>

		<!-- Panel nuevo cliente -->
<div id="AppModifi">
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; MODIFICAR PRODUCTO/SERVICIO</h3>
				</div>
				<div class="panel-body">
					<form   class="form-registro" id="form-input" enctype="multipart/form-data">
				    	<fieldset>
				    		<div class="container-fluid">
				    			<div class="row">
								<div class="col-xs-12 col-sm-6">
										<div class="label-floating">
											<br>
											<label>Categoria</label>
											<select id="combo" name="categoria"  class="col-xs-12 col-ms-6">
											 <option v-bind:value="cate">{{NomPuesto}}</option>
											  <option value="cate.vchIdcategoria" v-for="cate in ListaCate" v-bind:value="cate.vchIdcategoria">{{cate.vchNombre}}</option>
											</select>
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label >Nombre *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" v-model="Nombre_P" class="form-control" type="text"  name="nombre"  required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label >Precio *</label>
										  	<input pattern="[0-9+]{1,15}" v-model="Precio_P" class="form-control" type="text" name="precio" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label >Descripcion</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" id="desc"  v-model="Desc_P"  class="form-control" type="text" name="descripcion" maxlength="15">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6 contebtn">
												<p>Buscar Imagen</p>
			  									<input type="file"  class="btnfile" v-model="Imagen_P"  id="foto"  name="foto" style="color: transparent"/>
										</div>
				    				</div>
				    			</div>
				    		</div>
				    	</fieldset>
				    	<br>
					    <p class="text-center" style="margin-top: 20px;">
					    	<button v-on:click="Modificar" class="btn botones"><i class="zmdi zmdi-floppy ico"></i> Guardar</button>
					    </p>
				    </form>
				</div>
			</div>
		</div>
</div>
<script src="jsaxios/axios.js"></script>
<script src="jsaxios/vue.js"></script>
<script type="module" src="jsaxios/prodserv/Ope_ModiProd.js"></script>