<?php  
include("php/DB.php");
$db = new DB();
$SQL_ALL_AIRPORTS = "SELECT * FROM AEREOPUERTOS";
$airports = $db->query($SQL_ALL_AIRPORTS);
while($airport = mysqli_fetch_array($airports)) {
    $airportsArray[] = $airport;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C:\Users\Jesus\Documents\Boostrap Studio\formadmin</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/altasVuelos.css">
    <script>
    function escalaChecked(){ 
        var isChecked = document.altaVuelos.escala.checked;
        if(!isChecked) {
            $("#escalas").attr("disabled","true");
        }
        else {
            $("#escalas").removeAttr("disabled");
        }
        } 
    </script>
</head>

<body class="bg-primary">
    <div>
        <div class="container-fluid">
            <h1 class="text-center text-primary bg-danger">Control Administrativo</h1></div>
            <div class="container-fluid">
                <div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="container-fluid">
                                <h1 class="text-center">Alta Destinos</h1>
                                <form name="altasDestinos" method="post" action="admin_altas.php">
                                    <label>Destino </label>
                                    <input id="destino" name="destino" class="form-control" type="text">
                                    <div class="text-center">
                                        <button class="btn btn-info btn-lg" type="submit">Agregar </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="container-fluid">
                                <h1 class="text-center">Alta de Vuelos</h1>
                                <form name="altaVuelos" method="post" action="admin_crea_vuelos.php">
                                    <div class="form-group">
                                        <label class="control-label">Origen </label>
                                    </div>
                                    <select id="origen" class="form-control" name="origen">
                                        <?php 
                                        for($i = 0 ; $i < count($airportsArray); $i++) {
                                            echo "<option value='".$airportsArray[$i]["id"]."'>".$airportsArray[$i]["nombre"]."</option>";
                                        }   
                                        ?>
                                    </select>
                                    <div class="form-group">
                                        <label class="control-label">Destino </label>
                                        <select id="destino" class="form-control" name="destino">
                                            <?php 
                                            for($i = 0 ; $i < count($airportsArray); $i++) {
                                               echo "<option value='".$airportsArray[$i]["id"]."'>".$airportsArray[$i]["nombre"]."</option>";
                                           }     
                                           ?>
                                       </select>
                                   </div>
                                   <div class="form-group">
                                    <div class="checkbox">
                                        <label class="control-label">
                                            <input value="escala" name="escala" id="escala" type="checkbox" onclick="escalaChecked()">Escalas</label>
                                        </div>



                                        <select id="escalas" name="escalas" disabled="true" class="form-control">
                                            <?php 
                                            for($i = 0 ; $i < count($airportsArray); $i++) {
                                                echo "<option value='".$airportsArray[$i]["id"]."'>".$airportsArray[$i]["nombre"]."</option>";
                                            }   
                                            ?>  
                                        </select>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-info btn-lg" type="submit">Agregar </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="container-fluid">
                                <h1 class="text-center">Consultar Clientes</h1>
                                <form name="consulta_cliente" method="post" action="PDFClientes.php">
                                    <label for="consulta_cliente">Nombre </label>
                                    <input class="form-control" type="text" name="nombre" id="nombre">
                                    <div class="text-center">
                                        <button class="btn btn-info btn-lg" type="submit">Consultar </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="container-fluid">
                                <h1 class="text-center">Buscar Vuelos</h1>
                                <form name="consulta_folio" method="GET" action="crearPDF.php" >
                                    <div class="form-group">
                                        <div class="col-md-2">
                                            <label class="control-label">Folio </label>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <input name="folio" id="folio" class="form-control" type="text">
                                    </div>
                                </form>
                                <div class="text-center">
                                    <button class="btn btn-info btn-lg" type="button">Buscar </button>
                                </div>
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