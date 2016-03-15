

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
	
<body BACKGROUND = "airplane-wallpaper-2.jpg">

<header>DIRECT AIRLINES</header>

<!-- puts the white chars in an aside box  -->	
<aside>
			<a href="FrontPage.html">
			<font color = "white">Return to Main Menu  </font></font></a>

</aside>

<div class="mainsection">
<!-- php code to select a flight for a given city/date combination  
		this has been embedded into html code to show current page format -->	

<?php

$depCity=$_GET['depCity'];
$flightDate=$_GET['flightDate'];

error_reporting(E_ALL^E_DEPRECATED);
$con = mysql_connect("localhost","root"); //connecting to the database
if (!$con)
  {
  die('Could not connect: ' . mysql_error()); //if connection is unsuccessful it give a message 'could not connect'
  }

mysql_select_db("g00340833", $con); //tells which database that you want to work with



$result = mysql_query("SELECT flightNumber, flightDate, depCity, depTime, arrTime, totalSeats, seatsAllocated, 
			seatPrice FROM flightDetails WHERE depCity = '".$depCity."'  and flightDate = '".$flightDate."'");
			
		
echo "<table border='1'>  
<tr> 
<th>FLIGHT NUMBER</th>
<th>DATE</th>
<th>DEPARTURE CITY </th>
<th>DEPARTURE TIME</th>
<th>ARRIVAL TIME </th>
<th>TOTAL SEATS </th>
<th>SEATS ALLOCATED </th>
<th>SEAT PRICE </th>

</tr>";

while($row = mysql_fetch_array($result)) //this creates a loop 
  {
  echo "<tr>";
  echo "<td>" . $row['flightNumber'] . "</td>";
  echo "<td>" . $row['flightDate'] . "</td>";
  echo "<td>" . $row['depCity'] . "</td>";
   echo "<td>" . $row['depTime'] . "</td>";
   echo "<td>" . $row['arrTime'] . "</td>";
  echo "<td>" . $row['totalSeats'] . "</td>";
  echo "<td>" . $row['seatsAllocated'] . "</td>";
   echo "<td>" . $row['seatPrice'] . "</td>";
   
  echo "</tr>";
  }
echo "</table>";

mysql_close($con); //closing connection
?> 

</div>


<footer> DIRECT AIRLINES</footer>
</body>
</html>