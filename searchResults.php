
<?php 
	//Recolectar parametros de busqueda
	include("php/DB.php");
	if(!isset($_POST["origen"]) || !isset($_POST["destino"]) || !isset($_POST["partida"]) || !isset($_POST["llegada"]) || !isset($_POST["num_pasajeros"]) || !isset($_POST["clase"]))
	{
		header("Location: ../index?error=1");
	}
	$db = new DB();
	$origen = $_POST["origen"];
	$destino = $_POST["destino"];
	$partida = $_POST["partida"];
	$llegada = $_POST["llegada"];
	$numPasajeros = $_POST["num_pasajeros"];
	$tipoVuelo = $_POST["tipoVuelo"];
	$clase = $_POST["clase"];	
	$filter1 = "SELECT * FROM VUELOS_DISPONIBLES JOIN VUELOS_ESPECIFICOS WHERE VUELOS_ESPECIFICOS.origen = $origen AND VUELOS_ESPECIFICOS.destino=$destino;";
	$res = $db->query($filter1);


	$sqlGetAriportsById = "SELECT * FROM AEREOPUERTOS WHERE id = ";

	$ariport1 = $db->query($sqlGetAriportsById.$origen)->fetch_array()["nombre"];
	$ariport2 = $db->query($sqlGetAriportsById.$destino)->fetch_array()["nombre"];
	//die($origen."-".$destino."-".$partida);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Resultados de Busqueda</title>
	<?php include("php/commonImports.php"); ?>
	<link rel="stylesheet" type="text/css" href="css/searchResults.css">
</head>
<body>
	<section id="searchResults" class="col-md-8 col-md-offset-2
	col-sm-12">
		<header class="raw text-center headerResults">
			Resultados de busqueda (<?php echo $res->num_rows." resultados" ?>)
		</header>
		<?php 
		while($data = $res->fetch_array()) {
			/*
				num_pasajeros
				costoBase
				tipoVuelo
				id_vuelo_disponible
			*/	
		?> 
		<form action="registroPasajeros.php" method="POST">
		<input type="hidden" name="num_pasajeros" value="<?php echo $numPasajeros; ?>">
		<input type="hidden" name="costoBase" value="<?php echo $data["precio"]; ?>">
		<input type="hidden" name="tipoVuelo" value="<?php echo $tipoVuelo; ?>">
		<input type="hidden" name="id_vuelo_disponible" value="<?php echo $data["id_vuelo_especifico"] ?>">
		<input type="hidden" name="partida" value="<?php echo $partida ?>">
		<input type="hidden" name="llegada" value="<?php echo $llegada ?>">
		<input type="hidden" name="partidaRedondo" value="<?php echo $data["fecha_salida_redondo"] ?>">
		<input type="hidden" name="llegadaRedondo" value="<?php echo $data["fecha_llegada_redondo"] ?>">
		<input type="hidden" name="origen" value="<?php echo $ariport1 ?>">
		<input type="hidden" name="destino" value="<?php echo $ariport2 ?>">

		<article class="searchItem row">
			<div class="raw">
				<div class="searchItemInfo col-md-8">
					<div class="raw">
						<div class="raw">
						<div class="flyName row">
							De <?php echo $ariport1." a ".$ariport2 ?>
						</div>
						<div class="raw">
							<div class="col-sm-6">
								<span class="raw flyItem">Horario:</span>
								<ul>
									<li>De <span class="strong">
										<?php echo $data["hora_salida"]; ?>
									</span> a <span class="strong">
										<?php echo $data["hore_llegada"]; ?>
											
										</span></li>
									
								</ul>
							</div>
							<div class="col-sm-6">
								<div class="raw">
									<span class="flyItem">
										Escala:
									</span>
								</div>
								<span class="flyEscala">
									<?php 

										$escala = $db->query($sqlGetAriportsById.$data["escala"]);
										if($escala) {
											echo $escala->fetch_array()["nombre"];
										}
										else{
											echo "N/A";
										}
										//if($escala != "") {
											
										//}
										//else {
										//	echo "N/A";
										//}
									?>
								</span>
							</div>
						</div>
					</div>
					<div class="raw">
						<div class="raw">
							<span class="flyItem" style="margin-left:15px">
								Costo: $
								<?php echo $data["precio"] ?>
							</span>
						</div>
						
					</div>
					</div>
				</div>
				
				<div class="searchItemBilling col-md-4 col-sm-12">
					<div class="raw text-center">
						<span class="otherBilling">
							Otros precios
						</span>
					</div>
					<div class="raw billings">
						<span class="billingDay">
							Ayer: <span class="flyCost">
								$<?php echo $data["precio"]-100; ?>
							</span>
						</span>
					</div>
					<div class="raw billings">
						<span class="billingDay">
							Mañana: <span class="flyCost">
								$<?php echo $data["precio"]+100; ?>
							</span>
						</span>
					</div>
				</div>
			</div>

				<div class="raw text-center">
					<input type="submit" value="IR" class="btn btn-success col-md-4 col-md-offset-4" style="margin-bottom:10px">
				</div>
		</article>

		</form>
		<?php
        }
        ?>

	</section>
</body>
</html>