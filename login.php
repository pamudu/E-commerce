<?php
session_start();
$pagename="Sign Up"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
echo "<div class='formStyle'>";
echo "<form action='login_process.php' method='post'>";
echo "<table>";
echo "<tr><td style='background-color:#fff;'>Email </td> <td style='background-color:#fff;'><input type='text' name='email'></td></tr>";
echo "<tr><td style='background-color:#fff;'>Password </td> <td style='background-color:#fff;'><input type='text' name='password'></td></tr>";
echo "<tr> <td style='background-color:#fff;'> <button type='submit'>Log In</button> </td><td style='background-color:#fff;'><button type='reset'>Clear</button></td></tr>";
echo "</table>";
echo "</form>";
echo "</div>";
include("footfile.html"); //include head layout
echo "</body>";
?>