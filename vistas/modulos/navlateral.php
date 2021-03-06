	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title ">
				Moto-Taxi<i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="<?php echo serverurl; ?>vistas/assets/avatars/TeacherMaleAvatar.png" alt="UserIcon">
					<figcaption class="text-center user.pet">User: Administrador</figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
					<li>
						<a href="<?php echo $loginCTR->ecryption($_SESSION['token_smt']);?>" title="Salir del sistema" class="btn-exit-system ico">
							<i class="zmdi zmdi-power ico"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-hc-fw user.pet"></i>Catalogo Administrativo<i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="<?php echo serverurl; ?>socursal" class="user.pet"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Sucursales</a>
						</li>
						<li>
							<a href="<?php echo serverurl; ?>prodserv" class="user.pet"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Empleados</a>
						</li>
						<li>
							<a href="<?php echo serverurl; ?>taxista" class="user.pet"><i class="zmdi zmdi-account zmdi-hc-fw"></i> MotoTaxistas</a>
						</li>
						<li>
							<a href="<?php echo serverurl; ?>cliente" class="user.pet"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Clientes</a>
						</li>
						<li>
							<a href="<?php echo serverurl; ?>viajeslist" class="user.pet"><i class="zmdi zmdi-account zmdi-hc-fw"></i>Historial de Viajes</a>
						</li>
						<li>
							<a href="<?php echo serverurl; ?>paquete" class="user.pet"><i class="zmdi zmdi-account zmdi-hc-fw"></i>Paqueteria</a>
						</li>
						<li>
							<a href="<?php echo serverurl; ?>AdminFechas" class="user.pet"><i class="zmdi zmdi-account zmdi-hc-fw"></i>Admin fechas</a>
						</li>
					</ul>
				</li>
			</ul>
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-hc-fw user.pet"></i>Catalogo Gerencial<i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="<?php echo serverurl; ?>transportes" class="user.pet"><i class="zmdi zmdi-account zmdi-hc-fw"></i>Transporte</a>
						</li>
						<li>
							<a href="<?php echo serverurl; ?>area" class="user.pet"><i class="zmdi zmdi-account zmdi-hc-fw"></i>Area de Trabajo</a>
						</li>
						<li>
							<a href="<?php echo serverurl; ?>puesto" class="user.pet"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i>Puestos</a>
						</li>
						<li>
							<a href="<?php echo serverurl; ?>destino" class="user.pet"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i>Destinos</a>
						</li>
						<li>
							<a href="<?php echo serverurl; ?>tipoPaquete" class="user.pet"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i>Tipo Paquetes</a>
						</li>
					</ul>
		</div>
	</section>