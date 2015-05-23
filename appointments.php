<!doctype html>
<html>
<head>
	<title>Today</title>
	<link rel="stylesheet" type="text/css" href="mainpage.css"/>
	<link rel="Shortcut Icon" href="tmptooth.ico"/>
	<script>
		function goback()
		{
			window.location.href="index.html";
		}
		function opendetails(e)
		{
			console.log(e.id.slice(4));
			window.location.href="update.php?id="+e.id.slice(4);
		}

	</script>
</head>
<body>
<div id="backbut" onclick="goback()"><b>Back</b></div><br/><br/>
	<h1>Today's Appointments</h1>
<br/><br/>
<?php
	$today=date("Y-m-d");
    include 'confidential.php';
	$q=mysqli_query($con, "SELECT * FROM Patients WHERE NextAppointmentDate='".$today."'");
	$count = 1;
	echo "<table id='resulttable2' cellspacing='10'>";
	echo "<tr id='headeroftable'><td>ID</td><td>Name</td><td>Age</td><td>Phone No.</td><td>Address</td><td>Medicines</td><td>Payment Left</td><td>Gender</td><td>Date Examined</td><td>Status</td><td>Appointment Time</td></tr>";
	while($row = mysqli_fetch_array($q))
	{
		echo "<tr class='responses' onclick='opendetails(this)' id='resp".$row['Patient_ID']."'><td>".$row['Patient_ID'].".</td><td>".$row['Name']."</td><td>".$row['Age']."</td><td>".$row['Phone_No']."</td>  <td>".$row["Address"]."</td><td>".$row['Medicines']."</td><td>".$row['Payment_Unpaid']."</td><td>".$row['Gender']."</td><td>".$row['Date']."</td><td>".$row['Status']."</td><td>".$row['NextAppointmentTime']."</td></tr><br/>";
		$count += 1;
	}
	echo "</table>";

?>
</body>
</html>
