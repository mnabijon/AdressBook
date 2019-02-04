<?php
require "info.php";
$sel_record = $_POST['sel_record'];
//SQL statement to select information
$sql = "SELECT * FROM contacts WHERE contactID = $sel_record";
// execute SQL query and get result
$result = mysqli_query($db, $sql) or die (mysqli_error());
//$result = mysqli_query($db, $sql)or die("error".mysqli_error($db));

if (!$result) {
        print "<h1>Something has gone wrong!</h1>";
} else {
        //loop through record and get values
        while ($record = mysqli_fetch_array($result)) {
                $id = $record['contactID'];
                $email = $record['email'];
                $first = $record['first'];
                $last = $record['last'];
                $phone = $record['phone'];
                $street=$record['street'];
                $company=$record['company'];
                $image = $record['image'];

                //assign a variable name to the image name
                $filename = "images/$image";

                //check to see if a file is there for the picture
                if (!file_exists($filename)) {
                        $filename="images/blank.gif"; //if it doesn't exist, set it equal to"blank"
                }
                // end while loop
        }

$pageTitle = "Delete a Contact";
include "header.php";

print  <<<HERE
<h2>Are you sure you want to delete this record?
It will be permanently removed:</h2>
<img src = "$filename" />
<ul>
        <li>ID: $id</li>
        <li>Name: $first $last</li>
        <li>E-mail: $email</li>
        <li>Phone: $phone</li>
        <li>street: $street</li>
        <li>company: $company</li>
        <li>image: $image</li>
</ul>
<p><br />
<form method="post" action="reallydelete.php">
        <input type="hidden" name="id" value="$id">
        <input type="submit" name="reallydelete" value="really delete" />
        <input type="button" name="cancel" value="cancel" onClick="location.href='index.php'" /></a>
</p>
</form>
HERE;
}
// close else

?>
