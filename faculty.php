<?php
$tno=$_POST['tno'];
$tname=$_POST['tname'];
$department=$_POST['department'];
$con=@mysql_connect("localhost","root","") or die(mysql_error());
$db=@mysql_select_db("rg",$con)or die(mysql_error());
$str="insert into teacher values('$tno','$tname','$department','5','0')";
$res=@mysql_query($str)or die(mysql_error());
if($res>=0)
{
echo'<br><br><b>hurray !! Thank you for registration !! <br>';
}

?>

<html><body style="background-image: url(h.jpg);">


<br>
<br>
<br>
<a href="home.html"><b>home page</b></a>
<a href="index.html"><b>signout</b></a>

</html>

