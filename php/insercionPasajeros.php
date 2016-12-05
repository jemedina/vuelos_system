
<?php 
include("DB.php");
session_start(); 
$numPasajeros=$_SESSION["numPasajeros"]; 
//$numPasajeros=2;//Test
$costoBase=$_SESSION["costoBase"];
//$costoBase=200;
$costoExtra=$_SESSION["costoExtra"];
//$costoExtra=500;
$total=$_SESSION["total"];
//$total=1200;
$nombreTitular=$_SESSION["nombreTitular"];
//$nombreTitular="juan";
$email=$_SESSION["email"];
$direccion=$_SESSION["direccion"];
//$direccion="kjh kuhuk hui";
$telefono=$_SESSION["telefono"];
//$telefono="123456";
$metodoPago=$_SESSION["opcion"];
//$metodoPago = "Cuerpo";//Test
$tipoVuelo=$_SESSION["tipoVuelo"];
$idVuelo=$_SESSION["id_vuelo_disponible"];
for($i=0; $i<$numPasajeros-1; $i++){ 
  $arr[]=$_POST["pasajero-".$i];
  $_SESSION["pasajero-".$i] = $arr[$i];
}

for($i=1; $i<($numPasajeros+1); $i++)
{
    $asientos[]=$_POST["asientoName".$i];
}
    $db = new DB();
    $INSERT_TITULAR= "INSERT INTO CLIENTES (id,email,telefono,domicilio,titular) VALUES (NULL,'$email','$telefono','$direccion','$nombreTitular')";
    $insercionTitular = $db->query($INSERT_TITULAR);
    
    $SACAR_ID_CLIENTE= "SELECT id FROM CLIENTES WHERE titular='$nombreTitular'"; 
    $consultaID = $db->query($SACAR_ID_CLIENTE);
    $id = mysqli_fetch_array($consultaID)["id"];  
    if( $metodoPago=="pago en sucursal" ) { 
    
    $RESERVAR = "INSERT INTO RESERVA (folio,id_vuelo_disponible,nro_pasajeros,tipo_vuelo,costo, costo_extra, metodo_pago, id_cliente) VALUES (NULL,'$idVuelo','$numPasajeros','$tipoVuelo','".($total-$costoExtra)."','$costoExtra','$metodoPago','$id');";
    $res = $db->query($RESERVAR);
    $SACAR_FOLIO= "SELECT folio FROM RESERVA WHERE id_cliente=$id order by folio desc"; 
    echo "<br>".$SACAR_FOLIO;
    $consultaFolio = $db->query($SACAR_FOLIO);
    //var_dump($consultaFolio);
    $folio = mysqli_fetch_array($consultaFolio)["folio"];
    //var_dump($folio);
    if(isset($arr)) {
        for($i=0; $i<count($arr); $i++){ 
        $INSERT_OTROS= "INSERT INTO OTROS_PASAJEROS (folio_reserva,nombre) VALUES ('$folio','$arr[$i]')";
        $insercionOtros = $db->query($INSERT_OTROS);
        }
    }
    foreach($asientos as $asiento) {
        $INSERT_ASIENTOS = "INSERT INTO DETALLE_ASIENTOS (id_vuelo_disponible,id_titular,numero,estado) VALUES ($idVuelo,$id, $asiento, 1)";
        echo $INSERT_ASIENTOS."<br>";
        $db->query($INSERT_ASIENTOS);
     }
      header("Location: ../crearPDF.php?folio=$folio");   
     session_destroy(); 
    }else{ 
        
        
    
    header("Location: ../DetallesPagos.php?costoBase=$costoBase&total=$total&tipoVuelo=$tipoVuelo&id_vuelo_disponible=$idVuelo");  
        
    
    
    }
    
    
?>