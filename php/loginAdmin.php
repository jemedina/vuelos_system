<?php
	if(!isset($_POST["username"]) || !isset($_POST["password"])) {
		header("Location: ../admin.php?error=1");
	}
	$username = $_POST["username"];
	$password = $_POST["password"];
	include("DB.php");
	$db = new DB();
	$SQL_LOGIN_ADMIN = "SELECT * FROM ADMINS WHERE username=\"$username\" AND password = \"$password\"";
	$res = $db->query($SQL_LOGIN_ADMIN);
	if($res->num_rows > 0) {
		echo "OK";
	}
	else {
		header("Location: ../admin.php?error=2");
	}

?>