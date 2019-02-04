<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title><?php echo $pageTitle; ?></title>
<link type="text/css" rel="stylesheet" media="screen" href="stylesheet.css" />
</head>
<body>


 <table id="nav">
 <tr>
 <td><a href="index.php">Home</a></td>
 <td><a href="form.php">Add Contacts</a></td>
 <td><a href="https://www.tom-tailor.de/">Tom Tailor</a></td>
 <td><a href="https://www.bonita.de/">Bonita</a></td>
 <td><a href="auth.php?logout">Logout</a></td>
 <td>

 <form method="post" action="search.php">
 <input type="text" name="search" />
 <input type="submit" name="submit" value=" Search ">
 </form>
 </td>
 </tr>
 </table>
