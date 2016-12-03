<?php 
session_start(); 
$numPasajeros=$_SESSION["numPasajeros"]; 
$costoBase=$_SESSION["costoBase"];
$costoExtra=$_SESSION["costoExtra"];
$total=$_SESSION["total"];
$nombreTitular=$_SESSION["nombreTitular"];
$email=$_SESSION["email"];
$direccion=$_SESSION["direccion"];
$telefono=$_SESSION["telefono"];
$metodoPago=$_SESSION["opcion"];
$tipoVuelo=$_SESSION["tipoVuelo"];
$idVuelo=$_SESSION["id_vuelo_disponible"];
for($i=0; $i<$numPasajeros-1; $i++){ 
  $arr[]=$_SESSION["pasajero-".$i];
}

$db = new DB(); 
$SACAR_VUELO_DISPONIBLE= "SELECT * FROM VUELOS_DISPONIBLES WHERE id='$idVuelo'"; 
    $consulta = $db->query($SACAR_VUELO_DISPONIBLE);
    
    $vuelo = $consulta->fetch_array();

    $id = $vuelo['id'];
    $id_vuelo_especifico = $vuelo['id_vuelo_especifico']; 
    $hora_salida = $vuelo['hora_salida'];
    $hora_llegada = $vuelo['hora_llegada'];
    $fecha_salida = $vuelo['fecha_salida'];
    $fecha_llegada = $vuelo['fecha_llegada'];
   
$SACAR_VUELO_ESPECIFICO= "SELECT * FROM VUELOS_ESPECIFICOS WHERE id_vuelo_especifico='$id_vuelo_especifico'"; 
$consulta2 = $db->query($SACAR_VUELO_ESPECIFICO); 
$info_vuelo = $consulta2->fetch_array(); 

 $origen = $info_vuelo['origen'];
 $destino = $info_vuelo['destino'];

$SACAR_ORIGEN= "SELECT nombre FROM AEROPUERTOS WHERE id='$origen'"; 
$consultaOrigen = $db->query($SACAR_ORIGEN); 
$AERO_ORIGEN = mysqli_fetch_array($consultaOrigen); 

$SACAR_DESTINO= "SELECT nombre FROM AEROPUERTOS WHERE id='$destino'"; 
$consultaDESTINO = $db->query($SACAR_DESTINO); 
$AERO_DESTINO = mysqli_fetch_array($consultaDestino);


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C:\Users\Jesus\Documents\Boostrap Studio\DetallesPago</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="css/bootstrap/fonts/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="col-md-4 col-md-offset-1 col-sm-5 col-xs-12">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="panel-title-text">Detalles de Pago</span><img class="img-responsive panel-title-image" src="images/accepted_cards.png"></h3></div>
                <div class="panel-body">
                    <form name="formaPago" id="payment-form" method="post" action="php/insercionTarjeta.php">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="cardNumber">Número de tarjeta de crédito</label>
                                    <div class="input-group">
                                        <input class="form-control" type="tel" required="" placeholder="Ingrese no. de tarjeta de crédito" id="cardNumber">
                                        <div class="input-group-addon"><span><span class="fa fa-credit-card"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7">
                                <div class="form-group">
                                    <label class="control-label" for="cardExpiry"><span class="hidden-xs">Fecha de expiración</span><span class="visible-xs-inline">EXP </span></label>
                                    <input class="form-control" type="tel" required="" placeholder="MM / AA" id="cardExpiry">
                                </div>
                            </div>
                            <div class="col-xs-5 pull-right">
                                <div class="form-group">
                                    <label class="control-label" for="cardCVC">cv code</label>
                                    <input id="cvc" class="form-control" type="tel" required="" placeholder="CVC" id="cardCVC">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="couponCode">Código de descuento</label>
                                    <input class="form-control" type="text" id="couponCode">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-success btn-block btn-lg" type="submit">Pagar </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-7 col-xs-12">
            <div>
                <div>
                  <?php 
                    
                    echo "<p class='text-center lead'><strong>$fecha_salida</strong></p>"; 
                
                  ?>
                </div>
                <div class="row">
                    <div class="col-md-4">
                       <?php 
                        
                        echo "<label id='horaPartidaSencillo' for='cardExpiry' class='lead'>$hora_salida hrs</label>";
                        ?>
                        
                    </div>
                    <div class="col-md-8">
                       <?php 
                        echo "<input id='origenSencillo' class='input-lg lead' type='text' value='$AERO_ORIGEN' readonly=''>";
                        ?>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                       <?php 
                        echo "<label id='horaLLegadaSencillo' for='cardExpiry' class='lead'>$hora_llegada hrs</label>" 
                       ?>        
                    </div>
                    <div class="col-md-8">
                        <?php 
                        echo "<input id='destinoSencillo' class='input-lg lead' type='text' value='$AERO_DESTINO' readonly=''>";
                        ?>   
                    </div>
                </div>
            </div>
            <?php 
              if($tipoVuelo=="redondo"){            
            ?>
            <hr>
            <div>
                <div>
                    <p class="text-center lead"><strong>viernes, 9 Diciembre 2016</strong></p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label id="horaPartidaRedondo" for="cardExpiry" class="lead">20:00 hrs</label>
                    </div>
                    <div class="col-md-8">
                       <?php 
                        echo "<input id='origenRedondo' class='input-lg lead' type='text' value='$AERO_DESTINO' readonly=''>";
                        ?>   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label id="horaLLegadaRedondo" for="cardExpiry" class="lead">02:30 hrs</label>
                    </div>
                    <div class="col-md-8">
                        <?php 
                        echo "<input id='destinoRedondo' class='input-lg lead' type='text' value='$AERO_DESTINO' readonly=''>";
                        ?>   
                    </div>
                </div>
            </div>
        <?php 
           }
        ?> 
            <hr>
            <div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="cardExpiry" class="lead">Costo x Pasajero</label>
                    </div>
                    <div class="col-md-7">
                        <?php 
                        echo "<input id='costoxPasajero' class='input-lg lead' type='text' value='$costoBase' readonly=''>";
                        ?>   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="cardExpiry" class="lead">Total: </label>
                    </div>
                    <div class="col-md-7">
                        <div class="input-group">
                            <div class="input-group-addon"><span>$ </span></div>
                             <?php 
                             echo "<input id='total' class='input-lg lead' type='text' value='$costoExtra' readonly='' class='form-control'>";
                              ?>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
                
                  
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>