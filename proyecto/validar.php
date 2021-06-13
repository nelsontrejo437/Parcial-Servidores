<?php
$usuario=$_POST['usuario'];
$contra=$_POST['contra'];

//conexion 

$conex=mysqli_connect('servidores', 'hospital', 'root', 'hospital');
$consulta="SELECT * FROM usuarios WHERE usuario='$usuario' AND contra='$contra'";
$q=mysqli_query($conex, $consulta);

if (mysql_result($q, 0)) {
	$resul=mysql_result($q, 0)
	header("location: Doctor/principal.php");
}
mysqli_close($conex);
?>