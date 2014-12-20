

<?php

include 'plantilla.php';
include 'submenu_reportes.php';
include 'sintomas_funciones.php';
include 'reportessintoma_funciones.php';

?>
<style>
	#porsintoma{
		box-shadow: inset 0px -4px 0px 0px #1D547A;
		background-color: #2D84BF;
	}
	#reportes{
		background-color: #2D84BF;
	}
</style>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);

function drawChart() {

var data = new google.visualization.DataTable();
        data.addColumn('string','Sintoma');
        data.addColumn('number','Cantidad');
        data.addRows

        	(
        		[
<?php
$cantidad = reportessintomomas::cantidadSintomas();
foreach ($cantidad as $fila) {
	echo <<<CODIGO
        					["{$fila['sintoma']}", {$fila['veces']}],

CODIGO

	;

}
?>
]
);
        var opciones = {'title':'Estadistica sobre los afectados por Chikungunya'}
        var grafica = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        grafica.draw(data, opciones);
      }
    </script>

  	<h1 align="center">Reporte de Sintomas</h1>
    <script>
  function imprimir(){
    window.print();
  }
</script>


<div id="imprimir"><a href="#" class="btn btn-green" onClick="imprimir();">Imprimir Reporte</a><br/><br/></div>
<?php
$listado = reportessintomomas::listadoAfectados();
foreach ($listado as $key => $value) {
	echo "<h3 align='center' style='color: #3497DB;'>El total de afectados fueron: {$value['cantidad']}</h3>";
}

?>



<?php
$canti = reportessintomomas::cantidadSintomas();
foreach ($canti as $value) {
	echo "<center><span style='font-size: 18px;'>{$value['sintoma']} - <span style='color: darkblue;'>{$value['veces']} </span><br/></span></center>";
}

?>
<div id="chart_div"></div>
