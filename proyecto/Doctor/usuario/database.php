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
		public function create($nombre,$apellido,$contra){
			$sql = "INSERT INTO `usuarios` (nombre, apellido, contra) VALUES ('$nombre', '$apellido', '$contra')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return header("location: usuarios.php?res=insertado");
			}else{
				return header("location: usuarios.php?res=error");
			}
		}
		public function read(){
			$sql = "SELECT * FROM usuarios";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function single_record($id){
			$sql = "SELECT * FROM usuarios where id='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res);
			return $return ;
		}
		public function update($nombre,$apellido,$contra, $id){
			$sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', contra='$contra' WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return header("location: usuarios.php?res=insertado");;
			}else{
				return header("location: usuarios.php?res=error");
			}
		}
		public function delete($id){
			$sql = "DELETE FROM usuarios WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}
?>	

