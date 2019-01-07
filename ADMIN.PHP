<?php
$username=$_POST['username'];
$password=$_POST['password'];

/*
$con=@mysql_connect("localhost","root","") or die(mysql_error());

$db=@mysql_select_db("rg",$con)or die(mysql_error());

$sql="SELECT * FROM login WHERE username='$username' and password='$password'";

$result=mysql_query($sql)or die(mysql_error());;

*/
if($username=123 && $password==123){
session_start();
$_SESSION['username']="$username";
$_SESSION['password']="$password";

//session_register("username");
//session_register("password");

header("location:login_successa.php");
}
else {

echo "Wrong Username or Password OF THE ADMIN !! 
	please back !!";
}

ob_end_flush();
?>
