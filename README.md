# AdressBook

Description: 

Create Address Book using PHP-MySQL
Create a search box 
Connect to the database 
Create a table on phpMyAdmin
Login to my AdressBook.

On phpMyAdmin:

setting up the structure of a contacts database using MySQL and phpMyAdmin. 
Create a new table in database I am going to call it << contacts >> .
And the number of the fields could be << 8 >> because i have 8 fields as a part of my database , and press create .
Then it will create a structure to be able to start entering this information .
So now I am going to put in the first field contactID that going to be Auto Increment and it’s going to be my primary key .means that no two records in my database will have the same contactsID and this should be integer << int >> so my primary key is an integer type .
Then in my second field name is << email >> and type << variable characters >> and the length I am going to put 50 as a Hight and value for that .
And then the next field name first also with type variable characters  and put 30 as a Hight and value .and the same with the first , last , phone , street , company , and image .
And click save , then I then I can see that it’s been successfully created it’s added as a table within the database 
Now I am going to create a php script that is going to connect to my database and add a record to the database . 
                                                                                                                       


PHP                                                               

Now I am going to Setup a PHP form to save data to a MySQL database. Includes using trim(), stripslashes(), htmlspecialchars() and strip_tags() to clean up data prior to saving in the database. Uses mysqli_connect to connect to my database, mysqli_query to execute an sql statement.

So now am going to start with my first file and call it : 


Form.php 


I have at first a function it’s called print form to display the HTML form..
So I am going to create a variable called $pagetitle = "Add a Contact"  it will be the name of title for each page and then am going to include the header.php file so include is meaning to grab this file and put it here .so its going to looking for the header.php.

On the header. Php what I already created  : 
	
It’s as an html5 document and basically it’s job is to display the navigation menu at the top .
I added already some of links for Home , Add Contacts, Tom Tailor , Bonita , Logout 
the header. Php file is creating the header navigation section up to the other pages .
And then I have link a stylesheet so so the stylesheet its going to take care of doing all of the formatting, so I have a layout CSS file and that lays out the background color and margins also lays out the form information .

Again to my file AddByForm.php :

There are some labels in each of there divisions has a label area for formatting the form input and this is also connected to the stylesheet,  so this is using divisions to lay out the table to lay out the form rather than using a table so if I come  back to my layout.css there is a label style :

The codes :

label { float: left;
    width: 100px;
    text-align: right;
    padding-right: 10px;
    margin-top: 10px;
}
Then I am going to have a self processing form and I am going to do that by implementing some other logic . so I am going now to collapse this function .
if the form has been submitted I am going a little bit of clean up  first its going to take out any bad codes that might be injected in there somebody might be putting in some malicous code . 
So at the first clean up and then I can put the information into my database 

The code :                                         
if($_POST['submit']=="Submit")
its equal to submit , so when the submit button is clicked its going to bundle up the name of the value pairs from our form including the submit button it’s called :
the code :
<input type="submit" value="Submit" name="submit"/>

if the submit has been clicked its going to the variables one at the time so what gets submitted from the email text fields and from the first text fiels and from the last text fields and and it is gonna send it to function called cleanData and have it clean out the data just just to make sure that no bad code that’s in there .

The codes:

$email = cleanData($_POST['email']);
                $first = cleanData($_POST['first']);
                $last = cleanData($_POST['last']);
                $phone = cleanData($_POST['phone']);
                $street = cleanData($_POST['street']);
                $company = cleanData($_POST['company']);
                $image = cleanData($_POST['image']);

And then I am going to :

trim the extra spaces
strip the slashes out
remove any HTML special characters
strip any HTML tags that are in there .

This gets returned back and assigned to email so then does that for each of the text fields that I have in my form  .
once my data has been cleaned next I want to save it in my database I will create a function called addData so I am going to pass in :
the code :

addData($email, $first, $last, $phone, $street, $company, $image); 

then I am gonna collapse their function for the print form and then will create a function to addData and it’s gonna be the same function I do already . 

and now am going to insert the data into my database so I am going to create a new PHP file called dbinfp.php and I am gonna put it in the same location where my files are  

 infp.php    

   Connecting with my database :
 
$host="localhost";
$user="root";
$password="";
$db=mysqli_connect($host, $user, $password) or
die(mysqli_error());
mysqli_select_db($db,"steve_ali");

 using some variable :

