<?php

include "info.php";
$id = $_POST['id'];
$sql="SELECT * FROM contacts WHERE contactID = '$id'";
$result=mysqli_query($db, $sql) or die (mysqli_error());
while ($row=mysqli_fetch_array($result)){
 
 
 $id=$row['contactID'];
 $email=$row['email'];
 $first=$row['first'];
 $last=$row['last'];
 $phone=$row['phone'];
 $street=$row['street'];
 $comany=$row['company'];
 $image=$row['image'];


 include "header.php";
 print "<p> $id, $email, $first , $last, $phone, $company, $street, $image has been permanently deleted.</p>";
 }

 $sql="DELETE FROM contacts WHERE contactID = '$id'";
 $result=mysqli_query($db,$sql) or die (mysqli_error());
//$result = mysqli_query($db, $sql)or die("error".mysqli_error($db));

 ?>
