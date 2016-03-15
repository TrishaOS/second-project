<?php
$con = mysql_connect("localhost","root"," ");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("TEST", $con);

$sql="INSERT INTO DEPT (Deptno, Dname, Loc)
VALUES
('$_POST[Dept]','$_POST[Deptname]','$_POST[location]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($con);
?> s