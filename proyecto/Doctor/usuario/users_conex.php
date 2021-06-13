<?php
	class Database{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="usbw";
		private $dbname="tuto_poo";
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
		public function create($nombres,$apellidos,$telefono,$edad,$direccion,$descripcion){
			$sql = "INSERT INTO `usuarios` (nombres, apellidos, contra) VALUES ('$nombres', '$apellidos', '$contra')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return header("location: tables.php?res=insertado");
			}else{
				return header("location: tables.php?res=error");
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
			$return = mysqli_fetch_object($res );
			return $return ;
		}
		public function update($nombres,$apellidos,$contra, $id){
			$sql = "UPDATE clientes SET nombres='$nombres', apellidos='$apellidos', contra='$contra' WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return header("location: tables.php?res=insertado");;
			}else{
				return header("location: tables.php?res=error");
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

