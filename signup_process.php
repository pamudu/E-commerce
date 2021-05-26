<?php
session_start();
include("db.php");
$pagename="Sign Up Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

$fName = $_POST['fname'];
$lName = $_POST['lname'];
$postCode = $_POST['pcode'];
$address  =$_POST['address'];
$telNo = $_POST['tel'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['cpassword'];

if(!empty($fName) && !empty($lName) && !empty($postCode) && !empty($address) && !empty($telNo) && !empty($email) && !empty($password)){
    if($password !== $confirm_password){
       echo "Passwords are not match <br>";
       echo "<a href='signup.php'>Sign Up</a>";
    }else{
        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
        if(preg_match($pattern,$email)){
            //insert one user into users table
            $sql = "INSERT INTO users (userFName,userSName,userAddress,userPostCode,userTelNo,userEmail,userPassword) VALUES ('$fName','$lName','$address','$postCode','$telNo','$email','$password')";
            $run_sql = mysqli_query($conn, $sql);
            if(mysqli_errno($conn) == 0){
                echo "You are successfully registered. <br>";
                echo "<a href='login.php'>Log In</a>";
            }
            elseif(mysqli_errno($conn) == 1062){
                echo "An account with your emailaddress is already registered. <br>";
                echo "<a href='signup.php'>Sign Up</a>";
            }elseif (mysqli_errno($conn) == 1064) {
                echo "Invalid characters used. <br>";
                echo "<a href='signup.php'>Sign Up</a>";
            }
        }else{
            echo "email not in the right format <br>";
            echo "<a href='signup.php'>Sign Up</a>"; 
        }

    }
    
}else{
    echo "all mandatory fields need to be filled in <br>";
    echo "<a href='signup.php'>Sign Up</a>";
}



include("footfile.html"); //include head layout
echo "</body>";
?>