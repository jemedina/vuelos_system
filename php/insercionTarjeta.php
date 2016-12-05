<?php 
include("DB.php");
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
    $INSERT_TITULAR= "INSERT INTO CLIENTES (id,email,telefono,domicilio,titular) VALUES (NULL,'$email','$telefono','$direccion','$nombreTitular')";
    $insercionTitular = $db->query($INSERT_TITULAR);
    $SACAR_ID_CLIENTE= "SELECT id FROM CLIENTES WHERE titular='$nombreTitular'"; 
    $consultaID = $db->query($SACAR_ID_CLIENTE);
    $id = mysqli_fetch_array($consultaID);

    $RESERVAR = "INSERT INTO RESERVA (folio,id_vuelo_disponible,nro_pasajeros,tipo_vuelo,costo, costo_extra, metodo_pago, id_cliente) VALUES (NULL,'$idVuelo','$numPasajeros','$tipoVuelo','$costoBase','$costoExtra','$metodoPago','$id');";
        
    $SACAR_FOLIO= "SELECT folio FROM RESERVA WHERE id_cliente='$id'"; 
    $consultaFolio = $db->query($SACAR_FOLIO);
    $folio = mysqli_fetch_array($consultaFolio);

    for($i=0; $i<count($arr); i++){ 
    $INSERT_OTROS= "INSERT INTO OTROS_PASAJEROS (folio_reserva,nombre) VALUES ('$folio','$arr[$i]')";
    $insercionOtros = $db->query($INSERT_OTROS);
    }
     
      header("Location:../crearPDF.php?folio=$folio");    
    ?>