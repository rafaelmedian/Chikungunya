<?php
include 'plantilla.php';
include 'reportessintoma_funciones.php';
include 'reportesprovincias_funciones.php';
?>
<style>
	#vistageografica{
		box-shadow: inset 0px -8px 0px 0px #1D547A;
		background-color: #2D84BF;
	}
</style>
<?php

//$listaProvincias = reportesprovincias::listadoProvincias();

$listaProvincia = reportesprovincias::provinciasMapa();

$json = json_encode($listaProvincia);

?>
<style>
      #mapa {
        width: 700px;
        height: 400px;
      }
    </style>

    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

  	  <script>


    google.maps.event.addDomListener(window, 'load', dibujarMapa);

    	function dibujarMapa(){
    	var center = new google.maps.LatLng(18.735693, -70.162651);
    	var configuracionMapa = {
    		zoom: 7,
    		center: center,
    		mapTypeId: google.maps.MapTypeId.ROADMAP
    	};

    	var mapa = new google.maps.Map(document.getElementById('mapa'),configuracionMapa);
    	var datos = <?php echo $json;
?>;

            var link = "<a href='vistageografica_detalle.php?provincia=";
            var link2 = "'>Detalles de los casos</a>";
	    	for (var i = 0; i < datos.length; i++){

    		var punto = new google.maps.LatLng(datos[i].longitud, datos[i].latitud);
    		var infoWindow = new google.maps.InfoWindow();
    		var marcador = new google.maps.Marker({
    			position: punto,
    			map: mapa,
                icon: 'icons/icon.png',
                title: datos[i].nombre,

    		});

                if(datos[i].cantidad > 1){
                    marcador.content  = datos[i].cantidad + " afectados";
                }else{
                    marcador.content  = "un afectado";
                }

    			google.maps.event.addListener(marcador, 'click', function(e){
                    console.log(this);
    				infoWindow.setContent("En "+this.title+" hay "+this.content+"<br/></br/>"+link+this.title+link2);
    				infoWindow.open(this.getMap(),this);
    			});
    	}


    }




    </script>

    <h2 align="center">Vista geográfica de los casos de Chikungunya</h2>
        <div id="mapa"></div>
