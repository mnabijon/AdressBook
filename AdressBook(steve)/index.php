<div style="text-align:center" >
<button onclick="playPause()"> <font color="red" ><strong>  Play/Pause </button></font></strong>
<button onclick="makeBig()"><font color="blue" ><strong>Big</button></font></strong>
<button onclick="makeSmall()"><font color="orange" ><strong>Small</button></font></strong>
<button onclick="makeNormal()"><font color="green" ><strong>Normal</button></font></strong>
<br><br>
<video id="video1" width="400" height="300" autoplay>
<source src="images\TOM TAILOR Accessories Spring Summer 2018.mp4" type="video/mp4">
<source src="images\TOM TAILOR Accessories Spring Summer 2018.mp4" type="video/ogg">
</video>
</div>
<script>
var myVideo = document.getElementById("video1");
function playPause() {
if (myVideo.paused)
myVideo.play() ;
else
myVideo.pause();
}
function makeBig() {
myVideo.width = 400;
}
function makeSmall() {
myVideo.width = 200;
}
function makeNormal() {
myVideo.width = 300;
}
</script>
<?php
require "adminlogin.php";
require "info.php";
$con=mysqli_connect("localhost","root","","steve_ali");
$sql="SELECT * FROM contacts ORDER BY last ASC";
$result = mysqli_query($db, $sql) or die(mysqli_error());
$pageTitle = "My Contacts Database";
include "header.php";
print <<<HERE
 	<h2>My Contacts</h2>
	 Select a record to edit or delete or <a href="form.php">add new contacts</a>.
	 <table id="home">
HERE;

 while ($row=mysqli_fetch_array($result)){
	 $id=$row["contactID"];
	 $email=$row["email"];
	 $first=$row["first"];
	 $last=$row["last"];
 	 $phone=$row["phone"];
 	 $company=$row["company"];
	 $street=$row["street"];
	 $image=$row["image"];

 
 $filename = "images/$image";

 
 if (!file_exists($filename)) {
 $filename="images/blank.gif"; // if it doesn't exist, set it equal to "blank"
 }

print <<<HERE
 <tr>
 <td>
 <form method="post" action="confirm.php">
 <input type="hidden" name="sel_record" value="$id">
 <input type="submit" name="delete" value=" Delete "></form>

 <form method="post" action="updateform.php">
 <input type="hidden" name="sel_record" value="$id">
 <input type="submit" name="update" value=" Edit "></form>

 </td>

 <td align="center"> <img src="$filename" /></td>
 <td><strong><font size="+3" color="red">$first $last</strong><br /></font>
     Phone:$phone<br />
     street:$street<br />
     company:$company<br />

 <a href="mailto: $email">$email</a></td></tr>
HERE;
}
print "</tr></table></body></html>";




?>
