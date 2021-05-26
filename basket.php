<?php
session_start();

include ("db.php");
$pagename="Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include ("detect_login.php");
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
if(isset($_POST['productionid'])){
    $delprodid = $_POST['productionid'];
    unset($_SESSION['basket'][$delprodid]);
    echo "1 item removed from the basket<br>";
}
if(isset($_POST['h_prodid'])){
    $newprodid = $_POST['h_prodid'];
    $reququantity = $_POST['quantity'];
    //echo "<p>Id of selected product:".$newprodid."</P>";
    //echo "<p>Quantity of selected product:".$reququantity."</P>";
    $_SESSION['basket'][$newprodid]=$reququantity;
    echo "<p>1 item added";
}else{
    echo "<p>Basket unchanged.</P>";
}

echo "<div id='checkouttable'><table><tr><th>Product name</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th>Remove Product</th></tr>";
$total = 0.00;
if(isset($_SESSION['basket'])){
    
    foreach($_SESSION['basket'] as $index => $value){
        $SQL="select * from Product WHERE prodId = ".$index;
        $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
        $arrayp=mysqli_fetch_array($exeSQL);
        echo "<tr>";
        echo "<td>".$arrayp['prodName']."</td>";
        echo "<td>".$arrayp['prodPrice']."</td>";
        echo "<td>".$value."</td>";
        $subtotal = $arrayp['prodPrice'] * $value;
        echo "<td>".$subtotal."</td>";
        echo "<form action=basket.php method=POST>";
        echo "<td><button>Remove</button></td>";
        echo "<input type=hidden name='productionid' value=".$index.">";
        echo "</form>";
        $total = $total + $subtotal;
    } 
}else{
    echo "<p>Basket unchanged.</P>";
}
echo "</tr>";
echo "<tr><td colspan = 3>Total</td>";
echo "<td>".$total."</td></tr>";
echo "</table></div>";
echo "<a href='clearbasket.php'>CLEAR BASKET</a><br>";
if(isset($_SESSION['userid'])){
    echo "To finalise your order: <a href='checkout.php'>Checkout</a><br>";
} else{
    echo "New hometeq customer: <a href='signup.php'>Sign Up</a><br>";
    echo "Returning hometeq customers: <a href='login.php'>Log In</a><br>";
}
include("footfile.html"); //include head layout
echo "</body>";
?>