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
	<title>Administración</title>
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
	        <a class="nav-link" href="mensajesAdmin.php">Mensajes</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link active" href="AdminAdmin.php">Administradores</a>
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
				<h1 class="text-center">Administradores</h1>
			</header>
			<hr>
			<div class="row">
				<div class="col-sm-4 col-md-6">
					<a href="#" class="btn btn-success" data-toggle="modal" data-target="#nuevo"><i class="fas fa-plus mr-3"></i>NUEVO</a>
					<small class="font-weight-light">Agrega un Administrador</small>
				</div>
				<div class="col-sm-8 col-md-6">
					<form action="../php/buscar.php" method="POST">
						<div class="input-group">
							<input type="text" name="buscar" class="form-control" placeholder="Buscar...">
							<div class="input-group-append">
								<button class="btn btn-info" type="submit" name="bus_admin">Buscar</button>
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
							<th>Cedula</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Correo</th>
							<th>Edi/Eli</th>
						</tr>
						<?php
							$sqlmostrar = "select * from administrador;";
							$resultado = mysqli_query($conexion, $sqlmostrar);
							while ($fila = mysqli_fetch_array($resultado)) {
								echo "<tr>
										<td>".$fila['a_codigo']."</td>
										<td>".$fila['a_cedula']."</td>
										<td>".$fila['a_nombres']."</td>
										<td>".$fila['a_apellidos']."</td>
										<td>".$fila['a_correo']."</td>
										<td>
											<form action='../php/editar_admin.php' method='POST'>
												<button type='submit' value='".$fila['a_codigo']."'' class='btn btn-warning btn-sm' name='botonEditar'><i class='fas fa-pencil-alt'></i></button>
												<button type='submit' value='".$fila['a_codigo']."' class='btn btn-danger btn-sm boton-tabla' name='botonEliminar'><i class='far fa-trash-alt'></i></button>
											</form>
										</td>
									</tr>"
								;
							}
						?>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--   /SECCIÓN CON LA TABLA   -->
	<!--   VENTANAS EMERGENTES   -->
		<!--Ventana eliminar-->
	<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">ESPERE!</h5>
	      </div>
	      <div class="modal-body">
	        Seguro que desea eliminar el siguiente registro?
	        <br>
	        //datos a eliminar//
	      </div>
	      <div class="modal-footer">
	        <button type="button" value="" class="btn btn-danger">Eliminar</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	      </div>
	    </div>
	  </div>
	</div>
		<!--Ventana editar-->
	<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">EDITAR DATOS</h5>
	      </div>
	      <form action="" method="POST">
		      <div class="modal-body">
		      	<input type="hidden" name="codigo" value="">
		        <div class="form-group">
		        	<label for="correo">Correo:</label>
		        	<input type="text" class="form-control" value="" name="correo" id="correo" onblur="validarCorreo(this)" onkeyup="validarCorreo(this)">
		        </div>
		        <div class="form-group">
		        	<label for="clave">Contraseña:</label>
		        	<input type="password" class="form-control" value="" name="clave" id="clave2" onblur="validarCorreo(this)" onkeyup="validarCorreo(this)">
		        </div>
		        <div class="form-group">
		        	<label for="clave2">Repetir contraseña:</label>
		        	<input type="password" class="form-control" value="" onblur="validarClave(this)" onkeyup="validarCorreo(this)">
		        </div>
		        <div class="form-group">
		        	<label for="cedula">Cedula:</label>
		        	<input type="number" class="form-control" value="" name="cedula" id="cedula" onblur="validarNumeros(this)" onkeyup="validarNumeros(this)">
		        </div>
		        <div class="form-group">
		        	<label for="nombres">Nombres:</label>
		        	<input type="text" class="form-control" value="" name="nombres" id="nombres" onblur="validarTexto(this)" onkeyup="validarTexto(this)">
		        </div>
		        <div class="form-group">
		        	<label for="apellidos">Apellidos:</label>
		        	<input type="text" class="form-control" value="" name="apellidos" id="apellidos" onblur="validarTexto(this)" onkeyup="validarTexto(this)">
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-success">Enviar</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		      </div>
		  </form>
	    </div>
	  </div>
	</div>
		<!--Ventana nuevo-->
	<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">NUEVO ADMINISTRADOR</h5>
	      </div>
	      <form action="../php/agregar_administrador.php" method="POST">
		      <div class="modal-body">
		      	<input type="hidden" name="codigo" value="">
		        <div class="form-group">
		        	<label for="correo">Correo:</label>
		        	<input type="text" class="form-control" value="" name="correo" id="correo" onblur="validarCorreo(this)" onkeyup="validarCorreo(this)">
		        </div>
		        <div class="form-group">
		        	<label for="clave">Contraseña:</label>
		        	<input type="password" class="form-control" value="" name="clave" id="clave" onblur="validarCorreo(this)" onkeyup="validarCorreo(this)">
		        </div>
		        <div class="form-group">
		        	<label for="clave2">Repetir contraseña:</label>
		        	<input type="password" class="form-control" value="" onblur="validarClave(this)" onkeyup="validarCorreo(this)">
		        </div>
		        <div class="form-group">
		        	<label for="cedula">Cedula:</label>
		        	<input type="number" class="form-control" value="" name="cedula" id="cedula" onblur="validarNumeros(this)" onkeyup="validarNumeros(this)">
		        </div>
		        <div class="form-group">
		        	<label for="nombres">Nombres:</label>
		        	<input type="text" class="form-control" value="" name="nombres" id="nombres" onblur="validarTexto(this)" onkeyup="validarTexto(this)">
		        </div>
		        <div class="form-group">
		        	<label for="apellidos">Apellidos:</label>
		        	<input type="text" class="form-control" value="" name="apellidos" id="apellidos" onblur="validarTexto(this)" onkeyup="validarTexto(this)">
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-success">Agregar</button>
		        <button type="reset" class="btn btn-info">Borrar</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		      </div>
		  </form>
	    </div>
	  </div>
	</div>
	<!--   /VENTANAS EMERGENTES   -->
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/nuestroscript.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
</body>
</html>
<!-- https://www.youtube.com/watch?v=Ihth1kCNw_c
https://www.youtube.com/watch?v=6qr5OEGPMp4 -->