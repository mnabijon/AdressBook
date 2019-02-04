<?php
include "info.php";
$search=$_POST['search'];
//SQL statement to select what to search
$sql="SELECT * FROM contacts
WHERE email like '%$search%' OR
first like '%$search%' OR
last like '%$search%' OR
phone like '%$search%'
ORDER BY last ASC";

$result = mysqli_query($db, $sql) or die (mysqli_error());

$number=mysqli_num_rows($result);
$pageTitle="Search Results";
include "header.php";
print <<<HERE
<h2>Search Results</h2>
<h3>$number results found seaching for "$search"</h3>

<table cellpadding="15">
HERE;

while ($row=mysqli_fetch_array($result)){
$id=$row['contactID'];
$email=$row['email'];
$first=$row['first'];
$last=$row['last'];
$phone=$row['phone'];
$street=$row['street'];
$company=$row['company'];
$image=$row['image'];
$filename = "images/$image";

if (!file_exists($filename)) {
                $filename="images/blank.gif"; //if it doesn't exist, set it equal to "blank"
}print " <tr>
<td>
<form method=\"post\" action=\"confirm.php\">
<input type=\"hidden\" name=\"sel_record\" value=\"$id\">
<input type=\"submit\" name=\"delete\" value=\" Delete \"></form>

<form method=\"post\" action=\"updateform.php\">
<input type=\"hidden\" name=\"sel_record\" value=\"$id\">
<input type=\"submit\" name=\"update\" value=\" Edit \"></form>

</td>

<td align=\"center\"><img src=\"$filename\" /></td>
<td><strong>$first $last</strong><br />
Phone: $phone<br />
<a href=\"mailto: $email\">$email</a></td></tr>";
}
print "</tr></table></body></html>";
?>
