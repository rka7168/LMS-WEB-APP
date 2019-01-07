<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$book_id=$_POST['book_id'];
$user_id=$_POST['user_id'];
$issue_date=date('Y/m/d');
$return_date = date('Y/m/d',strtotime("+30 days"));
$conn = @mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql="SELECT * FROM book WHERE id='$book_id'";

mysql_select_db('rg');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
if($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
	$status = $row['status'];
	
	if($status <1 )
		echo "BOOK NOT AVAILABLE";
	else
    	{
		
				$sql3="SELECT * FROM student WHERE sno ='$user_id'";

				$retval3 = mysql_query( $sql3, $conn ) ;

				$sql2="SELECT * FROM teacher WHERE tno ='$user_id'";

				$retval2 = mysql_query( $sql2, $conn ) ;

				if( $retval3 and $row = mysql_fetch_array($retval3, MYSQL_ASSOC))
				{
					$n = $row['nob'];
					if ($n < 1)
						echo "Cannot issue more books";
					else
					{
						$str = "insert into issue values('S', '$book_id','$user_id','$issue_date','$return_date')";
						$retval=@mysql_query($str)	;
						$sql = "update student set nob = nob - 1 where sno = '$user_id'";
						$retval = mysql_query( $sql, $conn);
						$sql1 = "update book set status = '0' where id = '$book_id'";
						$retval = mysql_query( $sql1 , $conn);
						if($retval)
						{
							$sql="SELECT * FROM book WHERE id='$book_id'";
							$retval = mysql_query( $sql, $conn );
							$row = mysql_fetch_array($retval, MYSQL_ASSOC);
							echo "Book issued successfully";
							echo "<center><big><b>BOOK DETAILS : </b></big><br>	<br><br>".
	    					 "BOOK ID :{$row['id']}  <br> ".
        	 				"BOOK NAME	 : {$row['name']} <br> ".
       	 					 "AUTHOR		 : {$row['author']} <br> ".
							 "</center>";
						}	
					}
				}
				else if( $retval2 and $row = mysql_fetch_array($retval2, MYSQL_ASSOC))
				{
					$n = $row['nob'];
					if ($n < 1)
						echo "Cannot issue more books";
					else
					{
						$str = "insert into issue values ('T', '$book_id', '$user_id','$issue_date','$return_date')";
						$retval=@mysql_query($str)	;
						$sql = "update teacher set nob = nob - 1 where tno = '$user_id'";
						$retval = mysql_query( $sql, $conn);
						$sql1 = "update book set status = '0' where id = '$book_id'";
						$retval = mysql_query( $sql1 , $conn);
						if($retval)
						{
							$sql="SELECT * FROM book WHERE id='$book_id'";
							$retval = mysql_query( $sql, $conn );
							
							$row = mysql_fetch_array($retval, MYSQL_ASSOC);
							echo "Book issued successfully";
							echo "<center><big><b>BOOK DETAILS : </b></big><br>	<br><br>".
	    					 "BOOK ID :{$row['id']}  <br> ".
        	 				"BOOK NAME	 : {$row['name']} <br> ".
       	 					 "AUTHOR		 : {$row['author']} <br> ".
							 "</center>";
						}	
					}
				}
				else
				{
					echo "Incorrect details...";
				}
			
		}
         
} 
echo "<center>xxxxxxxxxxxxxxxxxxxxxx</center>";
mysql_close($conn);
?>
<html><body style="background-image: url(g.jpg);">

<br><br><center>
<a href="issue.html"><b>BACK</b></a></center>

<a href="home.html"><b>HOME</b></a>
<a href="index.html"><b><br>
<br>
signout</b></a>

</html>
