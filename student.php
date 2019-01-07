<?php
$sno=$_POST['sno'];
$sname=$_POST['sname'];
$department=$_POST['department'];
$con=@mysql_connect("localhost","root","") or die(mysql_error());
$db=@mysql_select_db("rg",$con)or die(mysql_error());
$str="insert into student values('$sno','$sname','$department','3','0')";
$res=@mysql_query($str)or die(mysql_error());
if($res>=0)
{
echo'<br><br><b>hurray !! Thank you for registration !! <br>';
}

?>

<html>


<br>
<br>
<br>
<a href="home.html"><b>Click here to go to the home page</b></a>
<a href="index.html"><b>Click here to signout</b></a>

</html>
