<?php 
	include 'plantilla.php';
	include 'menus.php';
	include 'usuarios_funciones.php';
	$usuarios = new usuarios();
	if($_POST){
		$usuarios->id = $_POST['id'];
		$usuarios->nombre = $_POST['nombre'];
		$usuarios->apellido = $_POST['apellido'];
		$usuarios->usuario = $_POST['usuario'];
		$usuarios->contrasena = $_POST['contrasena'];
		
		$usuarios->guardar();
		header("Location:usuarios.php");
	}else if(isset($_GET['edit'])){
		$usuarios->id = $_GET['edit'];
		$usuarios->cargar();
	
	}else if(isset($_GET['del'])){
		$usuarios->eliminar($_GET['del']);
	}
	
?>

<style>
	#usuarios{
		box-shadow: inset 0px -4px 0px 0px #1D547A;
		background-color: #2D84BF;
	}
	#matenimientos{
		background-color: #2D84BF;
	}
</style>


<fieldset>
	<legend>Mantenimiento de usuarios</legend>
	<form action="usuarios.php" method="post">
		<table class="unit-centered">
			<tr>
				
				<td><input type="hidden" name="id" value="<?php echo $usuarios->id ?>"></td>
			</tr>
			<tr>
				<td>nombre</td>
				<td><input type="text" name="nombre" value="<?php echo $usuarios->nombre ?>"></td>
			</tr>
			<tr>
				<td>apellido</td>
				<td><input type="text" name="apellido" value="<?php echo $usuarios->apellido ?>"></td>
			</tr>
			<tr>
				<td>usuario</td>
				<td><input type="text" name="usuario" value="<?php echo $usuarios->usuario ?>"></td>
			</tr>
			<tr>
				<td>contrasena</td>
				<td><input type="password" name="contrasena" value="<?php echo $usuarios->contrasena ?>"></td>
			</tr>
			
			<tr>
				<td><input class=" btn btn-blue"type="submit" value="Enviar"></td>
				<td><a class="btn btn-green" href="usuarios.php">Nuevo</td>
			</tr>

		</table>
	</form>

		<table class="table-bordered unit-centered table-hovered">
				
					<?php 
						$usuarios = usuarios::listadoUsuarios();
						if(mysqli_num_rows($usuarios) < 1){
							echo "<center><h4>Aún no se han agregado usuarios<h4></center>";
						}else{
							echo "<thead>
										<tr>
											<th>ID</th>
											<th>nombre</th>
											<th>apellido</th>
											<th>usuario</th>
											<th>contrasena</th>
											<th>Edición</th>
										 </tr>
								 </thead>";
						while ($fila = mysqli_fetch_assoc($usuarios)) {
							echo <<<CODIGO
	
							<tr>
								<td>{$fila['id']}</td>
								<td>{$fila['nombre']}</td>
								<td>{$fila['apellido']}</td>
								<td>{$fila['usuario']}</td>
								<td>{$fila['contrasena']}</td>
								
								<td><a href='usuarios.php?edit={$fila['id']}'>Editar</a> | 
									<a onclick="return confirm('¿Seguro que desea borrar esta usuarios?');" href='usuarios.php?del={$fila['id']}'>Eliminar</a></td>
							</tr>	
CODIGO;
							}
						}
					
					?>
			
			</table>
	
</fieldset>
