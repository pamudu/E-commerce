<?php
session_start();
include("db.php");
$pagename="Your Login Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include ("detect_login.php");
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

$currentdatetime = date('Y-m-d H:i:s');

$userid = $_SESSION['userid'];
$sql = "INSERT INTO orders (userId,orderDateTime,orderStatus) VALUES ($userid,'$currentdatetime','Placed')";
$runSQL = mysqli_query($conn, $sql);

if(mysqli_errno($conn) == 0){
    $SQL = "SELECT MAX(orderNo) AS max FROM orders WHERE userId =".$userid;
    $execute = mysqli_query($conn,$SQL);
    $arrayord = mysqli_fetch_array($execute);
    $orderNo = $arrayord['max'];
    echo "successfully done ".$orderNo;
    $total = 0;
    echo "<div id='checkouttable'><table><tr><th>Product name</th><th>Price</th><th>Quantity</th><th>Subtotal</th></tr>";
    foreach($_SESSION['basket'] as $index => $value){
        $SQL="select * from Product WHERE prodId = ".$index;
        $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
        $arrayp=mysqli_fetch_array($exeSQL);
        echo "<tr>";
        echo "<td>".$arrayp['prodName']."</td>";
        echo "<td>".$arrayp['prodPrice']."</td>";
        echo "<td>".$value."</td>";
        $subtotal = $arrayp['prodPrice'] * $value;
        echo "<td>".$subtotal."</td></tr>";
        /*echo "<form action=basket.php method=POST>";
        echo "<input type=hidden name='productionid' value=".$index.">";
        echo "</form>";*/
        $total = $total + $subtotal;
        $sql_2 ="INSERT INTO order_line (orderNo,prodId,quantityOrdered,subTotal) VALUES ($orderNo,$index,$value,$subtotal)";
        $runsql_2 = mysqli_query($conn,$sql_2);
    }
    echo "<tr><td colspan = 3>Total</td>";
    echo "<td>".$total."</td></tr>";
    echo "</table></div>";
}else{
    echo "error occured.<br >";
}

include("footfile.html"); //include head layout
echo "</body>";
?>