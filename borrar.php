<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Laboratorio Programaci&oacute;n III</title>
	<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
	<div id="wrapper">
		<div id="header-wrapper" class="container">
			<div id="header" class="container">
				<div id="logo">
					<h1><a href="#">Usuarios</a></h1>
				</div>
				<div id="menu">
					<ul>
						<li class="current_page_item"><a href="index.php">Homepage</a></li>
						<li><a href="agregar.php">Nuevo</a></li>
						<li><a href="listar.php">Listar</a></li>
						<li><a href="borrar.php">eliminar</a></li>
					</ul>
				</div>
			</div>
			<div><img src="images/img03.png" width="1000" height="40" alt="" /></div>
		</div>
		<!-- end #header -->
		<div id="page">
			<div id="content">
				<div class="post">
					<h2>Sistema de Administraci&oacute;n de Usuarios</h2>
					<p class="meta"><span class="date"><?php echo date("d - m - Y"); ?></span></p>
					<div style="clear: both;">&nbsp;</div>
					<div class="entry">
					<h3>Borrar Usuario</h3>
						<br>
						<?php
						 // Se establece la conexión a la base de datos
						 $dbconn = pg_connect("host=localhost port=5433 dbname=usuariosdb user=usuarioadm password=usuarioadm")
							 or die('No se ha podido conectar: ' . pg_last_error());
					 	/*$dbconn = pg_connect("host=localhost port=5433 dbname=laboratorio user=dammatus password=dami")
							 or die('No se ha podido conectar: ' . pg_last_error());*///DataBase para probar coneccion
						?>
						<?php
						 // Se busca un usuario con el nick ingresado en el formulario
						 if($_SERVER["REQUEST_METHOD"] == "POST"){
						 	$result = pg_query_params($dbconn, 'DELETE FROM usuario WHERE nick = $1', array($_POST["nick"]));
						 	if (pg_affected_rows($result)) {
						 		$message = "Usuario " . $_POST["nick"] . " eliminado";
						 	} else {
						 		$message = "No se pudo eliminar el usuario";
						 	}
						}
						echo $message;
						?>

						<?php
						// Se recuperan los usuarios
						// Si devuelve falso es por que fallo la consulta
						$result = pg_query($dbconn, 'SELECT nick, nombre, apellido, email, direccion, genero, telefono FROM usuario ORDER BY apellido');
						// recupera cada usuario como un arreglo asociativo con los nombres de las columnas como indices
						?>
						<table id="table" >
        				<tr>
         				<th>Apellido</th>
          				<th>Nombre</th>
          				<th>Nick</th>
          				<th>E-Mail</th>
          				<th>Direccion</th>
          				<th>Genero</th>
          				<th>Telefono</th>
        				</tr>
						<?php while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) { ?>
							 <tr>
								<td><?php echo $line["apellido"] ?></td>
								<td><?php echo $line["nombre"] ?></td>
								<td><?php echo $line["nick"] ?></td>
								<td><?php echo $line["email"] ?></td>
								<td><?php echo $line["direccion"] ?></td>
								<td><?php echo $line["genero"] ?></td>
								<td><?php echo $line["telefono"] ?></td>
								<td>
									<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
										<input type="hidden" name="nick" value="<?php echo $line["nick"] ?>">
										<input class="boton" type="submit" name="borrar" value="Borrar">
									</form>
								</td>
							</tr> 
						<?php
						}
						?>
						</table>
						<?php
						 // se cierra la conexión a la base de datos
						 if ($dbconn) {
						 	pg_close($dbconn);
						 }
						?>
					</div>
				</div>
				<div style="clear: both;">&nbsp;</div>
			</div>
			<!-- end #content -->
			<!-- end #sidebar -->
			<div style="clear: both;">&nbsp;</div>
		</div>
		<div class="container"><img src="images/img03.png" width="1000" height="40" alt="" /></div>
		<!-- end #page -->
	</div>
	<div id="footer-content"></div>
	<div id="footer">
		<p>Copyright (c) 2021 by Damian Matus. All rights reserved. Design by <a href="http://www.freecsstemplates.org/" rel="nofollow">FreeCSSTemplates.org</a>.</p>
	</div>
	<!-- end #footer -->
</body>
</html>