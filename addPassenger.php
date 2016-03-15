

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
	<font color = "white">Return to Main Menu  </font></font></a>

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

$firstName=$_POST["firstName"];
$surName=$_POST["surName"];
$address1=$_POST["address1"];
$address2=$_POST["address2"];
$city=$_POST["city"];
$country=$_POST["country"];
$postCode=$_POST["postCode"];
$phoneNumber=$_POST["phoneNumber"];
$eMail=$_POST["emailcheck"];




$sql =  "INSERT INTO passengerdetails (firstName, surName, address1, address2, city, country, postCode, eMail, phoneNumber)
		VALUES('$firstName', '$surName', '$address1', '$address2','$city','$country','$postCode','$eMail','$phoneNumber')";
		
		
if (!mysql_query($sql,$con)) //this executes all the code above for the sql statement
  {
  die('Error: ' . mysql_error());
  }
  
echo 'passenger has been inserted';


echo "<table border='1'>  
<tr> 
<th>FIRST NAME</th>
<th>SUR NAME </th>
<th>ADDRESS 1</th>
<th>ADDRESS 2</th>
<th>CITY </th>
<th>COUNTRY</th>
<th>POST CODE </th>
<th>EMAIL</th>
<th>PHONE</th>

</tr>";

//while($row = mysql_fetch_array($result)) //this creates a loop 
  {
  echo "<tr>";
   echo "<td>" .$firstName. "</td>";
  echo "<td>" . $surName . "</td>";
   echo "<td>" .$address1."</td>";
   echo "<td>" . $address2. "</td>";
  echo "<td>" . $city. "</td>";
  echo "<td>" . $country . "</td>";
   echo "<td>" . $postCode . "</td>"; 
   echo "<td>" . $eMail . "</td>";
  echo "<td>" . $phoneNumber . "</td>";
  
   
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