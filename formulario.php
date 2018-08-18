<?php
header('content-type: text/html; charset = utf-8');
include ('php/conexion.php');
if ($conexion->set_charset('UTF8') === false) {
	die ('Error: '. $conexion->error);
}

$comprar = $_POST['comprar'];

$sqlmostrar = "select * from producto where pro_codigo = ".$comprar.";";
$resultado = mysqli_query($conexion, $sqlmostrar);
$fila = mysqli_fetch_array($resultado);
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
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
		<div class="alert alert-warning" role="alert">
			las compras se realiza con un metodo de pago <strong>CONTRA ENTREGA</strong>
		</div>
		<article>
			<div class="row">
					<div class="col-md-4"> 
				<form action="php/agregar_pedido.php" method="POST">
						<div class="form-group">
							<label for="nombre"><span> Nombres: </span></label>			
							<input class="form-control" type="text" name="nombre" id="nombre" onblur="validarTexto(this)" onkeyup="validarTexto(this)" />
						</div>
						<div class="form-group">
							<label for="apellidos"><span> Apellidos: </span></label>
							<input class="form-control" type="text" name="apellidos" id="apellidos" onblur="validarTexto(this)" onkeyup="validarTexto(this)" />
						</div>
						<div class="form-group">
							<label for="cedula"><span>Cedula:</span></label>
							<input class="form-control" type="number" name="cedula" id="cedula" onblur="validarNumeros(this)" onkeyup="validarNumeros(this)" />
						</div>
						<div class="form-group">
							<label for="correo"><span>Correo:</span></label>
							<input class="form-control" type="email" name="correo" id="correo" onblur="validarCorreo(this)" onkeyup="validarCorreo(this)"/>
						</div>
						<div class="form-group">
							<label for="ciudad"><span>Ciudad:</span></label>
							<select class="form-control" id="ciudad" name="ciudad" onblur="validarinfo(this)">
								<option value=""> [select] </option>
								<option value="Bogota"> Bogotá </option>
							</select>
						</div>
						<div class="form-group">
							<label for="direccion"><span>Dirección:</span></label>
							<input class="form-control" type="text" name="direccion" id="direccion" onblur="validarCorreo(this)" onkeyup="validarCorreo(this)">
						</div>
						<div class="form-group">
							<label for="telefono"><span>Teléfono:</span></label>
							<input class="form-control" type="number" name="telefono" id="telefono" onblur="validarNumeros(this)">
						</div>
						<div class="form-group">
							<label for="celular"><span>Celular:</span></label>
							<input class="form-control" type="number" name="celular" id="celular" onblur="validarNumeros(this)" onkeyup="validarNumeros(this)">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-info" value="<?php echo $comprar ?>" name="codigo">Enviar</button>
							<input class="btn btn-warning" type="reset" value="Borrar">
						</div>
					</div>
					<div class="col-md-8 text-center">
						<img src="img/<?php echo $fila['pro_foto']?>" width="100%" alt="imagen del producto" class="img-thumbnail img-fluid">
						Marca: <?php echo $fila['pro_marca']?>
						<br>
						Descripción: <?php echo $fila['pro_descripcion']?>
						<br>
						Costo: <?php echo $fila['pro_costo']?>
						<br>
						Cantidad:
						<select class="form-control" onclick="totales()" id="cantidad" name="cantidad">
							<option value="0">-Seleccione la cantidad a comprar-</option>
							<?php
								$cantidad = $fila['pro_cantidad'];
								if ($cantidad > 10) {
									$cantidad = 10;
								}
								for ($i = 1; $i <= $cantidad; $i++) {
									echo '<option value="'.$i.'" name="cantidad">'.$i.' </option>';
								}
							?>
						</select>
						<div class="form-group">
							<label for="total"><span>Total:</span></label>
							<input class="form-control text-center" name="total" id="total" readonly>
						</div>
				</form>
					</div>
			</div>
		</article>

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
	<script>
		function totales() {
			var cantidad=document.getElementById('cantidad').selectedIndex;
			var total = 0;
			if (cantidad != 0) {
				total = <?php echo $fila['pro_costo']?> * cantidad;
				document.getElementById('total').value = total;
			}
		} 
	</script>
	<?php
		echo '';
	?>
</body>
</html>