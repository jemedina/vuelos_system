<!DOCTYPE html>
<html>
<?php 
    $num_pasajeros=$_POST["num_pasajeros"];
    $partida = $_POST["partida"];
    $llegada = $_POST["llegada"];
    $origen = $_POST["origen"];
    $destino = $_POST["destino"];
?>    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C:\Users\Edgardo\Documents\Bootstrap\registrarPasajeroTitular\Formulario_Registro_titular</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/regTit.css">
      <link rel="stylesheet" href="css/pasajero.css">
    <script>
        var costobase=2470;
     var sumaTotal=0;     
     function sumar(check){ 
      
         if(check.checked){ 
         sumaTotal+=parseInt(check.value);
         }else{ 
         sumaTotal-=parseInt(check.value);
         }
     //alert(sumaTotal); 
         var Total=sumaTotal+costobase
        $("#total").val(Total);
        $("#costoBase").val(costobase);
        $("#costoExtra").val(sumaTotal);
     } 
     
    </script>
</head>

<body>
<form name="pasajeros" method="post" action="php/insercionPasajeros.php">  
   <div class="col-md-8"> 
   

            

                   <div class="container-fluid recuadroTitular">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row espacio">
                                <div class="col-md-4 lead textoTitular">
                                    <label><strong>Nombre del titular</strong></label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" required="" type="text" id="nombreTitular" name="nombreTitular">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 textoTitular">
                                    <label class="lead"><strong>Email </strong></label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" required="" type="text" id="email" name="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 textoTitular">
                                    <label class="lead"><strong>Teléfono </strong></label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" required="" type="text" id="telefono" name="telefono">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 textoTitular">
                                    <label class="lead"><strong>Dirección </strong></label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" required="" type="text" id="direccion" name="direccion">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 recuadroDerechoTitular">
                            <div class="checkbox lead textoLateral opcionesLaterales">
                                <label>
                                    <input onclick="sumar(this);" value="500" type="checkbox"><strong>Maleta Extra</strong></label>
                            </div>
                            <div class="checkbox lead textoLateralTitular opcionesLateralesTitular">
                                <label>
                                    <input onclick="sumar(this);" value="1000" type="checkbox" class="lead"><strong>Proridad de abordaje</strong></label>
                            </div>
                            <div class="checkbox lead textoLateralTitular opcionesLateralesTitular">
                                <label>
                                    <input onclick="sumar(this);" value="1500" type="checkbox"><strong>Equipaje deportivo o instrumentos musicales</strong></label>
                            </div>
                        </div>
                    </div> 
                    </div>
                    <!--<input type="hidden" value="1" name="numParams">--> 
                    <?php 
                   
                    for($i=0; $i<$num_pasajeros-1 ; $i++){ 
                    //echo "<input type='hidden' value='$i' name='numParams'>";                     
                    ?>
                     
                     <div class="container-fluid recuadro">
                    <div class="row espacio">
                       <input type="hidden" name="<?php echo "pasajero-$i";?>">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 lead texto">
                                    <label><strong>Nombre Completo</strong></label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" required="" type="text" name="nombrePasajero">
                                    <!--$arr[]=$_POST["pasajero".$i];-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 lead textoLateral">
                                    <div class="checkbox">
                                        <label>
                                            <input onclick="sumar(this);" value="500" type="checkbox"><strong>Maleta Extra</strong></label>
                                    </div>
                                </div>
                                <div class="col-md-4 lead textoLateral">
                                    <div class="checkbox">
                                        <label>
                                            <input onclick="sumar(this);" value="1000" type="checkbox"><strong>Prioridad de abordaje</strong></label>
                                    </div>
                                </div>
                                <div class="col-md-4 lead textoLateral">
                                    <div class="checkbox">
                                        <label>
                                            <input onclick="sumar(this);" value="1500" type="checkbox"><strong>Equipo deportivo o Instrumentos musicales</strong></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <?php
                    }
                    ?>
                <input type="hidden" value="" id="<?php echo $_POST["costoBase"]?>" name="costoBase">    
                <input type="hidden"  id="costoExtra" name="costoExtra">   
                <input type="hidden" value="<?php echo "$numPasajeros"; ?>" id="numPasajeros" name="numPasajeros">    
                <input type="hidden" value="<?php echo $_POST["tipoVuelo"]; ?>" id="tipoVuelo" name="tipoVuelo">  
                <input type="hidden" value="<?php echo $_POST["id_vuelo_disponible"]; ?>" id="id_vuelo" name="id_vuelo">   
                <input type="submit" class="boton" value="Continuar"> 
              
        
   
   
   
   </div> 
   <div class="col-md-4"> 
   
     <div class="col-md-6 col-sm-7 col-xs-12">
            <div>
                <div>
                    <p class="text-center lead"><strong><?php echo $partida ?></strong></p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label id="horaPartidaSencillo" for="cardExpiry" class="lead">17:40 hrs</label>
                    </div>
                    <div class="col-md-8">
                        <input id="origenSencillo" class="input-lg lead" type="text" value="<?php echo $origen; ?>" readonly="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label id="horaLLegadaSencillo" for="cardExpiry" class="lead">18:30 hrs</label>
                    </div>
                    <div class="col-md-8">
                        <input id="destinoSencillo" class="input-lg lead" type="text" value="<?php echo $destino; ?>" readonly="">
                    </div>
                </div>
            </div>
            <hr>
            <?php if($llegada != "") { ?>
            <div>
                <div>
                    <p class="text-center lead"><strong><?php echo $llegada ?></strong></p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label id="horaPartidaRedondo" for="cardExpiry" class="lead">20:00 hrs</label>
                    </div>
                    <div class="col-md-8">
                        <input id="origenRedondo" class="input-lg lead" type="text" value="Guadalajara" readonly="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label id="horaLLegadaRedondo" for="cardExpiry" class="lead">02:30 hrs</label>
                    </div>
                    <div class="col-md-8">
                        <input id="destinoRedondo" class="input-lg lead" type="text" value="Aguascalientes" readonly="">
                    </div>
                </div>
            </div>
            <hr>
            <?php 
            }

            ?>
            <div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="cardExpiry" class="lead">Costo x Pasajero</label>
                    </div>
                    <div class="col-md-7">
                        <input id="costoxPasajero" class="input-lg lead" type="text" value="1900" readonly="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="cardExpiry" class="lead">Total: </label>
                    </div>
                    <div class="col-md-7">
                        <div class="input-group">
                            <div class="input-group-addon"><span>$ </span></div>
                            <input id="total" type="text" value="24700" readonly="" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
   
   <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <label class="lead"><strong>Selecciona tu método de pago</strong></label>
                </div>
            </div>
          
             <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="radio">
                        <label>
                            <input id="tarjeta" name="opcion"  value="pago con tarjeta" type="radio">Tarjeta</label>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="radio">
                        <label>
                            <input id="sucursal" name="opcion" value="pago en sucursal" type="radio">Sucursal</label>
                    </div>
                </div>
            </div>
            
            
           
        </div>
    </div>
   
   
   
   
   </div> 
    
</form>      
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>