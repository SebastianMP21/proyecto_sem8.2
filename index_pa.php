<?php
include_once 'crud_pais.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Países</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<center>
	<br>
	<br>
	<h1>Países</h1>
	<div id="form" align="center">
		<form method="post" align="center">
			<table width="100%", border="1px" cellpadding="15">
				<tr>
					<td>
						<input type="text" name="nombre" placeholder="Nombre" value="<?php if(isset($_GET['edit'])) echo $getROW[1]; ?>">   
					</td>
				</tr>
                <tr>
					<td>
						<input type="text" name="id_pais" placeholder="ID" value="<?php if(isset($_GET['edit'])) echo $getROW[0]; ?>">
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
			<?php 
			$res = $MySQLiconn->query("SELECT * FROM pais");
			while ($row=$res->fetch_array()) {
			?>
			<tr>
				<td><?php echo $row['id_pais']; ?></td>
				<td><?php echo $row['nombre']; ?></td>
				<td><a href="?edit=<?php echo $row['id_pais']; ?>" onclick="return confirm('Confirmar edición')">Editar</a></td>
				<td><a href="?del=<?php echo $row['id_pais']; ?>" onclick="return confirm('Confirmar eliminación')">Eliminar</a></td>
			</tr>
			<?php
			}
			?>
		</table>

	</div>
</center>
</body>
</html>
