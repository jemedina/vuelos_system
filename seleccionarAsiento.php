<?php 
$numPasajeros=$_POST["numPasajeros"];
$costoBase=$_POST["costoBase"];
$costoExtra=$_POST["costoExtra"];
$total=$_POST["total"];
$nombreTitular=$_POST["nombreTitular"];
$email=$_POST["email"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$metodoPago=$_POST["opcion"];
$tipoVuelo=$_POST["tipoVuelo"];
$idVuelo=$_POST["id_vuelo_disponible"];
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
for($i=0; $i<$numPasajeros-1; $i++){ 
  $_SESSION["pasajero-".$i]=$arr[$i];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Selecciona tu asiento</title>
	<script type="text/javascript">
		var n = <?php echo $numPasajeros ?>;
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
		<div class="raw" id="travelInfo">
			<span id="origen">Guadalajara (JAL)</span> a <span id="destino">La paz (LAP)</span>
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
  <form method="POST" action="insercionPasajeros.php">
  	<?php 
  	for($i=1; $i<=$numPasajeros; $i++){ 
  		echo "<input type=\"text\" name=\"asientoName".$i."\" id=\"asientoName".$i."\">";
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
						echo "<div class=\"item available\" onclick=\"selectOrUnselect(this)\" id=\"place".$i."\">".$i."</div>";
					}
					?>

				</div>
				<div id="asientosRight" class="asientos">
					<!--Se cargan los asientos aqui por js o php-->
					<?php 
					for($i = 1; $i <= 30 ; $i++) {
						echo "<div class=\"item available\" onclick=\"selectOrUnselect(this)\" id=\"place".$i."\">".$i."</div>";
					}
					?>
				</div>	
			</div>
		</div>
	</div>
</div>
</body>
</html>