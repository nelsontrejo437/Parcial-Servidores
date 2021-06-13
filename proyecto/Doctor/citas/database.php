<?php
	class Database{
		private $con;
		private $dbhost="servidores";
		private $dbuser="hospital";
		private $dbpass="root";
		private $dbname="hospital";
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		
		public function sanitize($var){
			$return = mysqli_real_escape_string($this->con, $var);
			return $return;
		}
		public function create($nombres,$apellidos,$telefono,$edad,$direccion,$descripcion,$nombre_madre,$nombre_padre,$genero,$fecha_nac,$fecha_consulta,$lugar_nac,$observaciones,$tratamiento){
			$sql = "INSERT INTO `pacientes` (nombres, apellidos, telefono, edad, direccion, descripcion, nombre_madre, nombre_padre, genero, fecha_nac, fecha_consulta, lugar_nac, observaciones, tratamiento) VALUES ('$nombres', '$apellidos', '$telefono', '$edad', '$direccion', '$descripcion', '$nombre_madre', '$nombre_padre', '$genero', '$fecha_nac', '$fecha_consulta', '$lugar_nac', '$observaciones', '$tratamiento')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return header("location: charts.php?res=insertado");
			}else{
				return header("location: charts.php?res=error");
			}
		}
		public function read(){
			$sql = "SELECT * FROM pacientes";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function single_record($id){
			$sql = "SELECT * FROM pacientes where id='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}
		public function update($nombres,$apellidos,$telefono,$edad, $direccion,$descripcion, $nombre_madre,$nombre_padre,$genero,$fecha_nac,$fecha_consulta,$lugar_nac,$observaciones,$tratamiento, $id){
			$sql = "UPDATE pacientes SET nombres='$nombres', apellidos='$apellidos', telefono='$telefono', edad='$edad', direccion='$direccion', descripcion='$descripcion', nombre_madre='$nombre_madre', nombre_padre='$nombre_padre', genero='$genero', fecha_nac='$fecha_nac', fecha_consulta='$fecha_consulta', lugar_nac='$lugar_nac', observaciones='$observaciones', tratamiento='$tratamiento' WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return header("location: charts.php?res=insertado");;
			}else{
				return header("location: charts.php?res=error");
			}
		}
		public function delete($id){
			$sql = "DELETE FROM pacientes WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}
	
	

?>	

