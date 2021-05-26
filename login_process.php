<?php
session_start();
include("db.php");
$pagename="Your Login Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)){
    echo "Both email and password fields need to be filled in <br>";
    echo "<a href='login.php'>Log In</a>";
}else{
    $SQL="select * from users WHERE userEmail = '".$email."'";
    $run_SQL = mysqli_query($conn, $SQL) or die (mysqli_error($conn));
    $arrayu = mysqli_fetch_array($run_SQL);
    $nbrecs = mysqli_num_rows($run_SQL);

    if($nbrecs == 0){
        echo "Email not recognised, login again<br>";
        echo "<a href='login.php'>Log In</a>";
    }else{
        if($arrayu['userPassword'] !== $password){
            echo "Password not recognised, login again<br>";
            echo "<a href='login.php'>Log In</a>";
        }else{
            echo "<strong>Login Successfull</strong><br>";
            $_SESSION['userid'] = $arrayu['userId'];
            $_SESSION['usertype'] = 'hometeq customer';
            $_SESSION['fname'] = $arrayu['userFName'];
            $_SESSION['sname'] = $arrayu['userSName'];
            echo "Welcome: ".$_SESSION['fname']." ".$_SESSION['sname']."<br>";
            echo "User Type: ".$_SESSION['usertype']." <br><br><br>";
            echo "Continue Shopping for <a href='index.php'>Home Tech</a><br>";
            echo "View Your <a href='basket.php'>Smart Bucket</a>";
        }
    }
}

include("footfile.html"); //include head layout
echo "</body>";
?>