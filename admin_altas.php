<?php 
	include("php/DB.php");
	$bd= new DB();
	$aereopuerto=$_POST["destino"];
	$consulta="INSERT INTO AEREOPUERTOS (nombre) VALUES ('$aereopuerto')";
	$bd->query($consulta);
	header("Location: altasVuelos.html")
?>