the first variable is << host >> that’s going to represent a string that is my Host Name 
the second variable is << user >>is going to be a string that represents the username for accessing the date Base 
the third string is << Password >> so for my own web host I need to find what the host information is and my username and my password  that I set up my data base 
another variable called << $db. >> and its equal to MySql  connect . the MySql connect function has taken these different pieces of information the hostname that am connecting to the UserName and the Password             
then I have << or die (mysqli_error()) ; >> {  its meaning if it doesn’t make this connection then it going to quit the program < its not going to continue >  which make sense if I can't connect to the database .if I am not able to connect so I will get the MySql_error .
mysqli_select_db method so I am connecting to the database and and I am telling it to select the data Base that I want to use, and it also takes as an argument this database connection information  

searchbox:

On the header.php file has like links going across the top as well as the search box information so it's 
A form and it's to submit the inforamtion to search.php so when the submit clicked it's going to send the value 
Of what the user typed in form the text field to  search.php so I am  going to create new php script is called search. Php
 

Search.php:
  
I created a file and a call it search.php and save it in the same location as all of my other files for my database .
At the first we need a database connection to be able to get my database files and my text box is sending the value 
Of search from the text field , so I am gonna get that an assign it to the variable called search .
Next I have a SQL statement that’s going to select everything from contacts where and then I have this series  


 The codes :

$sql="SELECT * FROM contacts
WHERE email like '%$search%' OR
first like '%$search%' OR
last like '%$search%' OR
phone like '%$search%'
ORDER BY last ASC";

Email like and first like last like , when I put a percentage sign at the beginning or at the end 
There it's like it's saying that anything  what can come before this variable name or typed in the text 
Field , so if they typed in art anywhere team , then it's gonna find art whether there's something 
Before it or something after it or both < something before it and after it >> .
And the same thing it's gonna search in the first name field and in the last name field and in the phone field 
Then I am gonna put the results in order by last name so this gives us a very powerful search to be able 
Multiple fields at once and found whatever my piece of information the user is typing in .
 
So I am going to run and execute it to display how many matches there are so I am going to use this function
The code :

$number=mysqli_num_rows($result);

And it's going to take the results so once this result excites well , it will stores the information into result and I will be
able to get the number of rows and assign that to my variable called number .
 
And then I am gonna have my page title called Search Results
Then I included the header.php file again.

And then start to print out my results :  
 
print <<<HERE
<h2>Search Results</h2>
<h3>$number results found seaching for "$search"</h3>

<table cellpadding="15">
 
Number of results . And a table to format out my results .
And then will loop through the result which is an array format and while it's looping through this array it's going to 
Going to assign these variables and since my primary key is contactID I need to make sure that matches so 
That will get assigned to ID  and email to email and first to first , it’s going to assign a name to my image and 
Find out if it exists and if doesn't exists it’s going to use a blank gif and then will output the result into a form that it looks like my index page change where I have buttons on there , so user could then continue
to go into edit or delete records from there

the code : 


while ($row=mysqli_fetch_array($result)){
$id=$row['contactID'];
$email=$row['email'];
$first=$row['first'];
$last=$row['last'];
$phone=$row['phone'];
$street=$row['street'];
$company=$row['company'];
$image=$row['image'];


And now when I am going to type in the box search for example << st >> and then press search ,,
I will get one match .
Then I am gonna include the dbinfo.php to my addbyform.file so then I will get the access to the database through this connection information .Next I am going to create a SQL statement of what I want to add to my database 
It’s called SQL and that’s equal to a string and inside my string this an SQL command, so it will be interpreted as an SQL command . 
The code:
$sql = "INSERT INTO contacts VALUES(null, '$email', '$first', '$last', '$phone', '$street', '$company', '$image')";
So I have null represents my contactID which is my primary key and my database is automatically going to auto increment . then I am going to pass in the variables for email and first , last , phone , street , company and image .
And now I need to go in a have it execute so to execute the SQL statement I am going to create a variable and set that equal to  MySQL` Query and its going to take an argument which is the sql statement that I want to execute 

The code :

$result = mysqli_query($db, $sql) or die(mysqli_error());
So when the sql query can’t be executed then I will get an error message .

Index.php :

At first I need to require to my dbinfo.php , then create an sql statement to select everything from the contacts table so will write 

The code :

$sql="SELECT * FROM contacts ORDER BY last ASC";

Create an SQL statement to select everything from the contacts table. And to execute that SQL statement, I am going to use PHP for that 

The code:

$result = mysqli_query($db, $sql) or die(mysqli_error());

And that’s need to connect to my database  and if it doesn’t so I want it to die .and if does die I want to get the MySql error from it .
Now I am going to set up a variable for my page title  :

$pageTitle = "My Contacts Database";

And I want my navigation menu so am going include my header.php file .
And then print out some of information from my result .so it’s going to print out my 
Contacts select a record to Edit or delete or to add new contact, so this will take me to the form. Php 
Next I need to connect it to my database .
So now I have here a while the row mySql_fetch_array we are executing the query on our database and it’s going to take that information the result of that query and put it into this result variable 
And now array it’s going to return a list of things even though it may be one result or maybe more so am going to use

This code :
while ($row=mysqli_fetch_array($result)){

it’s going to loop through while there’s still stuff in this result each row .now am going get the ID the email , first ,last ,phone ,company , street and image information and still while in this loop.
Now am going to assign a variable to our image name , i will call it filename  and that’s going to be equal to our image from my result and it’s going to be the part the string is the images file that contains my photos .

So I am going to check to see if this file name exists if it’s there because maybe somebody didn’t upload an image to go a long with contact and if that’s the case then I am going to use just a blank image so it’s doesn’t look like we have a broken image we will have just have a place holder for an image so I am going to check to see if there’s file for the picture so we are going to use this code 
 
The code:

if (!file_exists($filename)) {
 $filename="images/blank.gif"; // if it doesn't exist, set it equal to "blank"


Updateform.php :


At the first am going to require DB info that’s will have my database connection information 
Then am going to write .

The code :

$sel_record = $_POST['sel_record'];

Sel_record and to get the value of that It’s going to be sent through a post so am going to say post and the post is SEL record next I need an SQL statement to find the record in the database so am going to create a variable called SQL .

The code :

$sql = "SELECT * FROM contacts WHERE contactID = '$sel_record'";

And the string here is SQL statement to select everything from the contacts table where the ID is equal SEL record and that’s going to match the selected record that the user clicked the edit button on now I need to execute that query and get the result back , and  again to execute our query I am going to create a variable called 
The code :
$result = mysqli_query($db,$sql) or die (mysqli_error());

And use the MySQL Query function with our SQL statement and if it doesn’t work it will die and give us the error .
Then I am going to create a  :\

$pageTitle = "Edit a Contact";

Then include the Header.php and print out some of information .
Here we have a different text fields in here then have places for their email and first name and last name information .
I have also an input type equals hidden name equals ID value equals ID so I am using a hidden form fields again in order to be able to send information to the next script , now I am going to be building up all of the names and values our form and sending it to the update.php script and that’s going to get this information and update it in the database.
So this part is mostly just displaying out the form with the date from our database 
                                                              
Login :
 
 
 
User Authentication :
 
 
That’s going to check to make sure that the user has properly logged in with the username and the password .
And to let the user set up their own username and password account so this is just with one login and one password .
There are some of functions in PHP that can only be called if nothing has been sent to the browser and these include the header function set cookie function and session start .
So in this I am going to use both the header and the session start functions .
 
The first thing it's going to start a session and then set a session cookie .
Then it’s going to check to see if the user logged in so the first thing I am going to do is looking to see if login was passed  
From the form so that’s where hidden form fields come in.
Its looking to see whether this value is being  submitted to begin with and if it is then it’s going to continue on with checking  to see if  username is posted and if it it's equal to steve_ali and its going also looking to see if password was posted and if password is equal to test so if all three of those things are true I will get login and the username matches and the password matches then I can a say session authenticated and set it equal to one which is true if it's not then authenticated is going to be false and then I send the user back to the index.html page and then I write and close the session and send them to index. Php .
Then I write another code :
 
If the user is in the site and they want to logout and they click the logout link it's going to destroy the session and then the user back to the login page of the index page where they have to enter their the username and the password again.
 
Next I created a file  that is going to check the authenticated when the user gets to each page,  so this is going to create a session and say whether the user is authenticated or not and then all the other pages in my site is going to check to see if they are authenticated so I have another script called admin_login 
I start the session with  session start
Then if it’s not authenticated or not equal to one then I am throw the user back to the index.html page where they have to log in again and then I exit out of the php script .
 
Then I want to implement this on all of my other pages, so I am going to start with the index.php
 
And then require  the admin_login.php file so that’s going to require the admin_login 
This is going to start a session and it's going to check to see if it's been authenticated and if not then it throws the user back to the login page 
session_start();
if (!isset($_SESSION['Authenticated'])
   || ($_SESSION['Authenticated'] !=1)) {
   header("location: index.html");
   exit()


Transferd Files Using PuTTY
 
 
 Installed the putty scp (pscp)
 
 And opened a Command Prompt window, from the Start menu .
  
 set up a path by entering :
 
 set PATH="%PATH%;%ProgramFiles%\putty"
 
 opened the System control panel in Windows and clicked Advanced system settings, then In the Environment       Variables window, selected Path from the list of User variables, then clicked Edit. (If no Path variable is Liste, clickd New.) 
 
In the Edit User Variable window, click New. Type or paste the directory path for the PSCP utility you noted in    Step 2 (for example, C:/Program Files/putty) into the empty highlighted new line item. 
           pscp C:\xampp\htdocs\Adress_Book bitnami@10.90.38.75:/home/bitnami/stack/nginx/html

Then entered the password for the server. 
 
       
                                                                  The end ….



