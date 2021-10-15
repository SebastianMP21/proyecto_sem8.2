<?php 

session_start();
error_reporting(0);
$varsesion=$_SESSION['users'];
if ($varsesion==null || $varsesion='') {
	header("location:../index.php");
	die();
};
include_once 'crud_usuario.php'
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Agregar Usuario</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<a class="boton" href="./cerrar_sesion.php">Cerrar Sesión</a>

	<center>
		<br>
		<h1>Agregar usuario a la base de datos</h1>
		<div id="form">
			<form method="post">
				<table width="100%" border="1px" cellpadding="15">
                    
					<tr>
						<td>
							<input type="text" name="users" placeholder="Usuario" value="<?php if(isset($_GET['edit'])) echo $getROW['users']; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="user_pass" placeholder="Contraseña" value="<?php if(isset($_GET['edit'])) echo $getROW['user_pass']; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="id_type" placeholder="Tipo de usuario" value="<?php if(isset($_GET['edit'])) echo $getROW['id_type']; ?>">
						</td>
					</tr>
					
					<tr>
						<td>
							<?php 
							if (isset($_GET['edit'])) {
								?>
								<button type="submit" name="update">Editar</button>
								<?php
							}else{
								?>
								<button type="submit" name="save">Registrar</button>
								<?php
							}
							?>
						</td>
					</tr>
				</table>
			</form>
			<br><br>
			<table width="100%" border="1" cellpadding="15" align="center">
				<tr>
					<td colspan="8">USUARIOS</td>
				</tr>
				<tr>
					<td>N°</td>
					<td>Usuario</td>
					<td>Contraseña</td>
					<td>Tipo de usuario</td>


				</tr>
				<?php
				$res = $MySQLiconn->query("SELECT * FROM usuario");
				while ($row=$res->fetch_array()){
				?>
				
				<tr>
					<td><?php echo $row['id_user']; ?></td>
					<td><?php echo $row['users']; ?></td>
					<td><?php echo $row['user_pass']; ?></td>
					<td><?php echo $row['id_type']; ?></td>
					<td><a href="?edit=<?php echo $row['id_user'];?>" onclick="return confirm('Confirmar edición de libro')">Editar</a></td>
					<td><a href="?del=<?php echo $row['id_user'];?>" onclick="return confirm('Confirmar eliminación del libro')">Eliminar</a></td>

				</tr>
				<?php
				}
				?>
				
			</table>
		</div>
	</center>

</body>
</html>