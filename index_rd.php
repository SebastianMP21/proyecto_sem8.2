<?php
include_once 'crud_rd.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ejemplo CRUD</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<center>
	<br>
	<br>
    <h1>Relaciones Diplomáticas</h1>
	<div id="form">
		<form method="post">
			<table width="100%", border="1px" cellpadding="15">
                <tr>
					<td>
						<input type="text" name="pais_cod" placeholder="ID" value="<?php
						if(isset($_GET['edit'])) echo $getROW['pais_cod']; ?>">
					</td>
				</tr>
                <tr>
					<td>
						<input type="text" name="pais" placeholder="País" value="<?php
						if(isset($_GET['edit'])) echo $getROW['pais']; ?>">
					</td>
				</tr>
                <tr>
					<td>
						<input type="text" name="descripcion" placeholder="Descripción" value="<?php
						if(isset($_GET['edit'])) echo $getROW['descripcion']; ?>">
					</td>
				</tr>
                <tr>
					<td>
						<input type="text" name="fecha_convenio" placeholder="Fecha del convenio" value="<?php
						if(isset($_GET['edit'])) echo $getROW['fecha_convenio']; ?>">
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
			$res = $MySQLiconn->query("SELECT * FROM relacion_diplomatica");
			while ($row=$res->fetch_array()) {
			?>
			<tr>
				<td><?php echo $row['pais_cod']; ?></td>
				<td><?php echo $row['pais']; ?></td>
                <td><?php echo $row['descripcion']; ?></td>
                <td><?php echo $row['fecha_convenio']; ?></td>
				<td><a href="?edit=<?php echo $row['pais_cod']; ?>" onclick="return confirm('Confirmar edición')">Editar</a></td>
				<td><a href="?del=<?php echo $row['pais_cod']; ?>" onclick="return confirm('Confirmar eliminación')">Eliminar</a></td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
</center>
</body>
</html>
