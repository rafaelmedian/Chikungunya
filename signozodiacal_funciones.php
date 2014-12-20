<?php
	class signozodiacal{

		private $id = 0;
		private $nombre = "";
		private $desde = "";
		private $hasta = "";


		function __get($atributo){
			if(isset($this->$atributo)){
				return $this->$atributo;
			}else{
				return "El atributo que intentas llamar no existe";
		
			}
		}
		
		function __set($atributo, $valor){
			if(isset($this->$atributo)){
				$this->$atributo = $valor;
			}else{
				echo "El atributo $atributo no existe <br/>";
			}
		}
		
		function __construct($id = 0){
			$this->id = $this->id;
			$this->cargar();
		}
		
		
			function guardar(){
				$sqlV = "SELECT  desde, hasta FROM signo_zodiacal WHERE desde AND hasta 
							BETWEEN '{$this->desde}' AND '{$this->hasta}'";

				$resultado = mysqli_query(conexion::obtenerInstancia(),$sqlV);
				

				if($this->id > 0){

					if($this->desde > $this->hasta){
						echo "<h3 style='color: red' align='center'>Error, la fecha de inicio no puede ser mayor a la de finalización.</h3>";

					}else if(mysqli_num_rows($resultado) > 0){
					
						echo "<h3 style='color: red' align='center'>Error, no se puede insertar debido a que estas fechas están siendo utilizadas por otro signo.</h3>";

					}

						$sqlq="UPDATE `signo_zodiacal`
								  SET			
									`nombre` = '{$this->nombre}',
									`desde` = '{$this->desde}',
									`hasta` = '{$this->hasta}'
									 WHERE `id` =  '{$this->id}'";
				
							$rs = mysqli_query(conexion::obtenerInstancia(), $sqlq);
							if($rs == null){
								echo "<h3 style='color: red' align='center'>Error, este nombre ya está siendo utilizado por otro signo.</h3>";
							}
							$this->id = mysqli_insert_id(conexion::obtenerInstancia());
				
				}else{
					
					if($this->desde > $this->hasta){
						echo "<h3 style='color: red' align='center'>Error, la fecha de inicio no puede ser mayor a la de finalización.</h3>";

					}else if(mysqli_num_rows($resultado) > 0){

						echo "<h3 style='color: red' align='center'>Error, no se puede insertar debido a que estas fechas están siendo utilizadas por otro signo.</h3>";

					}else{
						
						$sqll = "INSERT INTO `signo_zodiacal`
											(
											`nombre`,
											`desde`,
											`hasta`
											)
											VALUES
											(
											'{$this->nombre}',
											'{$this->desde}',
											'{$this->hasta}'
											)";
			
						$rs = mysqli_query(conexion::obtenerInstancia(), $sqll);
						if($rs == null){
								echo "<h3 style='color: red' align='center'>Error, este nombre ya está siendo utilizado por otro signo.</h3>";
							}
						$this->id = mysqli_insert_id(conexion::obtenerInstancia());
					}
				}
			}
		
		
			function eliminar($id){
				$sql = "DELETE FROM signo_zodiacal where id='$id'";
				mysqli_query(conexion::obtenerInstancia(), $sql);
			}

			function cargar(){
			
				$sql = "SELECT * FROM signo_zodiacal WHERE id = '{$this->id}'";
				$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
				if(mysqli_num_rows($rs) > 0){
					$fila = mysqli_fetch_assoc($rs);
					$this->id = $fila['id'];
					$this->nombre = $fila['nombre'];
					$this->desde = $fila['desde'];
					$this->hasta= $fila['hasta'];
			
				}
			}
			
			
			static function listadoSignoZodiacal(){
				$sql = "SELECT * FROM signo_zodiacal";
				$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
				return $rs;
			}
			

	}
	

?>