<?php
include_once 'crud_rc.php';
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
    <h1>Relaciones Comerciales</h1>
	<div id="form">
		<form method="post">
			<table width="100%", border="1px" cellpadding="15">
                <tr>
					<td>
						<input type="text" name="id_rel_com" placeholder="ID" value="<?php
						if(isset($_GET['edit'])) echo $getROW['id_rel_com']; ?>">
					</td>
				</tr>
                <tr>
					<td>
						<input type="text" name="pais_com" placeholder="Nombre" value="<?php
						if(isset($_GET['edit'])) echo $getROW['pais_com']; ?>">
					</td>
				</tr>
                <tr>
					<td>
						<input type="text" name="tipo_relacion" placeholder="Tipo de relación" value="<?php
						if(isset($_GET['edit'])) echo $getROW['tipo_relacion']; ?>">
					</td>
				</tr>
                <tr>
					<td>
						<input type="text" name="pais_relacion" placeholder="País con el se relaciona" value="<?php
						if(isset($_GET['edit'])) echo $getROW['pais_relacion']; ?>">
					</td>
				</tr>
                <tr>
					<td>
						<input type="text" name="cod_producto" placeholder="Código del producto" value="<?php
						if(isset($_GET['edit'])) echo $getROW['cod_producto']; ?>">
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
			$res = $MySQLiconn->query("SELECT * FROM relacion_comercial");
			while ($row=$res->fetch_array()) {
			?>
			<tr>
				<td><?php echo $row['id_rel_com']; ?></td>
				<td><?php echo $row['pais_com']; ?></td>
                <td><?php echo $row['tipo_relacion']; ?></td>
                <td><?php echo $row['pais_relacion']; ?></td>
                <td><?php echo $row['cod_producto']; ?></td>
				<td><a href="?edit=<?php echo $row['id_rel_com']; ?>" onclick="return confirm('Confirmar edición')">Editar</a></td>
				<td><a href="?del=<?php echo $row['id_rel_com']; ?>" onclick="return confirm('Confirmar eliminación')">Eliminar</a></td>
			</tr>
			<?php
			}
			?>
		</table>

	</div>
</center>
</body>
</html>
