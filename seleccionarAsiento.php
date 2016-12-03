<?php 
$numPasajeros=$POST["numPasajeros"]; 
$costoBase=$POST["costoBase"];
$costoExtra=$POST["costoExtra"];
$total=$POST["total"];
$nombreTitular=$POST["nombreTitular"];
$email=$POST["email"];
$direccion=$POST["direccion"];
$telefono=$POST["telefono"];
$metodoPago=$POST["opcion"];
$tipoVuelo=$POST["tipoVuelo"];
$idVuelo=$POST["id_vuelo_disponible"];
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
	<link rel="stylesheet" type="text/css" href="css/asientos.css">
	<?php include("php/commonImports.php"); ?>
	<script type="text/javascript">
		var n = <?php echo $numPasajeros ?>;
	</script>
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
      <tr>
        <td>Pasajero 1</td>
        <td id="asiento1" class="asientoClass">No asignado</td>
        <td><input id="sel1" type="radio" name="selection" checked onclick="setSelection(1)"></td>
      </tr>
      <tr>
        <td>Pasajero 2</td>
        <td id="asiento2" class="asientoClass">No asignado</td>
        <td><input id="sel2" type="radio" name="selection" onclick="setSelection(2)"></td>
      </tr>
      <tr>
        <td>Pasajero 3</td>
        <td id="asiento3" class="asientoClass">No asignado</td>
        <td><input id="sel3" type="radio" name="selection" onclick="setSelection(3)"></td>
      </tr>
    </tbody>
  </table>
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