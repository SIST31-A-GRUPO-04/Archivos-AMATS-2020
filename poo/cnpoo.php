<?php
date_default_timezone_set('America/El_Salvador');
define('USUARIO','root');
define('CLAVE','');
define('SERVIDOR','localhost');
define('BASEDATOS','Agroservicio');
mysqli_report(MYSQLI_REPORT_STRICT); 
class clsConexion{
	private $conn;
	public function __construct(){
		try{
			$this->conn=new mysqli(SERVIDOR,USUARIO,CLAVE,BASEDATOS);
		}catch(Exception $e){
			
			echo $e->errorMessage();
		}
	}

	public function consulta($tabla,$campos,$condicion=null){
		$busqueda=" where ";
		for($i=0;$i<count($condicion);$i++){
			if(($i+1)==count($condicion)){
				$busqueda.=key($condicion)."='".current($condicion)."' ";
			}else{
				$busqueda.=key($condicion)."='".current($condicion)."' and ";
			}
			next($condicion);
		}
		$sql="select ".implode(",",$campos)." from $tabla ".$busqueda;
		$res=$this->conn->query($sql);
		return $res;
	}
	
	public function consultaSQL($sentencia){
		$res=$this->conn->query($sentencia);
		return $res;
	}



	public function insertarSql($tabla,$campos,$registros){
		$columnas=implode(",",$campos);
		$datos="'".implode("','",$registros)."'";
		$sql="insert into $tabla ($columnas)value($datos)";
		$res=$this->conn->query($sql);
		return 1;
		
	}

		public function insertarSqle($tabla,$campos,$registros){
		$columnas=implode(",",$campos);
		$datos="'".implode("','",$registros)."'";
		$sql="insert into $tabla ($columnas)value($datos)";
		$res=$this->conn->query($sql);
		return 1;
		
	}



}
	
	
	
	

?>