<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = @mysql_connect($dbhost, $dbuser, $dbpass);
$name = $_POST['name'];
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = "select * from book where name = '$name'";

mysql_select_db('rg');
$retval = mysql_query( $sql, $conn );

if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
echo "<big><b><center>BOOK DETAILS : </b></big><br><br><br>";
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
		echo 
	     "BOOK ID :{$row['id']}  <br> ".
         "BOOK  NAME	 : {$row['name']} <br> ".
         "BOOK AUTHOR		 : {$row['author']} <br> ".
		  "";
		 $s = $row['status'];
		 if($s > 0)
		 	echo "STATUS     :    AVAILABLE";
		 else
		 	echo "STATUC     :    NOT AVAILABLE";
		 echo "<br><br>xxxxxxxxxxxxxxxx<br><br>";
	
} 
echo "<center>xxxxxxxxxxxxxxxxxxxxxx</center>";
mysql_close($conn);
?>
<html><body style="background-image: url(I.jpg);">

<br><br>
<a href="issue.html"><b>ISSUE A BOOK</b></a><br>
<a href="home.html"><b>HOME</b></a>
<a href="index.html"><b><br>

<br>
signout</b></a>

</html>