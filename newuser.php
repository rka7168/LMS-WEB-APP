<?php
$username=$_POST['username'];
$password=$_POST['password'];
$con=@mysql_connect("localhost","root","") or die(mysql_error());
$db=@mysql_select_db("rg",$con)or die(mysql_error());
$str="insert into login values('$username','$password')";
$res=@mysql_query($str)or die(mysql_error());
if($res>=0)
{
echo'<br><br><b>hurray !! Thank you for registration !! <br><br>
<br>
<br>
';
}

?>

<html><body style="background-image: url(h.jpg);">

<a href="faculty.html"><b>ADD FACULTY DETAILS</b></a><br>

<a href="student.html"><b>ADD STUDENT DETAILS</b></a>


<br>
<br>
<br>
<a href="home.html"><b> Home Page</b></a><br>
<a href="index.html"><b>Signout</b></a>

</html>
