<?php 
include("DB.php"); 
$noFolio=$_POST["noFolio"]; 


$db = new DB();

    $CONSULTAR_FOLIO= "SELECT folio FROM RESERVA WHERE folio='$noFolio'"; 
    echo $CONSULTAR_FOLIO; 
    $consultaFolio = $db->query($CONSULTAR_FOLIO);
    
    if($consultaFolio->num_rows == 0){ 
    header("Location: ../Offers.html");
    }else{ 
    header("Location:../crearPDF.php?folio=$noFolio");   
    }




?>