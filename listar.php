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
					<h3>Listar Usuarios</h3>
						<br>
						<?php
						 // Se establece la conexión a la base de datos
						 $dbconn = pg_connect("host=localhost port=5433 dbname=usuariosdb user=usuarioadm password=usuarioadm")
							or die('No se ha podido conectar: ' . pg_last_error());
						 /*$dbconn = pg_connect("host=localhost port=5433 dbname=laboratorio user=dammatus password=dami")
							or die('No se ha podido conectar: ' . pg_last_error());*///DataBase para probar coneccion
						 // Se recuperan los usuarios
						 // Si devuelve falso es por que fallo la consulta
						 $result = pg_query($dbconn, 'SELECT nick, nombre, apellido, email, direccion, genero, telefono FROM usuario ORDER BY apellido');
						?>
						<table id="table">
        				<tr>
						<th>Apellido</th>
						<th>Nombre</th>
         				<th>Nick</th>
          				<th>E-Mail</th>
          				<th>Direccion</th>
          				<th>Genero</th>
          				<th>Telefono</th>
        				</tr>
						<?php
						
						// Recupera cada usuario como un arreglo asociativo con los nombres de las columnas como indices
						 while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
						 	echo "\t<tr>\n";
						 	echo "\t\t<td>" . $line["apellido"] . "</td>\n";
						 	echo "\t\t<td>" . $line["nombre"] . "</td>\n";
						 	echo "\t\t<td>" . $line["nick"] . "</td>\n";
						 	echo "\t\t<td>" . $line["email"] . "</td>\n";
						 	echo "\t\t<td>" . $line["direccion"] . "</td>\n";
						 	echo "\t\t<td>" . $line["genero"] . "</td>\n";
						 	echo "\t\t<td>" . $line["telefono"] . "</td>\n";
						 	echo "\t</tr>\n";
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
		<div class="container"><img src="images/img03.png" width="1000" height="40" alt="" />

		</div>
		<!-- end #page -->
	</div>
	<div id="footer-content"></div>
	<div id="footer">
		<p>Copyright (c) 2021 by Damian Matus. All rights reserved. Design by <a href="http://www.freecsstemplates.org/" rel="nofollow">FreeCSSTemplates.org</a>.</p>
	</div>
	<!-- end #footer -->
</body>

</html>