

<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Mainpage </title>
			<meta http-equiv="content-type"
		content="text/html;charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="style.css">
		<style>
			.mainsection{ 
			height: 600px;
			width: 1000px;
			float: left;
			font-size: 20px;
			color: black;
			font-family: "Arial Black", Gadget, sans-serif;
		}
		</style>
	</head>
	<body BACKGROUND = "airplane-wallpaper-2.jpg" >
<header>DIRECT AIRLINES
</header>


<aside>
	<a href="FrontPage.html">
	<font color = "white">Return to Main Menu  </font></a>
	

</aside>

<div class="mainsection">

<?php

$flightNumber=$_GET["flightNumber"];
$flightDate=$_GET["flightDate"];


error_reporting(E_ALL^E_DEPRECATED);
$con = mysql_connect("localhost","root"); //connecting to the database
if (!$con)
  {
  die('Could not connect: ' . mysql_error()); //if connection is unsuccessful it give a message 'could not connect'
  }

mysql_select_db("g00340833", $con); //tells which database that you want to work with





 
$result = mysql_query ("SELECT passengerdetails.passengerId, firstName, surName, flightNumber, flightDate
		FROM passengerdetails, reservationlist where passengerdetails.passengerId=reservationlist.passengerId and
		flightNumber='".$flightNumber."' and flightDate='".$flightDate."'");
 
echo "<table border='1'>  
<tr> 
<th> PASSENGER ID</th>
<th>FIRST NAME</th>
<th>SUR NAME </th>

</tr>";

while($row = mysql_fetch_array($result)) //this creates a loop 
  {
  echo "<tr>";
	 echo "<td>" . $row['passengerId'] . "</td>";
     echo "<td>" . $row['firstName'] . "</td>";
	 echo "<td>" . $row['surName'] . "</td>"; 
	 echo "</tr>";
  }
echo "</table>";
		

mysql_close($con); //closing connection

?> 

</div>


<footer> DIRECT AIRLINES
</footer>
</body>
</html>