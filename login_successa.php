<?php
session_start();
if(!isset( $_SESSION['username']))
{
header("location:INDEX.html");
}
?>

<html>
<body>
Login Successful
</body>
</html>
<?php
header("location:addbook.html");
?>