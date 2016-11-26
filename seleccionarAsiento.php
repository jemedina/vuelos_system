<!DOCTYPE html>
<html>
<head>
	<title>Selecciona tu asiento</title>
	<link rel="stylesheet" type="text/css" href="css/asientos.css">
	<?php include("php/commonImports.php"); ?>
	<script type="text/javascript">
		var n = 3;
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
				</div>
				<div id="asientosRight" class="asientos">
					<!--Se cargan los asientos aqui por js o php-->
				</div>	
			</div>
		</div>
	</div>
</div>
</body>
</html>