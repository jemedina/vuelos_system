<?php
	$error = 0;
	if(isset($_GET["error"])) {
		$error = $_GET["error"];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/adminLogin.css">
	<script src="js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<form id="mainForm" method="post" action="php/loginAdmin.php">
	<?php 
		if($error != 0) {
			echo "<div class=\"raw\">
	<label class= \"form-control\" style=\"background: red; color: white;\">Username o contraseña incorrectos</label>
	</div>";
		}
	?>
	<div class="raw" style="text-align: center;">
		<h2>Admin Login</h2>
	</div>
	<div class="raw">
		<label>Username</label>
		<input type="text" name="username" class="form-control" required>
	</div>
	<div class="raw">
		<label>Password</label>
		<input type="password" name="password" class="form-control" required>
	</div>
	<br>
	<div class="raw">
		<input type="submit" class="btn btn-danger form-control" value="Login">
	</div>
</form>
</body>
</html>