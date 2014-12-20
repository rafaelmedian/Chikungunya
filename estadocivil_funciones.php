<?php 
	class estadocivil{
	private $id = 0;
	private $estado = "";


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
				$sql="UPDATE `estado_civil`
					  SET			
						`estado` = '{$this->estado}'
						
						 WHERE `id` =  '{$this->id}'";
	
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
				
			}else{
				$sql = "INSERT INTO `estado_civil`
									(
									`estado`
									
									)
									VALUES
									(
									'{$this->estado}'
									
									)";
	
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
			}
		}
		
	function eliminar($id){
		$sql = "DELETE FROM estado_civil where id='$id'";
		mysqli_query(conexion::obtenerInstancia(), $sql);
	}

	function cargar(){
	
		$sql = "SELECT * FROM estado_civil WHERE id = '{$this->id}'";
		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
		if(mysqli_num_rows($rs) > 0){
			$fila = mysqli_fetch_assoc($rs);
			$this->id = $fila['id'];
			$this->estado = $fila['estado'];
	
		}
	}
	
	static function listadoEstadoCivil(){
		$sql = "SELECT * FROM estado_civil";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;
	}
	
	}

?>