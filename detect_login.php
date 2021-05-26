<?php
if(isset($_SESSION['userid'])){
    echo "<div style='float:right;'>".$_SESSION['fname']." ".$_SESSION['sname']." | user type: C <br></div>";
}
?>