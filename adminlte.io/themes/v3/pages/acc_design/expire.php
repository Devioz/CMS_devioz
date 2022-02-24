
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

	<section class="full-width pageContent">
		<section class="full-width header-well">
		

											
			<div class="full-width header-well-text" style="margin-left: 10px;margin-top: 11px;margin-right: 10px; ">
				<p class="text-condensedLight" ">
					<strong>
					¡Nunca pares!	<br><br>
					“Esfuerzo continuo, no fuerza o inteligencia, es la clave para liberar nuestro potencial”</strong>
				</p>
			</div>
			<li class="btn-exit" id="btn-exit">
						<i class="zmdi zmdi-power"></i>
						<div class="mdl-tooltip" for="btn-exit">Salir</div>
					</li>

</section>



</body>
</html>
