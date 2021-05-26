<?php
session_start();
include("db.php");

$pagename="A smart buy for a smart home"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<link rel='preconnect' href='https://fonts.gstatic.com'>";
echo '<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">';
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include ("detect_login.php");
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//retrieve the product id passed from previous page using the GET method and the $_GET superglobal variable
//applied to the query string u_prod_id
//store the value in a local variable called $prodid
$prodid=$_GET['u_prod_id'];

//create a $SQL variable and populate it with a SQL statement that retrieves product details
$SQL="select * from Product WHERE prodId = ".$prodid;

//run SQL query for connected DB or exit and display error message
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
echo "<table style='border: 0px'>";
//create an array of records (2 dimensional variable) called $arrayp.
//populate it with the records retrieved by the SQL query previously executed.
//Iterate through the array i.e while the end of the array has not been reached, run through it
while ($arrayp=mysqli_fetch_array($exeSQL))
{
echo "<tr>";
echo "<td style='border: 0px'>";
//display the small image whose name is contained in the array
echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
echo "<img src=images/".$arrayp['prodPicNameLarge']." height=200 width=200>";
echo "</a>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array
echo "<p style='font-family: Helvetica;color:grey;margin-left:10px;margin-bottom:10px;'> ".$arrayp['prodDescripLong']."</p>";
echo "<p style='font-family: sans-serif;color:green;margin-left:10px;margin-bottom:10px;'><strong><span>&#163;</span> ".$arrayp['prodPrice']."</strong></p>";
echo "<p style='font-family: sans-serif;margin-left:10px;'> Left in stock: ".$arrayp['prodQuantity']."</p>";
}
echo "<p style='margin-top:30px;margin-left:10px;'>Number to be purchased: ";
//create form made of one text field and one button for user to enter quantity
//the value entered in the form will be posted to the basket.php to be processed
echo "<form action=basket.php method=POST style='margin-top:10px;margin-left:10px;'>";

$stock ="select prodQuantity from Product WHERE prodId = ".$prodid;
$stock_level = mysqli_query($conn,$stock) or die (mysqli_error($conn));
$quantity = mysqli_fetch_array($stock_level);

echo "<select name='quantity'>";
        for($i=1; $i<=$quantity[0] ;$i++){
            echo "<option value=".$i.">".$i." </option>";
        }
echo     "</select>";
echo "<input type=hidden name='h_prodid' value=".$prodid.">";
echo "<input type=submit name='submitbtn' value='ADD TO BASKET' id='submitbtn'>";
//pass the product id to the next page basket.php as a hidden value

echo "</form>";
echo "</td>";
echo "</tr>";

echo "</table>";
include("footfile.html"); //include head layout
echo "</body>";
?>