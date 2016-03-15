

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
		<a href="FrontPage.html"><font color = "white">Return to Main Menu  </font></font></a>

</aside>

<div class="mainsection">

<?php



error_reporting(E_ALL^E_DEPRECATED);
$con = mysql_connect("localhost","root"); //connecting to the database
if (!$con)
  {
  die('Could not connect: ' . mysql_error()); //if connection is unsuccessful it give a message 'could not connect'
  }

mysql_select_db("g00340833", $con); //tells which database that you want to work with

$bookingClerk=$_POST["bookingClerk"];
$callDate=$_POST["callDate"];
$timeOfCall=$_POST["timeOfCall"];
$callDuration=$_POST["callDuration"];
$callDetails=$_POST["callDetails"];





$sql =  "INSERT INTO loggedcalls (bookingClerk, callDate, timeOfCall, callDuration, callDetails)
		VALUES('$bookingClerk', '$callDate', '$timeOfCall', '$callDuration','$callDetails')";
		
		
if (!mysql_query($sql,$con)) //this executes all the code above for the sql statement
  {
  die('Error: ' . mysql_error());
  }
  
echo 'call has been logged';


echo "<table border='1'>  
<tr> 
<th>BOOKING CLERK</th>
<th>DATE OF CALL </th>
<th>TIME OF CALL</th>
<th>DURATION OF CALL</th>
<th>DETAILS </th>


</tr>";

//while($row = mysql_fetch_array($result)) //this creates a loop 
  {
   echo "<tr>";
   echo "<td>" .$bookingClerk. "</td>";
   echo "<td>" .$callDate. "</td>";
   echo "<td>" .$timeOfCall."</td>";
   echo "<td>" .$callDuration. "</td>";
   echo "<td>" .$callDetails. "</td>";
   
   
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