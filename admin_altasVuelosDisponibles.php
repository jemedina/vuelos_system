<?php 
include("php/DB.php");
$bd= new DB();
session_start();
$origen=$_SESSION["origen"];
$destino=$_SESSION["destino"];	
$fecha_salida=$_POST["fecha_salida"];
$hora_salida=$_POST["hora_salida"];
$fecha_llegada=$_POST["fecha_llegada"];
$hora_llegada=$_POST["hora_llegada"];
$costo_base=$_POST["costo_base"];

if (isset($_POST["redondo"])){
	$redondo=$_POST["redondo"];
	$fecha_salida_retorno=$_POST["fecha_salida_retorno"];
	$hora_salida_retorno=$_POST["hora_salida_retorno"];
	$fecha_llegada_retorno=$_POST["fecha_llegada_retorno"];
	$hora_llegada_retorno=$_POST["hora_llegada_retorno"];
}
else{
	$redondo=null;
	$fecha_salida_retorno=null;
	$hora_salida_retorno=null;
	$fecha_llegada_retorno=null;
	$hora_llegada_retorno=null;
}
echo $origen."<br>";
echo $destino."<br>";
echo $fecha_salida."<br>";
echo $fecha_llegada."<br>";
echo $hora_salida."<br>";
echo $hora_llegada."<br>";
echo $costo_base."<br>";

if($redondo!=null){
	echo $redondo."<br>";
	echo $fecha_salida_retorno."<br>";
	echo $fecha_llegada_retorno."<br>";
	echo $hora_salida_retorno."<br>";
	echo $hora_llegada_retorno."<br>";
}



$id_vuelo=$_SESSION["id_nuevo_vuelo"];
//die($id_vuelo);
echo $id_vuelo."<br>";
if(!isset($_POST["redondo"])) {
$alta_vuelo_disponible="INSERT INTO VUELOS_DISPONIBLES (id_vuelo_especifico,hora_salida,hore_llegada,fecha_salida,fecha_llegada,precio) VALUES ('$id_vuelo','$hora_salida','$hora_llegada','$fecha_salida','$fecha_llegada','$costo_base');";
    //die($alta_vuelo_disponible);
} else {
$alta_vuelo_disponible="INSERT INTO VUELOS_DISPONIBLES (id_vuelo_especifico,hora_salida,hore_llegada,fecha_salida,fecha_llegada,precio,hora_salida_redondo,hore_llegada_redondo,fecha_salida_redondo,fecha_llegada_redondo) VALUES ('$id_vuelo','$hora_salida','$hora_llegada','$fecha_salida','$fecha_llegada','$costo_base','$hora_salida_retorno','$hora_llegada_retorno','$fecha_salida_retorno','$fecha_llegada_retorno')";
}	

$resultado=$bd->query($alta_vuelo_disponible); 
header("Location: altasVuelosDisponibles.html");
?>