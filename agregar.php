<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Laboratorio Programaci&oacute;n III</title>
	<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
	<?php
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$nameErr = $emailErr = $apeErr = $nickErr = $dirErr= $telErr = "";
	$nombre = $apellido = $nickname = $email = $direccion = $telefono = "";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
	/* CHEQUEAR LOS CAMPOS */
	if(empty($_POST["nombre"])){
		$nameErr = "*";
	}else{
		$nombre = test_input($_POST["nombre"]);
		// Chequea que solo ingrese letras y espacios
		if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
			$nameErr = "Solo se permiten letras y espacios"; 
		}
	}
	if(empty($_POST["apellido"])){
		$apeErr = "*";
	}else{
		$apellido = test_input($_POST["apellido"]);
		// Chequea que solo ingrese letras y espacios
		if (!preg_match("/^[a-zA-Z ]*$/",$apellido)) {
			$apeErr = "Solo se permiten letras y espacios"; 
		}
	}
	if(empty($_POST["nickname"])){
		$nickErr = "*";
	}else{
		$nickname = test_input($_POST["nickname"]);
		// Chequea que solo ingrese letras y numeros
		if (!preg_match("/^[0-9a-zA-Z]*$/",$nickname)) {
			$nickErr = "Solo se permiten letras y numeros"; 
		}
	}
	if (empty($_POST["email"])) {
		$emailErr = "*";
  	} else {
		$email = test_input($_POST["email"]);
		// chequea que el campo de email sea del formato nombre@dominio.com
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Formato de email invalido"; 
		}
	}
	if(empty($_POST["direccion"])){
		$dirErr = "*";
	}else{
		$direccion = test_input($_POST["direccion"]);
		// Chequea que solo ingrese letras y espacios
		if (!preg_match("/^[0-9a-zA-Z ]*$/",$direccion)) {
			$dirErr = "Solo se permiten letras y espacios"; 
		}
	}
	if(empty($_POST["telefono"])){
		$telErr = "*";
	}else{
		$telefono = test_input($_POST["telefono"]);
	}
	$genero = $_POST["genero"];
	}
	?>
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
						<h3>Nuevo Usuario</h3>
						<br>
						<?php
						//Se conecta a la base de datos
						$dbconn = pg_connect("host=localhost port=5433 dbname=usuariosdb user=usuarioadm password=usuarioadm")
							or die('No se ha podido conectar: ' . pg_last_error());
						/*$dbconn = pg_connect("host=localhost port=5433 dbname=laboratorio user=dammatus password=dami")
							or die('No se ha podido conectar: ' . pg_last_error());*///DataBase para probar coneccion
						//Se busca un usuario con el nick ingresado en el formulario
						if($_SERVER["REQUEST_METHOD"] == "POST"){
							$result = pg_query_params($dbconn, 'SELECT * FROM usuario WHERE nick = $1', array($_POST["nickname"]));
							if ($line = pg_fetch_assoc($result)) {
						 		if (count($line) > 0) {
						 			$error = TRUE;
						 		}
							}
						}
						?>
						<!-- Forms -->
						<p class="error">(*) Campos obligatorios</p>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
           					Nombre: <br>
           					<input type="text" name="nombre"  value="<?php echo $nombre;?>"/>
           					<span class="error"> <?php echo $nameErr;?> </span>
           					<br/>
           					Apellido: <br>
           					<input type="text" name="apellido" value="<?php echo $apellido;?>"/>
           					<span class="error"> <?php echo $apeErr;?> </span>
           					<br/>
							Nick: <br>
          					<input type="text" name="nickname" value="<?php echo $nickname;?>">
          					<span class="error"> <?php echo $nickErr;?> </span>
          					<br/>
          					e-mail: <br>
          					<input type="email" name="email" value="<?php echo $email;?>" >
          					<span class="error"> <?php echo $emailErr;?> </span>
          					<br/>
       					    Direccion: <br> 
         					<input type="text" name="direccion"value="<?php echo $direccion;?>">
          					<span class="error"> <?php echo $dirErr;?> </span>
          					<br/>
          					Telefono: <br>
          					<input type="number" name="telefono" value="<?php echo $telefono;?>">
          					<span class="error"> <?php echo $telErr;?> </span>
							<br/>
							Genero: <br>
							<input type="radio" name="genero" value="Otro" checked>Otro
							<input type="radio" name="genero" value="Femenino">Femenino
							<input type="radio" name="genero" value="Masculino">Masculino
          					<br><br>
          					<input type="submit" name="submit" value="Enviar"> 
        				</form>
						
						<?php
						if($_SERVER["REQUEST_METHOD"] == "POST"){
							/* VERIFICAR QUE NO HAY ERRORES */
							if (strcmp($nameErr, "") == 0 && strcmp($apeErr, "") == 0 && strcmp($emailErr, "") == 0 &&strcmp($dirErr, "") == 0 && strcmp($nickErr, "") == 0 && strcmp($telErr, "") == 0 ){
								if($error == TRUE){
									echo "<br>El Nick Ingresado ya existe.";
								}else{
									$array = array($nombre, $apellido, $nickname, $email, $direccion, $telefono, $genero);
									$sql = 'INSERT INTO usuario(nombre, apellido, nick, email, direccion, telefono, genero) values ($1, $2, $3, $4, $5, $6, $7);';
							 		// Se inserta en la base de datos el nuevo usuario
						 			$result = pg_query_params($dbconn, $sql, $array);
						 			//echo "<br>Usuario Cargado Correctamente";
									 echo "<script>alert('Usuario cargado correctamente')</script>";
								}
							}else{
								echo "<br>No se pudo cargar el usuario, revise los campos.";
							}							
						}
						 // se cierra la conexión a la base de datos
						 if ($dbconn) {
						 	pg_close($dbconn);
						 }
						?>
					</div>
				</div>
				<div style="clear: both;">&nbsp;</div>
			</div>
			<div style="clear: both;">&nbsp;</div>
		</div>
		<div class="container"><img src="images/img03.png" width="1000" height="40" alt="" /></div>
	</div>
	<div id="footer-content"></div>
	<div id="footer">
	<p>Copyright (c) 2021 by Damian Matus. All rights reserved. Design by <a href="http://www.freecsstemplates.org/" rel="nofollow">FreeCSSTemplates.org</a>.</p>
	</div>
</body>

</html>