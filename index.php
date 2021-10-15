<?php 
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Usuario</title>
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/cabecera.css">
</head>
<body>
	<form action="verificar_user.php" method="post">
		<h1>Sistema de inicio de sesión</h1>
		<p>Usuario <input type="text" placeholder="usuario" name="users"></p>
		<p>Contraseña <input type="password" placeholder="contraseña" name="user_pass"></p>
		<input type="submit" value="Ingresar">
	</form>
	
</body>
</html>