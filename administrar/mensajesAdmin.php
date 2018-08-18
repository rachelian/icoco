<?php
header('content-type: text/html; charset = utf-8');
include ('../php/conexion.php');
if ($conexion->set_charset('UTF8') === false) {
	die ('Error: '. $conexion->error);
}
session_start();
if ($_SESSION['usuario'] == null || $_SESSION['usuario'] == '') {
	echo '
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Productos</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/estiloadmin.css">
</head>
<body>
	<div class="container" style="margin-top: 60px">
		<div class="alert alert-danger" role="alert">
		  <h4 class="alert-heading">Error!</h4>
		  <p>No se puede ingresar.</p>
		  <hr>
		  <p class="mb-0">Por favor de clic en el botón continuar <a href="../index.php" class="btn btn-danger">Continuar</a></p>
		</div>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/nuestroscript.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
</body>
</html>';
	die();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Mensajes</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/estiloadmin.css">
</head>
<body>
	<!--   MENU   -->
	<nav class="navbar navbar-expand-lg fixed-top">
	  <a class="navbar-brand" href="#">
	    <img src="../img/logo.png" width="35" height="35" alt="logo">
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarText">
	    <ul class="nav nav-pills mr-auto">
	      <li class="nav-item ">
	        <a class="nav-link" href="productosAdmin.php">Productos</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="usadosAdmin.php">Usados</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="pedidosAdmin.php">Pedidos</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link active" href="mensajesAdmin.php">Mensajes</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="AdminAdmin.php">Administradores</a>
	      </li>
	    </ul>
	    <ul class="navbar-nav">
	    	<li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <?php echo $_SESSION['usuario'] ?>
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		          <a class="dropdown-item btn-salir" href="../php/diesession.php"><i class="fas fa-power-off mr-3"></i><b>Salir</b></a>
		        </div>
		      </li>
	    </ul>
	  </div>
	</nav>
	<!--   MENU   -->
	<!--   SECCIÓN   -->
	<section class="margen">
		<div class="container">
			<header>
				<h1 class="text-center">Mensajes</h1>
			</header>
			<hr>
			<div class="row">
				<div class="col-sm-8 col-md-6 offset-md-6">
					<form action="../php/buscar.php" method="POST">
						<div class="input-group">
							<input type="text" name="buscar" class="form-control" placeholder="Buscar...">
							<div class="input-group-append">
								<button class="btn btn-info" type="submit" name="bus_mensaje">Buscar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--   /SECCIÓN   -->
	<!--   SECCIÓN CON LA TABLA   -->
	<section class="container margen-tabla">
		<div class="row">
			<div class="col">
				<div class="table-responsive">
					<table class="table table-hover table-bordered table-sm">
						<tr class="thead-dark">
							<th>Codigo</th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Mensaje</th>
							<th>Fecha</th>
						</tr>
						<?php
							$sqlmostrar = "select * from mensaje;";
							$resultado = mysqli_query($conexion, $sqlmostrar);
							while ($fila = mysqli_fetch_array($resultado)) {
								echo "<tr>
										<td>".$fila['m_codigo']."</td>
										<td>".$fila['m_nombre']."</td>
										<td>".$fila['m_correo']."</td>
										<td>".$fila['m_mensaje']."</td>
										<td>".$fila['m_fecha']."</td>
									</tr>";
							}
						?>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--   /SECCIÓN CON LA TABLA   -->

	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/nuestroscript.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
</body>
</html>
<!-- https://www.youtube.com/watch?v=Ihth1kCNw_c
https://www.youtube.com/watch?v=6qr5OEGPMp4 -->