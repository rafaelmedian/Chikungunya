<?php 

class usuarios{
	private $id = 0;
	private $nombre = "";
	private $apellido = "";
	private $usuario = "";
	private $contrasena = "";


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
				$sql="UPDATE `usuarios`
					  SET			
						`nombre` = '{$this->nombre}',
						`apellido` = '{$this->apellido}',
						`usuario` = '{$this->usuario}',
						`contrasena` = '{$this->contrasena}'
						 WHERE `id` =  '{$this->id}'";
	
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
				
			}else{
				$sql = "INSERT INTO `usuarios`
									(
									`nombre`,
									`apellido`,
									`usuario`,
									`contrasena`
									)
									VALUES
									(
									'{$this->nombre}',
									'{$this->apellido}',
									'{$this->usuario}',
									'{$this->contrasena}'
									)";
				echo $sql;
				mysqli_query(conexion::obtenerInstancia(), $sql);
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
			}
		}
	
		function cargar(){
		
			$sql = "SELECT * FROM usuarios WHERE id = '{$this->id}'";
			$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
			if(mysqli_num_rows($rs) > 0){
				$fila = mysqli_fetch_assoc($rs);
				$this->id = $fila['id'];
				$this->nombre = $fila['nombre'];
				$this->apellido = $fila['apellido'];
				$this->usuario = $fila['usuario'];
				$this->contrasena = $fila['contrasena'];
				
		
			}
		}
		
	
		function eliminar($id){
			$sql = "DELETE FROM usuarios where id='$id'";
			mysqli_query(conexion::obtenerInstancia(), $sql);
		}

		static function listadoUsuarios(){
			$sql = "SELECT * FROM usuarios";
			$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
			return $rs;
		}
		


}

?>