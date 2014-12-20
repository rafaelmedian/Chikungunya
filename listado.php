<?php

$listadoAfectados = reportessintomas::listadoAfectados();
while ($fila = mysqli_fetch_assoc($listadoAfectados)) {
	echo "Total afectados: {$fila['cantidad']}<br/><br/>";
}

$conteoSintomas = reportessintomas::conteoSintomas();

$arregloSintomas = array();
$arregloVeces    = array();

foreach ($conteoSintomas as $colum) {
	$arregloSintomas[] = $colum['sintoma'];
}
foreach ($conteoSintomas as $colum) {
	$arregloVeces[] = $colum['veces'];
}

/*print_r($arregloSintomas);
print_r($arregloVeces);*/
echo json_encode(array($arregloSintomas, $arregloVeces));

?>