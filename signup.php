<?php
$pagename="Sign Up"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

//details form
echo "<div class='formStyle'>";
echo "<form action='signup_process.php' method='POST'>";
echo "<table  style='border:none;'>";
echo "<tr> <td style='background-color:#fff;'> First Name </td> <td style='background-color:#fff;'><input type='text' name='fname'></td> </tr>";
echo "<tr> <td style='background-color:#fff;'> Last Name </td> <td style='background-color:#fff;'><input type='text' name='lname'></td> </tr>";
echo "<tr> <td style='background-color:#fff;'> Post Code </td><td style='background-color:#fff;'><input type='text' name='pcode'></td></tr>";
echo "<tr> <td style='background-color:#fff;'> Address </td><td style='background-color:#fff;'><input type='text' name='address'></td></tr>";
echo "<tr> <td style='background-color:#fff;'> Tel No </td><td style='background-color:#fff;'><input type='text' name='tel'></td></tr>";
echo "<tr> <td style='background-color:#fff;'> Email Address </td><td style='background-color:#fff;'><input type='text' name='email'></td></tr>";
echo "<tr> <td style='background-color:#fff;'> Password </td><td style='background-color:#fff;'><input type='text' name='password'></td></tr>";
echo "<tr> <td style='background-color:#fff;'> Confirm Password </td><td style='background-color:#fff;'><input type='text' name='cpassword'></td></tr>";
echo "<tr> <td style='background-color:#fff;'> <button type='submit'>Sign up</button> </td><td style='background-color:#fff;'><button>Clear</button></td></tr>";
echo "</table></form>";
echo "</div>";
include("footfile.html"); //include head layout
echo "</body>";
?>