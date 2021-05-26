<?php
$pagename="template"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

$SQL5 = 'SELECT * FROM Advertisement WHERE designerId ='.$id2;
$exeSQL5=mysqli_query($c,$SQL5) or die (mysqli_error($c));
while ($thing5=mysqli_fetch_array($exeSQL5))
{
echo "<br>The advertisment is  ".$thing5['adName'];
echo "advertisment id is ".$thing5['adId'];
echo "campaign id is ".$thing5['capCode'];
echo " it costs ".$thing5['adCost'];
echo " starting date ".$thing5['adDate'];
}

echo "</body>";
?>