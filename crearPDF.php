<?php
error_reporting(E_ALL);
ini_set('error_reporting', 1);
require('fpdf/fpdf.php');
require("php/DB.php");
$pdf=new FPDF();
    $pdf->AddPage();
    $servidor="localhost";
    $usuario="eduardo";
    $cont="holamundo";
    $bd="VUELOS_DB";
    
    $folio=$_POST['folio'];
    $folio=1;
    $conn=new DB();
    //include("DB.php");
    //$db=new DB();
    //$resp=DB->query();
    $resp = $conn->query("select * from RESERVA where folio = $folio");

if ($fila = $resp->fetch_row()) {

    $id=$fila[1];
    
    $resp2 = $conn->query("select * from VUELOS_DISPONIBLES where id = $id ");
    
    if($fila2=$resp2->fetch_row()){

        $hora_s=$fila2[2];
        $hora_v=$fila2[3];
        $fecha_s=$fila2[4];
        $fecha_v=$fila2[5];
        $id_esp=$fila2[1];
        if($fila2[7]!=null){
            $hora_s_r=$fila[7];
            $hora_v_r=$fila[8];
            $fecha_s_r=$fila[9];
            $fecha_v_r=$fila[10];
        }else{
            $hora_s_r="N/A";
            $hora_v_r="N/A";
            $fecha_s_r="N/A";
            $fecha_v_r="N/A";
        }
        
        $resp3 = $conn->query("select * from VUELOS_ESPECIFICOS where id ='$id_esp'");
        
        if($fila3=$resp3->fetch_row()){
        
            $origen=$fila3[1];
            $destino=$fila[2];
            $escala=$fila[3];
        }
        $origen = $conn->query("select nombre from AEREOPUERTOS where id ='$origen'");
        $destino = $conn->query("select nombre from AEREOPUERTOS where id ='$destino'");
        $escala = $conn->query("select nombre from AEREOPUERTOS where id ='$escala'");
    }
    ##echo "<br>Nombre: ".$fila[2];
    ##echo "<br>Usuario: ".$fila[0];
    if($escala==null){
        $escala="";
    }
    ##echo "<br>Contraseña: ".$fila[1];
    $costo=$fila[4]+$fila[5];
    if($fecha_s_r!=null){
        $texto="Folio: ".$folio."\nCliente: ".$fila[7]."\nNumero de pasajeros: ".$fila[2]."\nTipo de vuelo: ".$fila[3]."\nTotal: ".$costo."\nMetodo de pago: ".$fila[6]."\nOrigen: ".$origen."\nDestino: ".$destino."\nEscalas en: ".$escala."\nFecha salida: ".$fecha_s."\nFecha LLegada: ".$fecha_v."\nHora salida: ".$hora_s."\nHora LLegada: ".$hora_v."\nRegreso:\nFecha salida: ".$fecha_s_r."\nFecha LLegada: ".$fecha_v_r."\nHora salida: ".$hora_s_r."\nHora LLegada: ".$hora_v_r."\nTotal: ".$costo;
    }else{
        $texto="Folio: ".$folio."\nCliente: ".$fila[7]."\nNumero de pasajeros: ".$fila[2]."\nTipo de vuelo: ".$fila[3]."\nTotal: ".$costo."\nMetodo de pago: ".$fila[6]."\nOrigen: ".$origen."\nDestino: ".$destino."\nEscala: ".$escala."\nFecha salida: ".$fecha_s."\nFecha LLegada: ".$fecha_v."\nHora salida: ".$hora_s."\nHora LLegada: ".$hora_v."\nTotal: ".$costo;
    }
    
 
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(50,10,'Datos del Vuelo',1,1,'L');
 
    $pdf->Cell(50,5,'salto de linea',1,1);
 
    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(190,5,$texto);
 
    $pdf->Output();
}
?>
