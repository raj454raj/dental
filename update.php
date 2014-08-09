<!doctype html>

<html>
<head>
	<title>Update records</title>
	<link rel="stylesheet" type="text/css" href="mainpage.css"/>
	<script type="text/javascript" src="jquery.js"></script>  
	<link rel="Shortcut Icon" href="tmptooth.ico"/>
	<script>
		function goback()
		{
			window.location.href="index.html";
		}
		function feedvalues()
		{
			var title=document.getElementsByTagName("title");
			title[0].innerHTML=document.getElementById("settitle").innerHTML;
			var text = eval(document.getElementById("providevalues").innerHTML);
			var form = document.getElementById("openform");
			form.children[10].value = text[0];
			form.children[11].value = text[1];
			if(text[2].contains("RCT"))
				form.children[32].checked=true;
			if(text[2].contains("Composite"))
				form.children[33].checked=true;
			if(text[2].contains("GIC"))
				form.children[34].checked=true;
			if(text[2].contains("SF"))
				form.children[35].checked=true;

		}
	</script>
</head>
<body onload="feedvalues()">
<div id="backbut" onclick="goback()"><b>Back</b></div>
<?php
		include "confidential.php";
		$q=mysqli_query($con, "SELECT * FROM Patients WHERE Patient_ID=".$_GET['id']);
		$row = mysqli_fetch_array($q);
		
?>
<br/>
<div id="settitle" style="visibility:hidden;">
	<?php 
		echo $row['Name'];
	?>
</div>
<div id="providevalues" style="visibility:hidden;">
	<?php 
		echo "['".$row['Gender']."', '".$row['Status']."', '".$row['Treatment_Given']."']";
	?>
</div>
<form id="openform" onsubmit="goback()" method="POST">
	Case Number:<input name="updatecaseno" type="number" value="<?=$row['CaseNo']?>" required/><br/><br/>
	Name:<input type="text" name="updatename" style="margin-right:3%;" value="<?=$row['Name']?>" required/>
	Phone No.:<input type="text" name="updatephoneno" value="<?=$row['Phone_No']?>" style="margin-right:3%;width:10%;" />
	Age: <input type="number" name="updateage" value="<?=$row['Age']?>" style="margin-right:3%;width:3%;" />
	Address : <input type="text" name="updateaddress" value="<?=$row['Address']?>" style="width:32%;" /><br/><br/><br/>
	Gender: <select name="updategender" style="margin-right:1%;"><option>Male</option><option>Female</option></select>
	Status: <select name="updatestatus" style="margin-right:1%;"><option>Ongoing</option><option>Complete</option></select>
	Amount Paid: &#8377;&nbsp;<input name="updatepaid" type="number" value="<?=$row['Payment_Paid']?>" style="margin-right:1%;width:5%;" value="0"/>
	Amount Unpaid: &#8377;&nbsp;<input name="updateunpaid" type="number" value="<?=$row['Payment_Unpaid']?>" style="margin-right:1%;width:5%;" value="0"/>
	Date:<input name="updatedate" type="date" style="margin-right:1%;width:10%;" value="<?=$row['Date']?>"/>Time:<input name="updatetime" type="time" value="<?=$row['Time']?>" style="width:8%;"/><br/><br/>
	Medicines: <input name="updatemedicines" type="text" value="<?=$row['Medicines']?>" style="width:32%;" /><br/><br/>
	Symptoms: <input name="updatesymptoms" type="text" value="<?=$row['Symptoms']?>" style="margin-left:9px;width:32%;" /><br/><br/>
	Past Medical history:<br/>
	<textarea name="updatemedhist" type="text" style="width:50%;height:8%;"><?php echo $row['MedicalHistory'];?></textarea><br/><br/>
	Past Dental history:<br/>
	<textarea name="updatedenthist" type="text" style="width:50%;height:8%;"><?php echo $row['DentalHistory'];?></textarea><br/><br/>
	Treatment Given: <input name="updatetreatmentgiven1" type="checkbox"/>RCT<input name="updatetreatmentgiven2" style="margin-left:3%;" type="checkbox"/>Composite<input name="updatetreatmentgiven3" style="margin-left:3%;" type="checkbox"/>GIC<input name="updatetreatmentgiven4" style="margin-left:3%;" type="checkbox"/>SF<br/><br/>
	Next Appointment: <input name="updatenextappdate" type="date" value="<?=$row['NextAppointmentDate']?>" style="width:10%;"/><input name="updatenextapptime" type="time" value="<?=$row['NextAppointmentTime']?>" style="width:8%;"/><br/><br/> 
	Referred By: <input name="updatereferred" type="text" value="<?=$row['Referred_By']?>"/><br/><br/>
	<div id="descr">Description:<br/><textarea name="updatedesc" rows="24" cols="70"><?php echo $row['Description'];?></textarea></div>
	<input type="submit" value="Submit"/>
</form>
<?php
$tmpstr="";

	if($_POST['updatetreatmentgiven1']=="on")
		$tmpstr.="RCT";
	if($_POST['updatetreatmentgiven2']=="on")
	{	
		if($tmpstr=="")
			$tmpstr.="Composite";
		else
			$tmpstr.=", Composite";
	}
	if($_POST['updatetreatmentgiven3']=="on")
	{
		if($tmpstr=="")
			$tmpstr.="GIC";
		else
			$tmpstr.=", GIC";
	
	}	
	if($_POST['updatetreatmentgiven4']=="on")
	{
		if($tmpstr=="")
			$tmpstr.="SF";
		else
			$tmpstr.=", SF";
	}
	$query=mysqli_query($con,"UPDATE Patients SET  CaseNo=".$_POST['updatecaseno'].", Name='".$_POST['updatename']."', Phone_No='".$_POST['updatephoneno']."', Age=".$_POST['updateage'].", Address='".$_POST['updateaddress']."', Gender='".$_POST['updategender']."', Status='".$_POST['updatestatus']."', Payment_Paid=".$_POST['updatepaid'].", Payment_Unpaid=".$_POST['updateunpaid'].", Date='".$_POST['updatedate']."', Time='".$_POST['updatetime']."', Medicines='".$_POST['updatemedicines']."', Symptoms='".$_POST['updatesymptoms']."', MedicalHistory='".$_POST['updatemedhist']."', DentalHistory='".$_POST['updatedenthist']."', Treatment_Given='".$tmpstr."', NextAppointmentDate='".$_POST['updatenextappdate']."', NextAppointmentTime='".$_POST['updatenextapptime']."', Referred_By='".$_POST['updatereferred']."', Description='".$_POST['updatedesc']."' WHERE Patient_ID=".$_GET['id']);
?>
</body>
</html>