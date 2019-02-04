	<?php
 //database connection information
$host="localhost";
$user="root";
$password="";
$db=mysqli_connect($host, $user, $password) or
die(mysqli_error());
mysqli_select_db($db,"steve_ali");
?>
