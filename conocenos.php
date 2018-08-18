<?php
header('content-type: text/html; charset = utf-8');
include ('php/conexion.php');
if ($conexion->set_charset('UTF8') === false) {
	die ('Error: '. $conexion->error);
}
?>
<!DOCTYPE html>
<html>
<head lang="es">
	<meta charset="utf-8">
	<title>i CO-CO</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/miestilo.css">
	<link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
</head>
<body>
	<header>
		<!--      MENU       -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand letra" href="index.php">i CO-CO</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link color-letra" href="index.php">Inicio</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Productos
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item color-menu1" href="productos.php">Pañales</a>
		          <a class="dropdown-item color-menu2" href="productos.php#panitos">Pañitos</a>
		          <a class="dropdown-item color-menu3" href="productos.php#cremitas">Cremas</a>
		        </div>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Usados
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item color-menu2" href="usados.php">Ropa</a>
		          <a class="dropdown-item color-menu1" href="usados.php#coches">Coches</a>
		          <a class="dropdown-item color-menu2" href="usados.php#cunas">Cunas</a>
		          <a class="dropdown-item color-menu3" href="usados.php#juguetes">Juguetes</a>
		        </div>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Nosotros
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item color-menu1" href="conocenos.php">Conocenos</a>
		          <a class="dropdown-item color-menu2" href="conocenos.php#contacto">Contáctanos</a>
		        </div>
		      </li>
		    </ul>
		  </div>
		</nav>
		<!--     /MENU       -->
	</header>
	<section class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center" id="conoce"> NUESTRA MISIÓN</h2>
				<p class="text-justify p">
				Nuestra Misión es acompañar a los nuevos padres y madres en esta corta pero aventurera etapa de sus vidas. Dando asesoría, a través de sus dispositivos móviles, desde la gestación de su bebé hasta el primer año, ofreciendo productos de alta calidad que ayudan al desarrollo del bebé. Y entregando de manera adecuada y oportuna cada uno de estos.
				</p>
				<hr>
				<h2 class="text-center">NUESTRA VISIÓN</h2>
				<p class="text-justify p">
				Nuestra visión es que en el año 2023 ser reconocidos por nuestro modelo de atención al cliente, gracias el aporte e impacto generado en la vida de los futuros padres y madres a través de nuestras asesorías,  Y lograr extender nuestros servicios a otras zonas del país.
				</p>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-7">
				<h2 id="contacto">Contactanos</h2>
				<p>si tienes dudas o inquietudes llamanos al 3006324836 o escribenos:</p>
			</div>
			<div class="col-sm-12 col-md-5">
				<form action="php/agregar_mensaje.php" method="POST">
					<div class="form-group">
						<label for="nombres">Nombres:</label>
						<input class="form-control" type="text" name="nombres" id="nombres" onblur="validarTexto(this)" onkeyup="validarTexto(this)">
					</div>
					<div class="form-group">
						<label for="correo">Correo:</label>
						<input class="form-control" type="email" name="correo" id="correo" onblur="validarCorreo(this)" onkeyup="validarCorreo(this)">
					</div>
					<div class="form-group">
					<label for="mensaje">Deja tu mensaje:</label>
					<textarea rows="8" class="form-control" type="text" name="mensaje" id="mensaje" onblur="validarCorreo(this)"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-info"> Enviar</button>
						<button type="reset" class="btn btn-warning">Limpiar</button>
					</div>
				</form>
			</div>
		</div>
	</section>

	<footer>
		<div class="container text-center">
			<h5>i CO-CO</h5>
			<p>Ésta es una empresa hecha por mujeres colombianas.</p>
		</div>
	</footer>

	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/nuestroscript.js"></script>
</body>
</html>