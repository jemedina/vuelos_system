<?php 
	include("php/DB.php");
	$bd= new DB();
	$origen=$_POST["origen"];
	$destino=$_POST["destino"];
	if (isset($_POST["escala"])){
		$escalas=$_POST["escalas"];
	}
	session_start();
	$_SESSION["origen"]=$origen;
	$_SESSION["destino"]=$destino;
	if(!isset($_POST["escala"])) {
	$consulta="INSERT INTO VUELOS_ESPECIFICOS (origen, destino) VALUES ('$origen', '$destino');";
	$bd->query($consulta);
    $_SESSION["id_nuevo_vuelo"] = $bd->query("SELECT id FROM VUELOS_ESPECIFICOS WHERE origen = $origen AND destino = $destino")->fetch_array()["id"];
	}else{
	$consulta="INSERT INTO VUELOS_ESPECIFICOS (origen, destino, escala) VALUES ('$origen', '$destino', '$escalas');";
	$bd->query($consulta);
    $res = $bd->query("SELECT id FROM VUELOS_ESPECIFICOS WHERE origen = $origen AND destino = $destino AND escala = $escalas")->fetch_array()["id"];
    $_SESSION["id_nuevo_vuelo"]=$res;
	}

    //die(var_dump($res))
	//echo $consulta;
	//var_dump($bd->query($consulta));
	header("Location: altasVuelosDisponibles.html");

 ?>