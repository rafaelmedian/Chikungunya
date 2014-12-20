<?php
include 'plantilla.php';
include 'submenu_reportes.php';
include 'sintoma_detalle.php';
include 'reportestiposangre_funciones.php';

?>
<style>
	#portiposangre{
		box-shadow: inset 0px -4px 0px 0px #1D547A;
		background-color: #2D84BF;
	}
	#reportes{
		background-color: #2D84BF;
	}
</style>

<script>
	function imprimir(){
		window.print();
	}
</script>

<h1>Reporte Por Tipo de sangre</h1>
<a href="#" class="btn btn-green" onClick="imprimir();">Imprimir Reporte</a><br/><br/>
<?php
	

	$reporteTipo = reporteTipo::listadoTipo();

	while($fila = mysqli_fetch_assoc($reporteTipo)){
		$tipo = reporteTipo::listardoCasos($fila['tipo']);
		echo "<h2>Listado de {$fila['tipo']}</h2>";
		$totalTipo = reporteTipo::totalTipo($fila['tipo']);
		while($cantidadTotal = mysqli_fetch_assoc($totalTipo)){
			
			echo "<table class='table-bordered table-hovered table-container'>

						<thead>
							<th>Cedula</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Sintoma</th>
							<th>Fecha</th>
							<th>Sexo</th>
							<th>Provincia</th>
							<th>Dirección</th>
							<th>Tipo De Sangre</th>
							<th>Estado</th>
							<th>Signo</th>
							<th>Situación</th>
							

						</thead>";
		while($otraFila = mysqli_fetch_assoc($tipo)){
			

echo <<<CODIGO
					<tbody>
						<tr>
							<tr>
							<td>{$otraFila['cedula']}</td>
							<td>{$otraFila['nombre']}</td>
							<td>{$otraFila['apellido']}</td>
							
							<td>
CODIGO;
							$listado = sintoma_detalle::listadoSintomasChiku($otraFila['id']);
							foreach ($listado as $sintomaD) {
								echo $sintomaD['sintoma'].",";
							}
							
							

							echo <<<CODIGO
							</td>
							<td>{$otraFila['fecha']}</td>
							<td>{$otraFila['sexo']}</td>
							<td>{$otraFila['provincia']}</td>
							<td>{$otraFila['direccion']}</td>
							<td>{$otraFila['tipo']}</td>
							<td>{$otraFila['estado']}</td>
							<td>{$otraFila['signo']}</td>
							<td>{$otraFila['situacion']}</td>
						
						</tr>
						
CODIGO;

}
echo <<<CODIGO
						<tr>
							<td colspan="11">Total</td>
							<td>{$cantidadTotal['cantidad']}</td>
						</tr>
					</tbody>
				</table>
CODIGO;
}
}
?>
						
					
						
<?php						
							
							

		



	


?>
	
				
<section>
	<article>
		
	</article>
</section>







