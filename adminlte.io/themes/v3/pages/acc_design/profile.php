
<?php
session_start();
include '../connection/server.php';   
?>



<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Planeamiento y Control</title>

<!-- Link de Imagenes -->

	<link rel="icon" type="image/png" href="/tools/img/icono-logo.png" />

<!-- Link de Estilos -->

	<link rel="stylesheet" href="/lib/css/normalize.css">
	<link rel="stylesheet" href="/lib/css/sweetalert2.css">
	<link rel="stylesheet" href="/lib/css/material.min.css">
	<link rel="stylesheet" href="/lib/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="/lib/css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="/lib/css/main.css">

<!-- Link de JavaScript -->

	<script>window.jQuery || document.write('<script src="/lib/js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="/lib/js/material.min.js" ></script>
	<script src="/lib/js/sweetalert2.min.js" ></script>
	<script src="/lib/js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="/lib/js/main.js" ></script>

</head>
<body>
	
	<!-- Barra de Informacion -->
	<div class="full-width navBar">
		<div class="full-width navBar-options">
			<i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>	
			<div class="mdl-tooltip" for="btn-menu">Menu</div>
			<nav class="navBar-options-list">
				<ul class="list-unstyle">

					<li class="text-condensedLight noLink" ><small>Bienvenido : <?php echo $_SESSION['Nombres']." ".$_SESSION['Apaterno']." ".$_SESSION['Amaterno'];  ?></small></li>
					<li class="text-condensedLight noLink" ><small>Función : <?php echo $_SESSION['Funcion'];  ?></small></li>

					<li class="btn-Notification" id="notifications">
					<a  href="/design/profile.php" style='text-decoration:none;color:white;' " > 	<i class="zmdi zmdi-face"></i></a>
						<!-- <i class="zmdi zmdi-notifications-active btn-Notification" id="notifications"></i> -->
						<div class="mdl-tooltip" for="notifications">Perfil</div>
					</li>
					

					<li class="btn-exit" id="btn-exit">
						<i class="zmdi zmdi-power"></i>
						<div class="mdl-tooltip" for="btn-exit">Salir</div>
					</li>

					<li class="noLink">
						<figure>
							<img src="/tools/img/logoesquina.png" alt="Avatar" class="img-responsive">
						</figure>

					</li>
				</ul>
			</nav>
		</div>
	</div>
		<!-- #Barra de Informacion -->
	<!-- navLateral -->
	<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>

		<!-- <div class="full-width navLateral-body btn-hola" id="btn-exit"">-->
		<div class="full-width navLateral-body " id="btn-exit"">
			<div class="full-width navLateral-body-logo text-center tittles a ">
				Planeamiento y Control
			</div>
			<figure class="full-width" style="height: 77px;">
				<div class="navLateral-body-cl">
					<img src="/tools/img/ima.jpg" alt="Avatar" style="width: 270px; height: 70px;" class="img-responsive">  
				</div>
				
			</figure>
			
			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
					<li class="full-width">
						<a href="#"  class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-view-dashboard c"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet b" >
								<strong>JEFATURAS</strong>

							</div>
						</a>
					</li>
					
					<!-- MENU -->
					<?php 
					$menu_inicio ="-1";
					foreach ($_SESSION["menu"] as $key) {

						
						if($key["id"]!=$menu_inicio)
							{
						?>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="<?php echo $key["url"]."?pag=".$key["id"];  ?>"  data-toggle="tooltip" title="<?php echo $key["frase"];?>" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="<?php echo $key["icono"];?>"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								<strong><?php echo $key["nombre"];  ?></strong>
							</div>
						</a>
						
					</li>
					<?php 	
					$menu_inicio=$key["id"];
					}

					} ?>
		
				</ul>
			</nav>
		</div>
	</section>

	<?php 

						$query = " 

						BEGIN DISTRIBUTED TRANSACTION 	

						SELECT * FROM [dbo].[VISTA_DATOS_PERSONAL]  
						WHERE Documento = '$_SESSION[Documento]'

						COMMIT TRANSACTION 

							   ";	

					 	$resultado=sqlsrv_query($conn, $query);

						while($row=sqlsrv_fetch_array($resultado)){ 
										/*Instruccion*/	
										    /*vrbPhp*/	/*columnaSql*/		

									$_dato["Tipo de Documento"]=$row["Tipo de Documento"];
									$_dato["Documento"]=$row["Documento"];
									$_dato["Apellido Paterno"]=$row["Apellido Paterno"];
									$_dato["Apellido Materno"]=$row["Apellido Materno"];
									$_dato["Nombres"]=$row["Nombres"];
									$_dato["Cargo"]=$row["Cargo"];
									$_dato["Funcion"]=$row["Funcion"];
									$_dato["Centro de Costo"]=$row["Centro de Costo"];
									$_dato["Nombre del Programa"]=$row["Nombre del Programa"];
									$_dato["Sede"]=$row["Sede"];
									$_dato["Tipo de Empleado"]=$row["Tipo de Empleado"];
									$_dato["Estado Laboral"]=$row["Estado Laboral"];
									$_dato["Estado Presencial"]=$row["Estado Presencial"];
									$_dato["Usuario"]=$row["Usuario"];
									$_dato["Contraseña"]=$row["Contraseña"];
									$_dato["Tipo de Documento"]=$row["Tipo de Documento"];
									$_dato["Documento"]=$row["Documento"];
									$_dato["Apellido Paterno"]=$row["Apellido Paterno"];
									$_dato["Apellido Materno"]=$row["Apellido Materno"];
									$_dato["Nombres"]=$row["Nombres"];
									$_dato["Sexo"]=$row["Sexo"];
									$_dato["Fecha_de_Nacimiento"]=$row["Fecha_de_Nacimiento"];
									$_dato["Pais de Nacimiento"]=$row["Pais de Nacimiento"];
									$_dato["Direccion"]=$row["Direccion"];
									$_dato["Referencia"]=$row["Referencia"];
									$_dato["Distrito"]=$row["Distrito"];
									$_dato["Provincia"]=$row["Provincia"];
									$_dato["Departamento"]=$row["Departamento"];
									$_dato["Telefono Fijo"]=$row["Telefono Fijo"];
									$_dato["Telefono Movil 1"]=$row["Telefono Movil 1"];
									$_dato["Teléfono Movil 2"]=$row["Teléfono Movil 2"];
									$_dato["Correo Electronico"]=$row["Correo Electronico"];
									$_dato["Grado de Instrucción"]=$row["Grado de Instrucción"];
									$_dato["Regimen de la Institucion Educativa"]=$row["Regimen de la Institucion Educativa"];
									$_dato["Tipo de Institucion Educativa"]=$row["Tipo de Institucion Educativa"];
									$_dato["Nombre de la Institucion Educativa"]=$row["Nombre de la Institucion Educativa"];
									$_dato["Nombre de la Carrera"]=$row["Nombre de la Carrera"];
									$_dato["Fecha de Ingreso a la Empresa"]=$row["Fecha de Ingreso a la Empresa"];
									$_dato["Condicion Laboral"]=$row["Condicion Laboral"];
									$_dato["Cargo"]=$row["Cargo"];
									$_dato["Funcion"]=$row["Funcion"];
									$_dato["Sede"]=$row["Sede"];
									$_dato["Centro de Costo"]=$row["Centro de Costo"];
									$_dato["Nombre del Programa"]=$row["Nombre del Programa"];
									$_dato["Apellidos y Nombres Jefe Directo"]=$row["Apellidos y Nombres Jefe Directo"];
									$_dato["Estado Laboral"]=$row["Estado Laboral"];
									$_dato["Estado Presencial"]=$row["Estado Presencial"];

								
								}





								$query2 = " 

						SELECT B.* FROM [dbo].[VISTA_DATOS_PERSONAL] A
						INNER JOIN [dbo].[z_AVATAR] B
						ON A.Sexo = B.Sexo
						AND A.Funcion = B.Funcion
						WHERE A.Documento = '$_SESSION[Documento]'			

							   ";	

					 	$resultado=sqlsrv_query($conn, $query2);

						while($row=sqlsrv_fetch_array($resultado)){ 
										/*Instruccion*/	
										    /*vrbPhp*/	/*columnaSql*/		

									$_dato2["Funcion"]=$row["Funcion"];
									$_dato2["Sexo"]=$row["Sexo"];
									$_dato2["url"]=$row["url"];

									
								}	




?>




	<!-- Pagina de Contenido -->
	<!-- pageContent -->
	<section class="full-width pageContent">
		<section class="full-width header-well">
			
					<div style= " width: 250px; height: 130px;padding-top: 20px;margin-left: 10px;margin-top: 10px;">
						<div><center><img src=" <?php echo $_dato2["url"];?> " alt="avatar" style="height: 100px; width: 100px;"></center></div>
						<span><center><?php echo $_SESSION['Funcion'];  ?></center></span>
					</div>
					<a href="assistance/test/1.-MiAsistencia.php"><button style="margin-left: 90px" type="button" class="btn btn-default">Mi Asistencia</button></a>					
											
			<div class="full-width header-well-text" style="margin-left: 10px;margin-top: 11px;margin-right: 10px; ">
				<p class="text-condensedLight" ">
					<strong>
					¡Nunca pares!	<br><br>
					“Esfuerzo continuo, no fuerza o inteligencia, es la clave para liberar nuestro potencial”</strong>
				</p>
			</div>





		
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewAdmin" class="mdl-tabs__tab is-active">Informacion Personal</a>
				<a href="#tab2" class="mdl-tabs__tab">Informacion Laboral</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
							<!--	Informacion -->
							</div>
							<div class="full-width panel-content">
								<form>
									<div class="mdl-grid">


										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											<h5 class="text-condensedLight">  <center> <b> &nbsp; </b> </center> </h5>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i> -->
													<span>Tipo de Documento</span>
													<span class="mdl-list__item-sub-title" ><?php echo $_dato["Tipo de Documento"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content"> 
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i> -->
													<span>Documento</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Documento"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
											

											
										</div>


										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											<h5 class="text-condensedLight">  <center> <b> Identifiación Personal </b> </center> </h5>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i> -->
													<span>Apellido Paterno</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Apellido Paterno"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i> -->
													<span>Apellido Materno</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Apellido Materno"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
											
																						
										</div>



										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											
											<h5 class="text-condensedLight">  <center> <b> &nbsp; </b> </center> </h5>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i> -->	
													<span>Nombres</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Nombres"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
												
											
										</div>
									</div>






									<div class="mdl-grid">


										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											<h5 class="text-condensedLight">  <center> <b> &nbsp;</b> </center> </h5>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i>-->
													<span>Sexo</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Sexo"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
										</div>


										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											<h5 class="text-condensedLight">  <center> <b> Datos de Nacimiento </b> </center> </h5>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i>-->
													<span>Fecha de Nacimiento</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Fecha_de_Nacimiento"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											
											<h5 class="text-condensedLight">  <center> <b> &nbsp; </b> </center> </h5>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i>-->
													<span>País de Nacimiento</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Pais de Nacimiento"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
										</div>
									</div>







									<h5 class="text-condensedLight">  <center> <b> Datos de Residencia </b> </center> </h5>
									<div class="mdl-grid">

										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">											
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i>-->
													<span>Departamento</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Departamento"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i>-->
													<span>Provincia</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Provincia"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>

											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i>-->
													<span>Distrito</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Distrito"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>

										</div>


										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop">
											
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i>-->
													<span>Dirección</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Direccion"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#"><i class="zmdi zmdi-more"></i></a>
											</div>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i>-->
													<span>Referencia</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Referencia"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
																																
										</div>

									</div>



									<h5 class="text-condensedLight">  <center> <b> Grado de Instrucción </b> </center> </h5>
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">											
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i> -->
													<span>Régimen de la Institución Educativa</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Regimen de la Institucion Educativa"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i> -->
													<span>Tipo de Institución Educativa</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Tipo de Institucion Educativa"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>																						
										</div>


										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop">
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i>-->
													<span>Nombre de la Institución Educativa</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Nombre de la Institucion Educativa"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i>-->
													<span>Nombre de la Carrera</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Nombre de la Carrera"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
																																
										</div>

									</div>


									<div class="mdl-grid">


										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											<h5 class="text-condensedLight">  <center> <b> &nbsp; </b> </center> </h5>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i>-->
													<span>Teléfono Fijo</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Telefono Fijo"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i>-->
													<span>Correo Electrónico</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Correo Electronico"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>	
																						
										</div>


										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											<h5 class="text-condensedLight">  <center> <b> Datos de Contacto </b> </center> </h5>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i>-->
													<span>Teléfono Móvil 1</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Telefono Movil 1"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
																						
																						
										</div>



										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											
											<h5 class="text-condensedLight">  <center> <b> &nbsp; </b> </center> </h5>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i>-->
													<span>Teléfono Móvil 2</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Telefono Movil 2"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
												
											
										</div>
									</div>





									
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mdl-tabs__panel" id="tab2">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								<!--Informacion -->
							</div>
							<div class="full-width panel-content">
								<form>
									<div class="mdl-grid">


										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											<h5 class="text-condensedLight">  <center> <b> &nbsp; </b> </center> </h5>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i> -->
													<span>Fecha de Ingreso a la Empresa</span>
													<span class="mdl-list__item-sub-title" ><?php echo $_dato["Fecha de Ingreso a la Empresa"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
																		
											
										</div>


										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											<h5 class="text-condensedLight">  <center> <b> &nbsp; </b> </center> </h5>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i> -->
													<span>Nombre del Programa</span>
													<span class="mdl-list__item-sub-title" ><?php echo $_dato["Nombre del Programa"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
			
											
										</div>



										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											
											<h5 class="text-condensedLight">  <center> <b> &nbsp; </b> </center> </h5>
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i> -->
													<span>Centro de Costo</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Centro de Costo"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
										
											
										</div>



									</div>



									<div class="mdl-grid">


										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i> -->
													<span>Cargo</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Cargo"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
																												
										</div>


										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i> -->
													<span>Función</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Funcion"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
																	
										</div>


										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i> -->
													<span>Apellidos y Nombres Jefe Directo</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Apellidos y Nombres Jefe Directo"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
																									
										</div>

										
										
									</div>	


									<div class="mdl-grid">


										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i> -->
													<span>Sede</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Sede"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
																														
										</div>



										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											
										
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i> -->
													<span>Condición Laboral</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Condicion Laboral"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
						
											
										</div>



										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
											
										
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i> -->
													<span>Estado Laboral</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Estado Laboral"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
						
											
										</div>

										
										
									</div>


									



									<div class="mdl-grid">


										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
																					
											<div class="mdl-list__item mdl-list__item--two-line">
												<span class="mdl-list__item-primary-content">
												<!--	<i class="zmdi zmdi-male mdl-list__item-avatar"></i> -->
													<span>Estado Presencial</span>
													<span class="mdl-list__item-sub-title"><?php echo $_dato["Estado Presencial"]; ?></span>
												</span>
												<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
											</div>
						
											
										</div>

									</div>	

									<br>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</body>
</html>
