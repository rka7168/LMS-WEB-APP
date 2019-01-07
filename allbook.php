<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = @mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = 'SELECT * from BOOK';

mysql_select_db('rg');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
echo "<big><b><center>ALL BOOK DETAILS : </b></big><br><br><br>";
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo "<center>".
	     "BOOK ID :{$row['id']}  <br> ".
         "BOOK  NAME	 : {$row['name']} <br> ".
         "BOOK AUTHOR		 : {$row['author']} <br> ".
         "AVAILABILITY (0-NO,1-YES)	 : {$row['status']} <br> ".
		  "--------------------------------<br></center>";
         
} 
echo "<center>xxxxxxxxxxxxxxxxxxxxxx</center>";
mysql_close($conn);
?>
<html><body style="background-image: url(I.jpg);">

<br><br>
<a href="home.html"><b>HOME</b></a>
<a href="index.html"><b><br>
<br>
signout</b></a>

</html>