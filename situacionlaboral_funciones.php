<?php 
class situacionlaboral{

	private $id = 0;
	private $situacion = "";


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
			if($this->id > 0){
				$sql="UPDATE `situacion_laboral`
					  SET			
						`situacion` = '{$this->situacion}'
						
						 WHERE `id` =  '{$this->id}'";
	
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
				
			}else{
				$sql = "INSERT INTO `situacion_laboral`
									(
									`situacion`
									
									)
									VALUES
									(
									'{$this->situacion}'
									
									)";
				
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
			}
		}
	function eliminar($id){
		$sql = "DELETE FROM situacion_laboral where id='$id'";
		mysqli_query(conexion::obtenerInstancia(), $sql);
	}

	function cargar(){
	
		$sql = "SELECT * FROM situacion_laboral WHERE id = '{$this->id}'";
		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
		if(mysqli_num_rows($rs) > 0){
			$fila = mysqli_fetch_assoc($rs);
			$this->id = $fila['id'];
			$this->situacion = $fila['situacion'];
	
		}
	}
	
	static function listadoSituacionLaboral(){
		$sql = "SELECT * FROM situacion_laboral";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;
	}
	




}

?>