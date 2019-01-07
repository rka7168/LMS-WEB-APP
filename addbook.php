<?php
$id=$_POST['id'];
$name=$_POST['name'];
$author=$_POST['author'];


$con=@mysql_connect("localhost","root","") or die(mysql_error());

$db=@mysql_select_db("rg",$con)or die(mysql_error());

$str="insert into book values('$id','$name','$author','1')";

$res=@mysql_query($str)or die(mysql_error());

if($res>=0)
{
echo'<br><br><center><b>Book added !!</center><br>';
}

?>
<html>
<center>
<br>
<a href="INDEX.html"><b>Click here to return to the home page</b></a>
<br><br><body style="background-image: url(b.jpg);">

<form method="post" action="addbook.html" name="addbook">
  <input name="addbook" value="ADD ANOTHER BOOK" type="submit"></form><a href="index.html"><b><br>
<br>
signout</b></a>


  </center>
</html>