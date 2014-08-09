<?php
$con=mysqli_connect("domain","root","YourPassword","dental_db");
	if (mysqli_connect_errno()) 
	{
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
	}
?>
