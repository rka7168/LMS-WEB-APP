<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$book_id=$_POST['book_id'];
$user_id=$_POST['user_id'];
$conn = @mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql="SELECT * FROM issue WHERE id='$book_id' and no='$user_id'";

mysql_select_db('rg');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
if($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
		$query = "update book set status ='1' where id ='$book_id'";
		$retval = mysql_query($query,$conn);
		if($retval)
			echo "Book returned successfully";
		$str = "delete from issue where id='$book_id' and no='$user_id'";
		$retval=mysql_query($str,$conn) or die(mysql_error());
		$date = date('Y/m/d');
		$return_date = $row['rdate'];
		$to_date = strtotime($date);
		$from_date = strtotime($return_date);
		$cal = $to_date - $from_date;
		$fine = floor($cal/(24*60*60));
		$sql1="SELECT * FROM student WHERE sno ='$user_id'";
		$retval1 = mysql_query( $sql1, $conn ) ;
		$sql2="SELECT * FROM teacher WHERE tno ='$user_id'";
		$retval2 = mysql_query( $sql2, $conn ) ;
		if( $retval1 and $row = mysql_fetch_array($retval1, MYSQL_ASSOC))
		{
			echo "Student";
			$c = 1;
			$a = $row['fine'] + $fine;
			$b = $row['nob'] + $c; 
			$str = "update student set fine = '$a' where sno = '$user_id'";
			$retval = mysql_query($str,$conn);
			$str = "update student set nob = '$b' where sno = '$user_id'";
			$retval = mysql_query($str,$conn);
		}
		else if( $retval2 and $row = mysql_fetch_array($retval2, MYSQL_ASSOC))
		{
			$c = 1;
			$a = $row['fine'] + $fine;
			if ($a<0)
				$a = 0;
			$b = $row['nob'] + $c; 
			$str = "update teacher set fine = '$a' where tno = '$user_id'";
			$retval = mysql_query($str,$conn);

			$str = "update teacher set nob = '$b' where tno = '$user_id'";
			$retval = mysql_query($str,$conn);
		}
		
} 
echo "<center>!!!!!!!!!!!!!!!!</center>";
mysql_close($conn);
?>
<html>
<br><br><center>
<a href="home.html"><b>HOME</b></a>
<a href="index.html"><b>Signout</b></a></center>

</html>



