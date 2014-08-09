<!doctype html>
<html>
<head>
	<title>Old Patients</title>
	<link rel="stylesheet" type="text/css" href="mainpage.css"/>
	<script type="text/javascript" src="jquery.js"></script>  
	<link rel="Shortcut Icon" href="tmptooth.ico"/>
	<script>
		function goback()
		{
			window.location.href="index.html";
		}

		function sendreq()
		{
			
			var maindiv=document.getElementById("mainsearch");

			if(maindiv.value!="")
			{
				var xml = new XMLHttpRequest();
				xml.onreadystatechange=function()
				{
					if(xml.status==200 && xml.readyState==4)
					{
						document.getElementById("responsediv").innerHTML=xml.responseText;
					}
				}
				xml.open("GET","temp.php?text="+maindiv.value,true);
				xml.send();
			}
		}
		
		function opendetails(e)
		{
			console.log(e.id.slice(4));
			window.location.href="update.php?id="+e.id.slice(4);
		}
		$(document).ready(function(){
			$("#openform").hide();
		});

	</script>
</head>
<body onload="sendreq();">
	
	<h1>Search For Patients</h1>
<div id="backbut" onclick="goback()"><b>Back</b></div><br/>
<input id="mainsearch" onkeyup="sendreq()" type="text" style="width:50%;" target/>
<div id="responsediv"></div>
<div id="verytempdiv" style="visibility:visible;"></div><!--<form id="tmpform" method="POST" onsubmit="heythere()"><input type="text"  id="idclicked" name="rowclicked"/><input type="submit"/></form></div>
-->
<?php
	

?>

</body>
</html>