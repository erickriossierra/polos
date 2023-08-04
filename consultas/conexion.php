
<?php
function conectarse(){

	$host='localhost';
	$usuariodb='root';
	$passwdb='';
	$nombredb='polos';

	/*
	$host=$_POST["host"];
	$usuariodb=$_POST["user"];
	$passwdb=$_POST["pass"];
	$nombredb=$_POST["bd"];
	*/
	// Create connection

	$conn = mysqli_connect($host, $usuariodb, $passwdb, $nombredb);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}else {
		//echo "Connected successfully";
	}
	return $conn;
}

?>