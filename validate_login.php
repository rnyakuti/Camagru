<?php
// Start the session
session_start();
?>


<?php
/* Attempt MySQL server connection. Assuming you are running MySQL*/
$link = mysqli_connect("localhost", "root", "", "Camagru_rnyakuti");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
echo $username ."uuu";
$_SESSION['username'] = $username;

 header("Location: pages/Home.php");
?>