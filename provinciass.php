<?php
include('libreria/engine.php');
include('config/motor.php');
include('plantilla.php');

$provincias = new asgClass('provincias');

$lat = 0;
$long = 0;
 


if($_POST)
{
$provincias->id = (isset($_POST['txtId']))?$_POST['txtId']:$provincias->id;
$provincias->nombre = (isset($_POST['txtNombre']))?$_POST['txtNombre']:$provincias->nombre;
$direccion= urlencode($provincias->nombre);
 
//Buscamos la direccion en el servicio de google
$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$direccion.'&sensor=false');
 
 //decodificamos lo que devuelve google, que esta en formato json
  $output= json_decode($geocode);
 
//Extraemos la informacion que nos interesa
 $lat = $output->results[0]->geometry->location->lat;
$long = $output->results[0]->geometry->location->lng;
$provincias->latitud = $lat;
$provincias->longitud = $long;
		
$provincias->guardar();	

}

$servidor = new Servidor();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="script.js"></script>
</head>
<body>
<form role="form" method='post' id='frmprovincias' action='provincias.php'>
<input class="frm-asg" placeholder="" type='text' name='txtId' hidden id='txtId' value="<?php  echo htmlentities($provincias->id); ?>"  />

			<table>			
				<tr>
					<th style="text-align:right;">Nombre</th>
					
					<td>
						<input class="frm-asg" placeholder="" type='text' name='txtNombre' id='txtNombre' value="<?php  echo htmlentities($provincias->nombre); ?>"  />
					</td>
				</tr>			
			</tr>
				<tr>
					<td colspan='2' align='center'>
						<button type='submit' class='btn btn-default'>Guardar</button>
						<button type="button" onclick="nuevo('provincias',0)">Nuevo</button>
					</td>
				</tr>
			</table>
			</form>
			<?php
				$servidor->tablaDatos('provincias');

			?>
</body>
</html>
