<?php
require "info.php";
$sel_record = $_POST['sel_record'];

$sql = "SELECT * FROM contacts WHERE contactID = '$sel_record'";

     if (!$result) {
 print "<h1>Something has gone wrong!</h1>";
 }
 else
 {

        while ($record = mysqli_fetch_array($result)) {
                $id = $record['contactID'];
                $email = $record['email'];
                $first = $record['first'];
                $last = $record['last'];
                $phone = $record['phone'];
                $street = $record['street'];
                $company = $record['company'];
                $image = $record['image'];


                $filename = "images/$image";


                if (!file_exists($filename)) {
                        $filename="images/blank.gif"; //if it doesn't exist, set it equal to"blank"

        }

        }

$pageTitle = "Edit a Contact";
include "header.php";
print <<<HERE
                <h2>Modify this Contact</h2>
                <p>Change the values in the textboxes then click the "Modify Record" button</p>
                <p><img src="$filename" /></p>

                <form id="myForm" method="POST" action = "update.php">
                <input type="hidden" name="id" value="$id">
                <div>
                <label for="email">Email*:</label>
                <input type="text" name="email" id="email" value="$email">
                </div>

                <div>
                <label for="first">First Name*:</label>
               <input type="text" name="first" id="first" 47 value="$first">
                </div>

                <div>
                <label for="last">Last Name*:</label>
                <input type="text" name="last" id="last" value="$last">
                </div>

                <div>
                <label for="phone">Phone*:</label>
                <input type="text" name="phone" id="phone" value="$phone">
                </div>
                <div>
                <label for="street">Street*:</label>
                <input type="text" name="street"  id="street" value="$street">

                </div>
                <div>
                <label for="company">Company*:</label>
                <input type="text" name="company"  id="company" value=$company>

                </div>

                <div>
                <label for="image">Image:</label>
                <input type="text" name="image" size="30" id="upload">

                </div>

                <div id="mySubmit">
                <input type="submit" name="submit" value="Modify Record">
                </div>
                </form>

HERE;
}

?>
