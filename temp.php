<?php
$txt = $_GET['text'];

if($txt <> "")
{
	include "confidential.php";
	$q = mysqli_query($con,"SELECT * FROM Patients WHERE CaseNo LIKE '%".$txt."%' OR Name LIKE '%".$txt."%' OR Phone_No LIKE '%".$txt."%' OR Patient_ID LIKE '%".$txt."%' OR Medicines LIKE '%".$txt."%' OR Address LIKE '%".$txt."%' OR Age LIKE '%".$txt."%' OR Date LIKE '%".$txt."%' OR NextAppointmentDate LIKE '%".$txt."%'");
	$count1 = 1;
	echo "<table id='resulttable' cellspacing='10'>";
	echo "<tr id='headeroftable'><td>ID</td><td>Case No.</td><td>Name</td><td>Age</td><td>Phone No.</td><td>Address</td><td>Medicines</td><td>Payment Left</td><td>Gender</td><td>Date Examined</td><td>Status</td><td>Next Appointment</td></tr>";
	while($row = mysqli_fetch_array($q))
	{
		echo "<tr onclick='opendetails(this)' class='responses' id='resp".$row['Patient_ID']."'><td>".$row['Patient_ID'].".</td><td>".$row['CaseNo']."</td><td>".$row['Name']."</td><td>".$row['Age']."</td><td>".$row['Phone_No']."</td>  <td>".$row["Address"]."</td><td>".$row['Medicines']."</td><td>".$row['Payment_Unpaid']."</td><td>".$row['Gender']."</td><td>".date('d-m-Y',strtotime($row['Date']))."</td><td>".$row['Status']."</td><td>".date('d-m-Y',strtotime($row['NextAppointmentDate']))."</td></tr><br/>";
		$count1 += 1;
	}
	echo "</table>";

}
?>
