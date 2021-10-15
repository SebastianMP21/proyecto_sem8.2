<?php
include_once 'crud_producto.php';
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
	<h1>Productos</h1>
	<div id="form">
		<form method="post">
			<table width="100%", border="1px" cellpadding="15">
                <tr>
					<td>
						<input type="text" name="id_prod" placeholder="ID" value="<?php
						if(isset($_GET['edit'])) echo $getROW['id_prod']; ?>">
					</td>
				</tr>
                <tr>
					<td>
						<input type="text" name="nombre_prod" placeholder="Nombre del producto" value="<?php
						if(isset($_GET['edit'])) echo $getROW['nombre_prod']; ?>">
					</td>
				</tr>
                <tr>
					<td>
						<input type="text" name="descripcion" placeholder="Descripción del producto" value="<?php
						if(isset($_GET['edit'])) echo $getROW['descripcion']; ?>">
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
			$res = $MySQLiconn->query("SELECT * FROM productos");
			while ($row=$res->fetch_array()) {
			?>
			<tr>
				<td><?php echo $row['id_prod']; ?></td>
				<td><?php echo $row['nombre_prod']; ?></td>
                <td><?php echo $row['descripcion']; ?></td>
				<td><a href="?edit=<?php echo $row['id_prod']; ?>" onclick="return confirm('Confirmar edición')">Editar</a></td>
				<td><a href="?del=<?php echo $row['id_prod']; ?>" onclick="return confirm('Confirmar eliminación')">Eliminar</a></td>
			</tr>
			<?php
			}
			?>
		</table>

	</div>
</center>
</body>
</html>
