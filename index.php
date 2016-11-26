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
<html lang="en">
<head>
  <title>Buscar</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="css/slide.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>  
<script type="text/javascript" src="js/Cabin_400.font.js"></script>
<script type="text/javascript" src="js/tabs.js"></script> 
<script type="text/javascript" src="js/jquery.jqtransform.js" ></script>
<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="js/atooltip.jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">
	.main, .tabs ul.nav a, .content, .button1, .box1, .top { behavior:url(js/PIE.htc)}
</style>
<![endif]-->
<!--[if lt IE 7]>
	<div style=' clear: both; text-align:center; position: relative;'>
		<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0"  alt="" /></a>
	</div>
<![endif]-->
</head>
<body id="page3">
<div class="main">
<!--header -->
	<header>
		<div class="wrapper">
			<h1><a href="index.html" id="logo">Air lines</a></h1>
			<span id="slogan">Fast, Frequent &amp; Safe Flights</span>
			<nav id="top_nav">
				<ul>
					<li><a href="index.html" class="nav1">Home</a></li>
					<li><a href="#" class="nav2">Admin</a></li>
					<li><a href="Contacts.html" class="nav3">Contact</a></li>
				</ul>
			</nav>
		</div>
		<nav>
			<ul id="menu">
				<li><a href="index.html"><span><span>Buscar Vuelos</span></span></a></li>
				<li><a href="Offers.html"><span><span>Mi vuelo</span></span></a></li>
				<li><a href="destinos.html"><span><span>Destinos</span></span></a></li>
				<li class="end"><a href="Contacts.html"><span><span>contacto</span></span></a></li>
			</ul>
		</nav>
	</header>
<!-- / header -->
<!--content -->
	<section id="content">
		<div class="wrapper pad1">
			<article class="col1">
			    <div class="box1">
			        <div class="css-slideshow">
			            
                        <figure><img class="imagen" src="images/maleta.jpg" alt=""></figure>
                        <figure><img class="imagen" src="images/maleta2.jpg" alt=""></figure>
                        <figure><img class="imagen" src="images/maleta3.jpg" alt=""></figure>
                        <figure><img class="imagen" src="images/maleta.jpg" alt=""></figure>
                        <figure><img class="imagen" src="images/maleta2.jpg" alt=""></figure>
                        <figure><img class="imagen" src="images/maleta3.jpg" alt=""></figure>
                        <figure><img class="imagen" src="images/maleta.jpg" alt=""></figure>
                        <figure><img class="imagen" src="images/maleta2.jpg" alt=""></figure>
			            
			        </div>
			    </div>
			</article>
			<article class="col2">
				<form method="post" action="searchResults.php">
					<div class="tabs2">
							<ul class="nav">
								<li class="selected"><a>Vuelo</a></li>
							</ul>
							<div class="content">
								<div class="tab-content" id="Flight">
									<form id="form_5" class="form_5" method="post">
										<div>
											<div class="radio">
												<div class="wrapper">
													 <span class="left">Viaje redondo</span>
													 <input type="radio" name="redondo" value="redondo">
													 <span class="left">Viaje Sencillo</span>
													 <input type="radio" name="redondo" value="sencillo">
												</div>
											</div>
											<div class="pad">
												<div class="under">
													<div>
														<label for="Origen" class="">Origen</label>
														<br>
															<select class="input1" required name="origen" id="origen">
															<?php 
																for($i = 0 ; $i < count($airportsArray); $i++) {
																	echo "<option value='".$airportsArray[$i]["id"]."'>".$airportsArray[$i]["nombre"]."</option>";
																}		
															?>
															</select>
														<br>
														<label for="Origen" class="" >Destino</label>
                                                        <br>
                                                            <select class="input1" required name="destino" id="origen">
                                                       		<?php 
																for($i = 0 ; $i < count($airportsArray); $i++) {
																	echo "<option value='".$airportsArray[$i]["id"]."'>".$airportsArray[$i]["nombre"]."</option>";
																}		
															?>
                                                            </select>
                                                        <br>
													</div>
												</div>
												<div class="wrapper under">
													<label for="partida">partida</label>
													<input type="date" required name="partida" id="partida">
													<br>
													<br>
													<label for="venida">venida</label>
													<input type="date" required name="llegada" id="venida">
												</div>
												<div class="wrapper pad_bot1">
													<label class="left">Pasajeros</label>
													<div class="cols marg_right1">
														<div class="row">
															<input type="number" required name="num_pasajeros" class="input" value="1"  onblur="if(this.value=='') this.value='1'" onFocus="if(this.value =='1' ) this.value=''">
														</div>
														
													</div>
													<div class="cols">
														<div class="select1"><label for="clase" class="left">Clase</label>
														<select name="clase" required>
														    <option>Turista</option>
														    <option>Premier</option>
														</select>
														</div>
													</div>
													<input type="submit" class="button1" value="buscar">
													<!--<span class="right relative"><a href="#" class="button1" onClick="document.getElementById('form_5').submit()"><strong>Search</strong></a></span>-->
												</div>
											</div>
										</div>
									</form>
								</div>
								
								
							</div>
						</div>
					</article>
				</div>
				</form>
			</section>
			<!--content end-->
			<!--footer -->
			<footer>
                <div class="wrapper">
                    <ul id="icons">
                        <li><a href="#" class="normaltip" title="Facebook"><img src="images/icon1.jpg" alt=""></a></li>
                        <li><a href="#" class="normaltip" title="Delicious"><img src="images/icon2.jpg" alt=""></a></li>
                        <li><a href="#" class="normaltip" title="Stumble Upon"><img src="images/icon3.jpg" alt=""></a></li>
                        <li><a href="#" class="normaltip" title="Twitter"><img src="images/icon4.jpg" alt=""></a></li>
                        <li><a href="#" class="normaltip" title="Linkedin"><img src="images/icon5.jpg" alt=""></a></li>
                        <li><a href="#" class="normaltip" title="Reddit"><img src="images/icon6.jpg" alt=""></a></li>
                    </ul>
                    <div class="links">
                        <a rel="nofollow" href="http://www.uaa.mx/" target="_blank">UAA</a> designed by The Brothers<br>
                </div>
            </footer>
			<!--footer end-->
		</div>
<script type="text/javascript"> Cufon.now(); </script>
<script>
	jQuery(document).ready(function($) {
		$('.form_5').jqTransform({imgPath:'jqtransformplugin/img/'});	
	});
	$(document).ready(function() {
		tabs2.init();
	});
</script>
</body>
</html>
