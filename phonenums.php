<html>
<head>
	<title>Phone Numbers</title>
	<link rel="stylesheet" type="text/css" href="mainpage.css"/>
	<link rel="Shortcut Icon" href="tmptooth.ico"/>
	<script>
		function goback()
		{
			window.location.href="index.html";
		}

		function opendetails(e)
		{
			//console.log(e.id.slice(4));
			window.location.href="update.php?id="+e.id.slice(4);
		}
	</script>
</head>
<body>
<h1>Phone Number List</h1>
<div id="backbut" onclick="goback()"><b>Back</b></div>
<?php
	include "confidential.php";
	$q=mysqli_query($con,"SELECT * FROM Patients");
	echo "<table id='phonetable' cellspacing='10'>";
	echo "<tr id='headeroftable'><td>Case No.</td><td>Name</td><td>Phone No.</td><td>Date</td></tr>";
	while($row = mysqli_fetch_array($q))
	{
		echo "<tr onclick='opendetails(this)' class='responses' id='resp".$row['Patient_ID']."'><td>".$row['CaseNo']."</td><td>".$row['Name']."</td><td>".$row['Phone_No']."</td><td>".$row['Date']."</td></tr><br/>";
		$count1 += 1;
	}
	echo "</table>";

?>
</body>
</html>