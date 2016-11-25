<?php 
	class DB
	{
		private $con;
		function __construct()
		{
			$config = parse_ini_file("config.ini");
			$this->con = mysqli_connect($config["HOST"],$config["USER"],$config["PASS"],$config["DB_NAME"]);
			if(!$this->con) {
				die("Error al conectar a la DB<br>");
			} 
		}

		function query($SQL_QUERY) {
			return $this->con->query($SQL_QUERY);
		}
	}
?>