<?php 
include("php/DB.php");
$numPasajeros=$_POST["numPasajeros"];
$costoBase=$_POST["costoBase"];
$precio=$_POST["precio"];
$costoExtra=$_POST["costoExtra"];
$total=$_POST["total"];
$nombreTitular=$_POST["nombreTitular"];
$email=$_POST["email"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$metodoPago=$_POST["opcion"];
$tipoVuelo=$_POST["tipoVuelo"];
$idVuelo=$_POST["id_vuelo_disponible"];
$origen=$_POST["origen"];
$destino=$_POST["destino"];
$partidaRedondo=$_POST["partidaRedondo"];
$llegadaRedondo=$_POST["llegadaRedondo"];
$horaPartidaRedondo=$_POST["horaPartidaRedondo"];
$horaLlegadaRedondo=$_POST["horaLlegadaRedondo"];

for($i=0; $i<$numPasajeros-1; $i++){ 
  $arr[]=$_POST["pasajero-".$i];
}
session_start();
$_SESSION["numPasajeros"]=$numPasajeros; 
$_SESSION["costoBase"]=$costoBase;
$_SESSION["costoExtra"]=$costoExtra;
$_SESSION["total"]=$total;
$_SESSION["nombreTitular"]=$nombreTitular;
$_SESSION["email"]=$email;
$_SESSION["direccion"]=$direccion;
$_SESSION["telefono"]=$telefono;
$_SESSION["opcion"]=$metodoPago;
$_SESSION["tipoVuelo"]=$tipoVuelo;
$_SESSION["id_vuelo_disponible"]=$idVuelo;
$_SESSION["origen"] = $origen;
$_SESSION["destino"] = $destino;
for($i=0; $i<$numPasajeros-1; $i++){ 
  $_SESSION["pasajero-".$i]=$arr[$i];
}
$db = new DB();
$SQL_GET_ASIENTOS = "SELECT numero FROM detalle_asientos WHERE id_vuelo_disponible = ".$idVuelo;
//die($SQL_GET_ASIENTOS);
$res = $db->query($SQL_GET_ASIENTOS);
while($item = $res->fetch_array())
{
	$asientosOcupados[]=$item["numero"];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Selecciona tu asiento</title>
	<script type="text/javascript">
		var n = <?php echo $numPasajeros ?>;
        var totalBase = <?php echo $total ?>;
	</script>
	<link rel="stylesheet" type="text/css" href="css/asientos.css">
	<?php include("php/commonImports.php"); ?>
	
</head>
<body>
<div class="row">
	<div class="col-md-6" id="infoVuelo">
		<div class="raw">
			<label id="labelAsiento">Elige tu asiento de:</label>
		</div>
		<div class="raw"> 
		 Total : $<span id="totalSpan"><?php echo $total ?></span>
		</div>
		<div class="raw" id="travelInfo">
			<span id="origen"><?php echo $origen; ?></span> a <span id="destino"><?php echo $destino; ?></span>
		</div>
		<div class="raw">
			<table class="table table-striped">
    <thead>
      <tr>
        <th>Pasajero</th>
        <th>Asiento</th>
        <th>Seleccion</th>
      </tr>
    </thead>
    <tbody>
    <?php for($i = 1 ; $i <= $numPasajeros; $i++) { ?>
      <tr>
        <td>Pasajero <?php echo $i; ?></td>
        <td id="<?php echo "asiento".$i ?>" class="asientoClass">No asignado</td>
        <td><input id="<?php echo "sel".$i ?>" type="radio" name="selection" <?php if($i==1) echo "checked"; ?> onclick="setSelection(<?php echo $i; ?>)"></td>
      </tr>

      <?php } ?>
    </tbody>
  </table>
  <form method="POST" action="php/insercionPasajeros.php">
  	
    <input type="hidden" id="extraAsiento" name="extraAsiento" value="test"> 
  	<?php 
  	for($i=1; $i<=$numPasajeros; $i++){ 
  		echo "<input type=\"hidden\" name=\"asientoName".$i."\" id=\"asientoName".$i."\">";
  	}  	
  	?> 
  	<input type="hidden" value="<?php echo $origen; ?>" name="origen"> 
    <input type="hidden" value="<?php echo $destino; ?>" name="destino"> 
    <input type="hidden" value="<?php echo $precio; ?>" name="precio">
    <?php 
       if($tipoVuelo == "redondo"){  
    ?>  
    
    <input type="hidden" value="<?php echo $partidaRedondo; ?>" name="partidaRedondo">   
    <input type="hidden" value="<?php echo $llegadaRedondo; ?>" name="llegadaRedondo"> 
    <input type="hidden" value="<?php echo $horaPartidaRedondo; ?>" name="horaPartidaRedondo"> 
    <input type="hidden" value="<?php echo $horaLlegadaRedondo; ?>" name="horaLlegadaRedondo"> 
    
   <?php 
    }
    ?>  
   
  	<input type="submit">
  </form>
		</div>
	</div>
	<div class="col-md-6" id="asientos">
		<div class="raw simbology">
			<h3>Simbologia</h3>
		</div>
		<div class="testRaw">
			<div class="availableTest itemTest">
			</div>
			<label>Disponible</label>
		</div>
		<div class="testRaw">
			<div class="unavailableTest itemTest">
			</div>
			<label>No disponible</label>
		</div>
		<div class="testRaw">
			<div class="selectedTest itemTest">
			</div>
			<label>Seleccionado</label>
		</div>
		<div class="raw">
			<div id="asientosContainer">
				<div id="asientosLeft" class="asientos">
					<!--Se cargan los asientos aqui por js o php-->

					<?php 
					for($i = 1; $i <= 30 ; $i++) {
						if(isset($asientosOcupados)){
							$asientoOcupaso = false;
							for($x=0;$x<count($asientosOcupados);$x++){
								if($asientosOcupados[$x]==$i){
									$status = "unavailable";
									$event="";
									$asientoOcupaso = true;
									break;
								}
							}
							if(!$asientoOcupaso) {
								$event = "onclick=\"selectOrUnselect(this)\"";
								$status="available";
							}
						}
						else{
							$status = "available";
							$event = "onclick=\"selectOrUnselect(this)\"";
						}
						echo "<div class=\"item $status\" $event id=\"place".$i."\">".$i."</div>";
					}
					?>

				</div>
				<div id="asientosRight" class="asientos">
					<!--Se cargan los asientos aqui por js o php-->
					<?php 
					for($i = 31; $i <= 60 ; $i++) {
						if(isset($asientosOcupados)){
							$asientoOcupaso = false;
							for($x=0;$x<count($asientosOcupados);$x++){
								if($asientosOcupados[$x]==$i){
									$status = "unavailable";
									$event="";
									$asientoOcupaso = true;
									break;
								}
							}
							if(!$asientoOcupaso) {
								$event = "onclick=\"selectOrUnselect(this)\"";
								$status="available";
							}
						}
						else{
							$status = "available";
							$event = "onclick=\"selectOrUnselect(this)\"";
						}
						echo "<div class=\"item $status\" $event id=\"place".$i."\">".$i."</div>";
					}
					?>
				</div>	
			</div>
		</div>
	</div>
</div>
</body>
</html>