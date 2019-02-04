<?php
include "info.php";

if($_POST['submit']=="Submit")
{
                $email = cleanData($_POST['email']);
                $first = cleanData($_POST['first']);
                $last = cleanData($_POST['last']);
                $phone = cleanData($_POST['phone']);
                $street = cleanData($_POST['street']);
                $company = cleanData($_POST['company']);
                $image = cleanData($_POST['image']);
                //print "Data cleaned";

addData($email, $first, $last, $phone, $street, $company, $image);
       }
        else
        {
        printForm();
        }
function checkUpload(){
                if (isset($_FILES['upload'])) {
                $allowed = array ('image/pjpeg', 'image/jpeg', 'image/jpg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png', 'image/gif');
                if (in_array($_FILES['upload']['type'], $allowed)) {
                print "uploading files...";
                if (move_uploaded_file($_FILES['upload']['tmp_name'], "images/{$_FILES['upload']['name']}")) {
                echo "<p><em>The File Has Been Uploaded! </em></p>";
                $image="{$_FILES['upload']['name']}";
                print "$image";
}


}
else
{
echo '<p class="error">please upload a JPEG, GIF, or PNG image.</p>';


if ($_FILES['upload']['error'] > 0) {
echo '<p class="error">The file could not be uploaded because: <strong>';

switch ($_FILES['upload']['error']) {

case 1:
print 'the file exceeds the upload because: <strong>';
break;
case 2:
print 'the file exceeds the MAX_FILE_SIZE setting in the HTML form ';
break;
case 3:
print 'the file was only partially uploaded';
break;
case 4:
print 'No file is uploaded';
break;
case 6:
print 'No temporary  folder was available';
break;
case 7:
print 'Unable to write to the disk ';
break;
case 8:
print 'file upload stopped ';
break;
default :
print 'A system error occurred ';
break;
}
}
print '</strong></p>';
}
if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name'])){
print "file_exists";
unlink ($_FILES['upload']['tmp_name']);
}
		return $image;


}
}
function cleanData($data){


                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                $data = strip_tags($data);
                return $data;
}
function addData($email, $first, $last, $phone, $street, $company ,$image)
{
              include("info.php");
              $image = checkUpload();
              $sql = "INSERT INTO contacts VALUES(null, '$email', '$first', '$last', '$phone', '$street', '$company', '$image')";
              $con=mysqli_connect("localhost","root","","steve_ali");
              $result = mysqli_query($db, $sql) or die (mysqli_error());
              //include("header.php");


var_dump(mysqli_error($db)) ;
include("header.php");
print <<<HERE
                <h1>The following has been added:</h1>
                <ul>
                <li>E-Mail: $email</li>
                <li>First: $first</li>
                <li>Last: $last</li>
                <li>Phone: $phone</li>
                <li>Street: $street</li>
                <li>company: $company</li>
                <li>Image File: <img src="images/$image" /></li>
                </ul>
HERE;
}

		  function printForm(){
//displays the html form
		  $pageTitle = "Add a Contact";
		  include("header.php");
		  print <<<HERE
                  <h2>Add a Contact</h2>
                  <form id = "myForm" method="POST" enctype="multipart/form-data">
                  <div>
                  <label for="email">Email*:</label>
                  <input type="text" name="email" id="email" required="required">
                  </div>

                  <div>
                  <label for="first">First Name*:</label>
                  <input type="text" name="first" id="first" required="required">
                  </div>

                  <div>
                  <label for="last">Last Name*:</label>	
                  <input type="text" name="last" id="last" required="required">
                  </div>

                  <div>
                  <label for="phone">Phone*:</label>
                  <input type="text" name="phone" id="phone" required="required">
                  </div>
                  <div>
                  <label for="street">Street*:</label>
                  <input type="text" name="street" id="street" required="required">
                  </div>
                  <div>
                  <label for="company">Comapny*:</label>
                  <input type="text" name="company" id="company" required="required">
                  </div>
                  <div>
                  <label for="image">Image:</label>
                  <input type="file" name="upload" size="30" id="upload">
                  <br><small>Must be less than 522 kb . Only JPG ,GIF and PNG files </small></br>
                  </div>

                  <div id="mySubmit">
                  <input type="submit" value="Submit" name="submit"/>
                  </div>
                  </form>

HERE;
}


?>
