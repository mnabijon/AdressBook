<?php
include "info.php";

$id = $_POST['id'];
$email = $_POST['email'];
$first = $_POST['first'];
$last = $_POST['last'];
$phone = $_POST['phone'];
$street = $_POST['street'];
$company = $_POST['company'];

$sql="UPDATE contacts SET
email='$email',
first='$first',
last='$last',
phone='$phone',
street='$street',
company='$company'

where contactID='$id' ";

$result=mysqli_query($db,$sql) or die (mysqli_error());

print "<html><head><title>Update Results</title></head><body>";
include "header.php";
print <<<HERE
<h1>The new record looks like this: </h1>
<p><strong>E-mail:</strong>$email</p>
<p><strong>First:</strong> $first</p>
<p><strong>Last:</strong> $last</p>
<p><strong>Phone:</strong> $phone</p>
<p><strong>Street:</strong>$street</p>
<p><strong>Company:</strong>$company</p>


HERE;


 ?>
