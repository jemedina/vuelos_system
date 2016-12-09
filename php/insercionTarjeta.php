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

$nuevoTotal=$_SESSION["nuevoTotal"]; 
for($i=1; $i<($numPasajeros+1); $i++)
{
    $asientos[] = $_SESSION["infoAsientos-".$i];
}

	$db = new DB();
    $INSERT_TITULAR= "INSERT INTO CLIENTES (id,email,telefono,domicilio,titular) VALUES (NULL,'$email','$telefono','$direccion','$nombreTitular')";
    $insercionTitular = $db->query($INSERT_TITULAR);
    $SACAR_ID_CLIENTE= "SELECT id FROM CLIENTES WHERE titular='$nombreTitular'"; 
    $consultaID = $db->query($SACAR_ID_CLIENTE);
    $id = mysqli_fetch_array($consultaID)["id"];

    $RESERVAR = "INSERT INTO RESERVA (folio,id_vuelo_disponible,nro_pasajeros,tipo_vuelo,costo, costo_extra, metodo_pago, id_cliente) VALUES (NULL,'$idVuelo','$numPasajeros','$tipoVuelo','$nuevoTotal','$costoExtra','$metodoPago','$id');";
    $db->query($RESERVAR);
    $SACAR_FOLIO= "SELECT folio FROM RESERVA WHERE id_cliente='$id'"; 
    $consultaFolio = $db->query($SACAR_FOLIO);
    //die($SACAR_FOLIO);
    $folio = mysqli_fetch_array($consultaFolio)["folio"];
    if(isset($arr)) {
        for($i=0; $i<count($arr); $i++){ 
            $INSERT_OTROS= "INSERT INTO OTROS_PASAJEROS (folio_reserva,nombre) VALUES ('$folio','$arr[$i]')";
            $insercionOtros = $db->query($INSERT_OTROS);
        }
    }
     
     
      foreach($asientos as $asiento) {
        $INSERT_ASIENTOS = "INSERT INTO DETALLE_ASIENTOS (id_vuelo_disponible,id_titular,numero,estado) VALUES ($idVuelo,$id, $asiento, 1)";
       // echo $INSERT_ASIENTOS."<br>";
        $res = $db->query($INSERT_ASIENTOS);
        //var_dump($res);
     } 

     session_destroy();
     header("Location:../crearPDF.php?folio=$folio");    

    ?>