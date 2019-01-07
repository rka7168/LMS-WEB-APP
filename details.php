<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = @mysql_connect($dbhost, $dbuser, $dbpass);
$no =$_POST["no"];
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql1 = "SELECT * from student where sno = '$no'" or die(mysql_error());

$sql2 = "select * from teacher where tno = '$no' " or die(mysql_error());

mysql_select_db('rg');
$retval1 = mysql_query( $sql1, $conn );
$retval2 = mysql_query( $sql2, $conn );

echo "<big><b><center>DETAILS : </b></big><br><br><br>";
while($row = mysql_fetch_array($retval1, MYSQL_ASSOC))
{
	$a = 3;
	$n = $a - ($row['nob']) ;  
    echo "<center>".
	    "USERID :{$row['sno']}  <br> ".
         "NAME	 : {$row['sname']} <br> ".
         "DEPARTMENT		 : {$row['department']} <br> ".
         "NUMBER OF BOOKS ISSUED	 : {$n} <br> ".
	    "FINE: {$row['fine']} <br> ".
		  "--------------------------------<br></center>";
         
} 

while($row = mysql_fetch_array($retval2, MYSQL_ASSOC))
{
	$b= 5;
	$n = $b - ($row['nob']);  
    echo "<center>".
	    "USERID :{$row['tno']}  <br> ".
         "NAME	 : {$row['tname']} <br> ".
         "DEPARTMENT		 : {$row['department']} <br> ".
         "NUMBER OF BOOKS ISSUED	 : {$n} <br> ".
	    "FINE: {$row['fine']} <br> ".
		  "--------------------------------<br></center>";
         
} 
echo "<center>End</center>";
mysql_close($conn);
?>
<html><body style="background-image: url(I.jpg);">

<br><br>
<a href="home.html"><b>HOME</b></a>
<a href="index.html"><b><br>
<br>
signout</b></a>
</body>
</html>