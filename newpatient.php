<!doctype html>
<html>
<head>
	<title>New Patient</title>
	<link rel="stylesheet" type="text/css" href="mainpage.css"/>
	<link rel="Shortcut Icon" href="tmptooth.ico"/>
	<script>
		function goback()
		{
			window.location.href="index.html";
		}
	</script>
</head>
<body>
	<h1>New Patient Details</h1>
<div id="backbut" onclick="goback()"><b>Back</b></div>
<form id="mainform" action="" method="POST">
	Case Number:<input name="pcaseno" type="number" required/><br/><br/>
	Name:<input type="text" name="pname" style="margin-right:3%;" required/>
	Phone No.:<input type="text" name="pphoneno" style="margin-right:3%;width:10%;" />
	Age: <input type="number" name="page" style="margin-right:3%;width:3%;" />
	Address : <input type="text" name="paddress" style="width:32%;" /><br/><br/><br/>
	Gender: <select name="pgender" style="margin-right:1%;"><option>Male</option><option>Female</option></select>
	Status: <select name="pstatus" style="margin-right:1%;"><option>Ongoing</option><option>Complete</option></select>
	Amount Paid: &#8377;&nbsp;<input name="ppaid" type="number" style="margin-right:1%;width:5%;" value="0"/>
	Amount Unpaid: &#8377;&nbsp;<input name="punpaid" type="number" style="margin-right:1%;width:5%;" value="0"/>
	Date:<input name="pdate" type="date" style="margin-right:1%;width:10%;" value="yyyy-mm-dd"/>Time:<input name="ptime" type="time" style="width:8%;" value="hh:mm:ss"/><br/><br/>
	Medicines: <input name="pmedicines" type="text" style="width:32%;" /><br/><br/>
	Symptoms: <input name="psymptoms" type="text" style="margin-left:9px;width:32%;" /><br/><br/>
	Past Medical history:<br/>
	<textarea name="pmedhist" type="text" style="width:50%;height:2%;"></textarea><br/><br/>
	Past Dental history:<br/>
	<textarea name="pdenthist" type="text" style="width:50%;height:2%;"></textarea><br/><br/>
	Treatment Given: <input name="ptreatmentgiven1" type="checkbox"/>RCT<input name="ptreatmentgiven2" style="margin-left:3%;" type="checkbox"/>Composite<input name="ptreatmentgiven3" style="margin-left:3%;" type="checkbox"/>GIC<input name="ptreatmentgiven4" style="margin-left:3%;" type="checkbox"/>SF<br/><br/>
	Next Appointment: <input name="pnextappdate" type="date" style="width:10%;" value="yyyy-mm-dd"/><input name="pnextapptime" type="time" style="width:8%;" value="hh:mm:ss"/><br/><br/>
	Referred By: <input name="preferred" type="text" value="Patient"/><br/><br/>
	<div id="descr">Description:<br/><textarea name="pdesc" rows="24" cols="70"></textarea></div>
	<input type="submit" value="Submit"/><br/><br/>
</form>
<?php
	$tmpstr="";

	if($_POST['ptreatmentgiven1']=="on")
		$tmpstr.="RCT";
	if($_POST['ptreatmentgiven2']=="on")
	{
		if($tmpstr=="")
			$tmpstr.="Composite";
		else
			$tmpstr.=", Composite";
	}
	if($_POST['ptreatmentgiven3']=="on")
	{
		if($tmpstr=="")
			$tmpstr.="GIC";
		else
			$tmpstr.=", GIC";

	}
	if($_POST['ptreatmentgiven4']=="on")
	{
		if($tmpstr=="")
			$tmpstr.="SF";
		else
			$tmpstr.=", SF";
	}
    include 'confidential.php';
	$q=mysqli_query($con,"INSERT INTO Patients (CaseNo, Name, Phone_No, Age, Address, Gender, Status, Medicines, Payment_Paid, Payment_Unpaid, Symptoms, Treatment_Given, Referred_By, Date, Time, NextAppointmentDate, NextAppointmentTime, DentalHistory, MedicalHistory, Description) VALUES (".$_POST['pcaseno'].", '".$_POST['pname']."', '".$_POST['pphoneno']."',".$_POST['page'].", '".$_POST['paddress']."', '".$_POST['pgender']."', '".$_POST['pstatus']."', '".$_POST['pmedicines']."', ".$_POST['ppaid'].", ".$_POST['punpaid'].", '".$_POST['psymptoms']."', '".$tmpstr."', '".$_POST['preferred']."', '".$_POST['pdate']."', '".$_POST['ptime']."', '".$_POST['pnextappdate']."', '".$_POST['pnextapptime']."', '".$_POST['pmedhist']."', '".$_POST['pdenthist']."', '".$_POST['pdesc']."')");
	//echo $q;
?>
</body>
</html>
